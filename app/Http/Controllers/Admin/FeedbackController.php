<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\FeedbackRepositoryInterface;
use Mail;

class FeedbackController extends Controller
{   
    private $feedback;

    public function __construct(
        FeedbackRepositoryInterface $feedbackRepository
    )
    {
        $this->feedback = $feedbackRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view['listFeedback'] = $this->feedback->getListFeedback($request->all(), $request->url());

        return view('admin.feedback.list', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function destroyMulti(Request $request)
    {
        $data["list_id"] = $request->arrid;

        $deleteMulti = $this->feedback->deleteMulti($data);

        if($deleteMulti){

            return $this->dataSuccess('Delete Feedback Successfully');

        }else{

            return $this->dataError('Failed');
        }
    }

    public function sendMail(Request $request)
    {   
        $email = $request->usermail;

        Mail::send('admin.feedback.template_mail', ['username'=>$request->username, 'content'=>$request->content], function($message) use ($email){

            $message->to($email, 'User')->subject('User Feedback!!!');
        });

        if(count(Mail::failures()) > 0){

            return $this->dataError('Failed');

        }else{

            $update = $this->feedback->update(['reply' => 1], $request->feedback_id);

            return $this->dataSuccess('Reply Successfully.');
        }  
    }
}
