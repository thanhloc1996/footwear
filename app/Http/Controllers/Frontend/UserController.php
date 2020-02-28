<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\BillRepositoryInterface;
use App\Repositories\Interfaces\FeedbackRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Image;
use Cart;

class UserController extends Controller
{	
	private $user;
	private $comment;
	private $bill;
	private $feedback;

	public function __construct(
		UserRepositoryInterface $userRepository,
		CommentRepositoryInterface $commentRepository,
		BillRepositoryInterface $billRepository,
		FeedbackRepositoryInterface $feedbackRepository
	)
	{
		$this->user = $userRepository;
		$this->bill = $billRepository;
		$this->comment = $commentRepository;
		$this->feedback = $feedbackRepository;
	}

	public function getregister()
	{
		return view('frontend.content.register');
	}

	public function postregister(Request $request)
	{
		$data = $request->all();
		// dd($request->all());
		// $data['image'] = null;
		if($request->hasFile('image'))
		{
			$Validator = Validator::make($data,[
				'image' => 'mimes:jpg,jpeg,png,gif|max:2048'
			],
			[
				'image.mimes' => 'Image accepted file .jpg .jpeg .png .gif',
				'image.max' => 'Image limit to 2 Megabytes '
			]
		);
			if($Validator->fails())
			{
				return response()->json(['errors'=>$Validator->errors()]);
			}
			$data['image'] = $request->file('image')->getClientOriginalName();
		}
		$rules = [
			'first_name' => 'required|max:191',
			'last_name' => 'required|max:191',
			'email' => 'required|email|unique:tp_user,email',
			'username' => 'required|unique:tp_user,username',
			'password' => 'required|confirmed|min:6|max:32',
			'password_confirmation' => 'required|min:6|max:32'
		];
		// $mes = [
		// 	'first_name.required' => 'Không được để trống',
		// 	'first_name.max' => 'Tối đa không quá 191 kí tự',
		// 	'last_name.required' => 'Không được để trống',
		// 	'username.required' => 'Không được để trống',
		// 	'last_name.max' => 'Tối đa không quá 191 kí tự',
		// 	'email.required' => 'Email không được bỏ trống',
		// 	'email.email' => 'Email không đúng định dạng',
		// 	'email.unique'=> 'Email đã tồn tại',
		// 	'password.required' => 'PassWord không được để trống',
		// 	'password.confirmed' => 'PassWord không trùng nhau',
		// 	'password.min' => 'PassWord tối thiểu 6 kí tự',
		// 	'password.max' => 'PassWord tối đa 32 kí tự',
		// 	'password_confirmation.required' => 'không được để trống',
		// 	'password_confirmation.min' => 'PassWord tối thiểu 6 kí tự',
		// 	'password_confirmation.max' => 'PassWord tối đa 32 kí tự',
		// ];
		// $file_name = $request->file('image')->getClientOriginalName();
		$Validator = Validator::make($data, $rules);
		if($Validator->fails())
		{
			return response()->json(['errors'=>$Validator->errors()]);
		}
		$data['group_id'] = '2';
		$data['password'] = Hash::make($request->password);
		$this->user->save($data);
		if($request->hasFile('image')){
			$request->file('image')->move('upload/',$data['image']);
		}
		return response()->json(['success'=>1]);
	}

	public function getLogin()
	{
		if(Auth::check())
		{
			return redirect()->route('frontend.home');

		}else{

			return view('frontend.content.login');
		}
	}

	public function getForgotPass()
	{
		if(Auth::check())
		{
			return redirect()->route('frontend.home');

		}else{

			return view('frontend.content.forgot');
		}
	}

	public function logout()
	{
		Auth::logout();

		return redirect()->route('frontend.home');
	}

	public function getUserProfile(Request $request)
    {
    	$view['user'] = Auth::user();

    	$view['user']->email = hide_email($view['user']->email);

    	$view['listComment'] = $this->comment->getCommentByUser(Auth::user()->id);

    	$view['listBill'] = $this->bill->getBillByUser(Auth::user()->id, $request->url());

    	// dd($view['listBill']);

    	return view('frontend.content.user', $view);
    }

