<?php 
namespace App\Repositories\Interfaces; 

interface BaseRepositoryInterface 
{	 
	//$list is a Collection. $query is $request->all(). $url is $request->url(). $per_page is Number Result on One Page
	public function paginateCollection($list, $query, $url, $per_page);

	//$list is a Collection. $query is $request->all(). $url is $request->url(). $per_page is Number Result on One Page
	public function paginateArray($list, $query, $url, $per_page);

	//$field is Param you request. $query is $request->all(). $list is a Builder. $column_table is Column in Table. $relation_table is Name of Relation
	public function search($field, $query, $list, $compare, $column_table, $relation_table);

	
} 