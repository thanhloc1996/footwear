<?php 
namespace App\Repositories\Repository; 
 
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseRepositoryInterface 
{ 
    public function paginateCollection($list, $query, $url, $per_page)
    {
        if (isset($list)) {

            $page = Input::get('page', 1); // Get the ?page=1 from the url
            
            if (isset($per_page) && $per_page != '') {

                $perPage = $per_page; // Number of items per page

            } else {

                $perPage = 20; // Number of items per page
            }

            $offset = ($page * $perPage) - $perPage;
            // dd($query);
            return new LengthAwarePaginator(
                array_values(array_slice($list->toArray(), $offset, $perPage, true)), // Only grab the items we need
                count($list), // Total items
                $perPage, // Items per page
                $page, // Current page
                ['path' => $url, 'query' => $query] // We need this so we can keep all old query parameters from the url
            );
        }
        return null;
    }

    public function paginateArray($list, $query, $url, $per_page)
    {
        if (isset($list)) {

            $page = Input::get('page', 1); // Get the ?page=1 from the url

            if (isset($per_page) && $per_page != '') {

                $perPage = $per_page; // Number of items per page

            } else {

                $perPage = 20; // Number of items per page
            }

            $offset = ($page * $perPage) - $perPage;

            return new LengthAwarePaginator(
                array_values(array_slice($list, $offset, $perPage, true)), // Only grab the items we need
                count($list), // Total items
                $perPage, // Items per page
                $page, // Current page
                ['path' => $url, 'query' => $query] // We need this so we can keep all old query parameters from the url
            );
        }
        return null;
    }

    public function search($field, $query, $list, $compare, $column_table, $relation_table)
    {
        if (array_key_exists($field, $query)) {
            if (empty($column_table)) {
                $column_table = $field;
            }
            if (empty($relation_table)) {
                if (empty($compare)) {
                    if (!empty($query[$field])) {
                        $list = $list->where($column_table, 'like', '%' . $query[$field] . '%');
                    }
                } else {
                    if (!empty($query[$field])) {
                        $list = $list->where($column_table, $compare, $query[$field]);
                    }
                }
            } else {
                if (empty($compare)) {
                    if (!empty($query[$field])) {
                        $list = $list->whereHas($relation_table, function ($data) use ($field, $query, $column_table) {
                            $data->where($column_table, 'like', '%' . $query[$field] . '%');
                        });
                    }
                } else {
                    if (!empty($query[$field])) {
                        $list = $list->whereHas($relation_table, function ($data) use ($field, $query, $column_table, $compare) {
                            $data->where($column_table, $compare, $query[$field]);
                        });
                    }
                }
            }
        }
        return $list;
    }
} 