	public function postUserProfile(Request $request)
	{	
		$validator = \Validator::make($request->all(), [
			'first_name' => 'required',
			'last_name' => 'required'
		]);

		if ($validator->fails()) {

			$data_errors = $validator->errors();

			$array = [];

			foreach ($data_errors->messages() as $key => $error) {

				$array[] = ['key' => $key, 'mess' => $error];
			}

			return $this->dataError('error', $array);

		}else{

			$data['first_name'] = $request->first_name;
			$data['last_name'] = $request->last_name;
			$data['address'] = $request->address;
			$data['phone'] = $request->phone;
			$data['gender'] = $request->gender;

			if($request->hasFile('avatarfile')){

				$imageName = time() .$request->avatarfile->getClientOriginalName();

				$request->avatarfile->move(public_path('upload/user'), $imageName);

				$data['image'] = 'upload/user/'.$imageName;
			}
		
			$this->user->update($data, Auth::user()->id);

			return $this->dataSuccess('Update your profile successfully.');
		}
	}

	public function changePassword(Request $request)
	{	
		if (!(Hash::check($request->currentpassword, Auth::user()->password))) {

			$array[] = ['key' => 'currentpassword', 'mess' => ["Wrong current password."]];

			return $this->dataError('error', $array);
		}

		if(strcmp($request->currentpassword, $request->password) == 0){

			$array[] = ['key' => 'password', 'mess' => ["New pasword and Current password is same."]];

			return $this->dataError('error', $array);
		}

		$validator = \Validator::make($request->all(), [
			'currentpassword' => 'required',
			'password' => 'required|string|min:6|confirmed'
		]);

		if ($validator->fails()) {

			$data_errors = $validator->errors();

			$array = [];

			foreach ($data_errors->messages() as $key => $error) {

				$array[] = ['key' => $key, 'mess' => $error];
			}

			return $this->dataError('error', $array);

		}else{
			//Change Password
			$user = Auth::user();

			$user->password = bcrypt($request->password);

			$user->save();

			return $this->dataSuccess('Change password successfully.');
		}   
	}

	public function postLogin(Request $request)
	{	
		$rules = [
			'email' =>'required',
			'password' => 'required'
		];

		$messages = [
    		'email.required' => 'Email or Username is required',
    	];

		$validator = Validator::make($request->all(), $rules, $messages);

		$array = [];

		if ($validator->fails()) {

			$data_errors = $validator->errors();

			foreach ($data_errors->messages() as $key => $error) {

				$array[] = ['key' => $key, 'mess' => $error];
			}

			return $this->dataError('Error', $array);

		}else{

			$field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

			if(Auth::attempt([$field => $request->email, 'password' => $request->password])){

				return $this->dataSuccess('Login Successfully', $request->email);

			}else{

				if($this->user->checkUserAvailable($request->email)){

					$array[] = ['key' => 'password', 'mess' => ["Wrong password."]];

					return $this->dataError('Login Unsuccessfully', $array);

				}else{

					$ahref = "<a href='{{route('frontend.register')}}'>register</a>";

					$array[] = ['key' => 'email', 'mess' => ["Your email or username is not available. Do you want to register? "]];

					return $this->dataError('Login Unsuccessfully', $array);
				}
			}
		}
	}

	public function postComment(Request $request, $product_id)
	{	
		$rules = [
			'star' =>'required',
			'content' => 'required'
		];

		$validator = Validator::make($request->all(), $rules);

		$array = [];

		if ($validator->fails()) {

			$data_errors = $validator->errors();

			foreach ($data_errors->messages() as $key => $error) {

				$array[] = ['key' => $key, 'mess' => $error];
			}

			return $this->dataError('Check your Rating Star and Content.', $array);

		}else{

			if($this->user->checkUserCommentAvailable($request->user()->id, $product_id)){

				return $this->dataError('Cannot feedback. You had reviewed this product!!!', $array);
			}

			$dataComment['product_id'] = $product_id;
			$dataComment['user_id'] = $request->user()->id;
			$dataComment['content'] = $request->content;
			$dataComment['star'] = $request->star;

			$saveComment = $this->comment->save($dataComment);

			if($saveComment){

				return $this->dataSuccess('Feedback successfully. Thanks you.');

			}else{

				return $this->dataError('Cannot feedback.', $array);
			}
		}
	}

