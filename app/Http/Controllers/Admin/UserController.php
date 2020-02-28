<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Services\SocialAccountService;

class UserController extends Controller
{   
    private $user;
    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->user = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view['listUser'] = $this->user->listUser($request->all(), $request->url());

        // dd($view['listUser']);
        return view('admin.user.list', $view);
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
        $rules = [
            'username' => 'required',
            'password' => 'required|confirmed',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);

        $array = [];

        if ($validator->fails()) {

            $data_errors = $validator->errors();

            foreach ($data_errors->messages() as $key => $error){

                $array[] = ['key' => $key, 'mess' => $error];
            }

            return $this->dataError('Errors', $array);

        }else{

            $checkValidation = true;

            if($request->hasFile('image')){
                //File Validation
                $exeFile = $request->image->getClientOriginalExtension();

                switch($exeFile){
                    case 'JPG': break;
                    case 'jpg': break;
                    case 'JPEG': break;
                    case 'jpeg': break;
                    case 'PNG': break;
                    case 'png': break;
                    case 'BMP': break;
                    case 'bmp': break;
                    case 'GIF': break;
                    case 'gif': break;
                    default: 
                    $checkValidation = false;
                    $array[] = ['key' => 'image', 'mess' => ["You must upload image."]];
                    break;
                }
            }

            if($this->user->checkUniqueUser($request->username, $request->email, null)['check'] == false)
            {
                $checkValidation = false;
                $array = array_merge($array, $this->user->checkUniqueUser($request->username, $request->email, null)['error']);
            }

            if(!$checkValidation){

                return $this->dataError('Errors', $array);
            }

            $data['username'] = $request->username;
            $data['password'] = Hash::make($request->password);
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['phone'] = $request->phone;
            $data['gender'] = $request->gender;
            $data['group_id'] = 2;

            if($request->hasFile('image'))
            {   
                $imageFile = $request->file('image');

                $imageName = 'upload/' . time() . str_replace(" ","",$imageFile->getClientOriginalName());;

                $imageFile->move(public_path('upload/'), $imageName);

                $data['image'] = $imageName;
            }

            $saveUser = $this->user->save($data);

            if($saveUser){

                return $this->dataSuccess('Add User Successfully.');
            }
        }
        return $this->dataError('Errors', $array);
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
    public function update(Request $request)
    {   
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);

        $array = [];

        if ($validator->fails()) {

            $data_errors = $validator->errors();

            foreach ($data_errors->messages() as $key => $error){

                $array[] = ['key' => $key, 'mess' => $error];
            }

            return $this->dataError('Errors', $array);

        }else{

            $checkValidation = true;

            if($request->hasFile('image')){
                //File Validation
                $exeFile = $request->image->getClientOriginalExtension();

                switch($exeFile){
                    case 'JPG': break;
                    case 'jpg': break;
                    case 'JPEG': break;
                    case 'jpeg': break;
                    case 'PNG': break;
                    case 'png': break;
                    case 'BMP': break;
                    case 'bmp': break;
                    case 'GIF': break;
                    case 'gif': break;
                    default: 
                    $checkValidation = false;
                    $array[] = ['key' => 'image', 'mess' => ["You must upload image."]];
                    break;
                }
            }
            
            if(!$checkValidation){

                return $this->dataError('Errors', $array);
            }

            if(!empty($request->password)){

                $data['password'] = Hash::make($request->password);
            }
            
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['address'] = $request->address;
            $data['phone'] = $request->phone;
            $data['gender'] = $request->gender;

            if($request->hasFile('image'))
            {   
                $imageFile = $request->file('image');

                $imageName = 'upload/' . time() . str_replace(" ","",$imageFile->getClientOriginalName());;

                $imageFile->move(public_path('upload/'), $imageName);

                $data['image'] = $imageName;
            }

            $saveUser = $this->user->update($data, $request->user_id);

            if($saveUser){

                return $this->dataSuccess('Edit User Successfully.');
            }
        }
        return $this->dataError('Errors', $array);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLogin()
    {      
        if(Auth::guard('admin')->check())
        {
            return redirect()->route('admin.password2nd');
        }else{
            return view('admin.login');
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

            if(Auth::guard('admin')->attempt([$field => $request->email, 'password' => $request->password, 'group_id' => 1])){

                return $this->dataSuccess('Login Successfully', $request->email);

            }else{

                if($this->user->checkUserAvailable($request->email)){

                    Session::put('password2nd', false);
                    
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

    public function getPassword2nd()
    {   
        if(Session::get('password2nd') !== null &&  Session::get('password2nd') == true){

            return redirect()->route('admin.dashboard');

        }else{

            return view('admin.password');
        }
    }

    public function checkPassword2nd(Request $request)
    {   
        if(Auth::guard('admin')->user()->password2nd == $request->password2nd){

            Session::put('password2nd', true);

            return $this->dataSuccess('Passed');
        }else{

            return $this->dataError('Wrong Password');
        }
    }

    public function getLogout()
    {   
        Session::put('password2nd', false);

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function destroyMulti(Request $request)
    {
        $data["list_id"] = $request->arrid;

        $deleteMulti = $this->user->deleteMulti($data);

        if($deleteMulti){

            return $this->dataSuccess('Delete User Successfully');

        }else{

            return $this->dataError('Failed');
        }
    }

    public function getProfileUser()
    {
        $view['user'] = Auth::guard('admin')->user();

        return view('admin.user.profile', $view);
    }

    public function changePassword(Request $request)
    {   
        if (!(Hash::check($request->currentpassword, Auth::guard('admin')->user()->password))) {

            $array[] = ['key' => 'current_password', 'mess' => ["Wrong current password."]];

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
            $user = Auth::guard('admin')->user();

            $user->password = bcrypt($request->currentpassword);

            $user->save();

            return $this->dataSuccess('Change password successfully.');
        }   
    }
}