	public function redirectSocial($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callbackSocial($social)
    {   
        $user= Socialite::driver($social)->user();

        if($social == 'google'){

        	$user = $user->user;
        }

        if($social == 'facebook'){

        	$user = $user;
        }

        $saveUser = $this->createUserSocial($social, $user);

        if(Auth::loginUsingId($saveUser->id)){

        	return redirect()->route('frontend.home');
        }else{

        	return redirect()->route('frontend.contact');
        }
    }

    public function createUserSocial($social, $user)
    {	
    	if($social == 'google'){
    		$checkUser = $this->user->checkUserSocial($social, $user['id']);

    		if($checkUser == false){

    			$dataUser['provider_id'] = $user['id'];
    			$dataUser['provider'] = $social;
    			$dataUser['email'] = $user['emails'][0]['value'];
    			$dataUser['last_name'] = $user['name']['familyName'];
    			$dataUser['first_name'] = $user['name']['givenName'];
    			$dataUser['username'] = strtolower(preg_replace('/\s+/', '', vnString($user['displayName'])));
    			$dataUser['group_id'] = 2;

    			$imageName = time(). $dataUser['username'];
    			$image = Image::make($user['image']['url']);
    			$image->save(public_path('upload/user/'. $imageName));
    			
    			$dataUser['image'] = 'upload/user/'.$imageName;
    		
    			$saveUser = $this->user->save($dataUser);
    		}else{

    			$saveUser = $checkUser;
    		}	
    	}

    	if($social == 'facebook'){
    		$checkUser = $this->user->checkUserSocial($social, $user['id']);

    		if($checkUser == false){

    			$dataUser['provider_id'] = $user->id;
    			$dataUser['provider'] = $social;
    			// $dataUser['email'] = $user['emails'][0]['value'];
    			$dataUser['username'] = strtolower(preg_replace('/\s+/', '', vnString($user->user['name'])));
    			$dataUser['group_id'] = 2;

    			$imageName = time(). $dataUser['username'];
    			$image = Image::make($user->avatar);
    			$image->save(public_path('upload/user/'. $imageName));
    			
    			$dataUser['image'] = 'upload/user/'.$imageName;


    			$saveUser = $this->user->save($dataUser);
    		}else{

    			$saveUser = $checkUser;
    		}
    	}
    	return $saveUser;
    }

    public function deleteComment(Request $request)
    {
    	$deleteComment = $this->comment->delete($request->comment_id);

    	if($deleteComment)
    	{
    		return $this->dataSuccess('Delete comment successfully');
    	}

    	return $this->dataError('Failed');
    }

    public function postFeedback(Request $request)
	{	
		$rules = [
			'star' =>'required',
			'content' => 'required'
		];

		$validator = Validator::make($request->all(), $rules);

		$array = [];

		if ($validator->fails()) {

			$data_errors = $validator->errors();

			foreach ($data_errors->messages() as $key => $error) {

				$array[] = ['key' => $key, 'mess' => $error];
			}

			return $this->dataError('Check your Rating Star and Content.', $array);

		}else{

			if($this->user->checkUserFeedbackAvailable($request->user()->id)){

				return $this->dataError('Cannot feedback. You had reviewed our service!!!', $array);
			}

			$dataFeedback['user_id'] = $request->user()->id;
			$dataFeedback['content'] = $request->content;
			$dataFeedback['star'] = $request->star;

			$saveFeedback = $this->feedback->save($dataFeedback);

			if($saveFeedback){

				return $this->dataSuccess('Feedback successfully. Thanks you.');

			}else{

				return $this->dataError('Cannot feedback.', $array);
			}
		}
	}
}
