<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', 'Admin\UserController@getLogin')->name('admin.login');

Route::post('/admin', 'Admin\UserController@postLogin')->name('admin.post_login');

//Login Social
Route::get('/redirect/{social}', 'Frontend\UserController@redirectSocial')->name('admin.login_social_re');
Route::get('/callback/{social}', 'Frontend\UserController@callbackSocial')->name('admin.login_social__call');

Route::group(['middleware'=>'admin', 'prefix'=>'admin'], function (){

	Route::group(['middleware'=>'password2nd'],function (){

		Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
		Route::get('/statistical', 'Admin\DashboardController@getStatistical')->name('admin.statistical');

		//Product
		Route::get('/product', 'Admin\ProductController@index')->name('admin.product.list');//List
		Route::post('/product/store', 'Admin\ProductController@store')->name('admin.product.store');//Store
		Route::post('/product/update', 'Admin\ProductController@update')->name('admin.product.update');//Update
		Route::delete('/product/delete', 'Admin\ProductController@destroyMulti')->name('admin.product.delete');//Detroy

		//Product Detail
		Route::get('/product/detail/{product_id}', 'Admin\ProductController@show')->name('admin.product_detail.list');//List
		Route::post('/product/detail/{product_id}/store', 'Admin\ProductDetailController@store')->name('admin.product_detail.store');//Store
		Route::post('/product/detail/update', 'Admin\ProductDetailController@update')->name('admin.product_detail.update');//Store
		Route::get('/product/detail/{product_id}/delete/{product_detail_id}', 'Admin\ProductDetailController@destroy')->name('admin.product_detail.destroy');//Destroy

		//Gallery
		Route::get('/product/detail/gallery/{product_id}', 'Admin\GalleryController@index')->name('admin.product_detail.gallery');//List
		Route::post('/product/detail/gallery/{product_id}', 'Admin\GalleryController@store')->name('admin.product_detail.post_gallery');//Store
		Route::delete('/product/detail/gallery/delete/{product_id}', 'Admin\GalleryController@destroyMulti')->name('admin.product_detail.delete_gallery');//Detroy

		//Specification
		Route::post('/product/detail/specification/{product_id}', 'Admin\ProductDetailController@updateSpecification')->name('admin.product_detail.update_specification');//Update

		//Category
		Route::get('/category', 'Admin\CategoryController@index')->name('admin.category.list');//List
		Route::post('/category', 'Admin\CategoryController@store')->name('admin.category.store');//Store
		Route::post('/category/update', 'Admin\CategoryController@update')->name('admin.category.update');//Update
		Route::delete('/category/', 'Admin\CategoryController@destroy')->name('admin.category.delete');//Delete

		//Category
		Route::get('/brand', 'Admin\BrandController@index')->name('admin.brand.list');//List
		Route::post('/brand', 'Admin\BrandController@store')->name('admin.brand.store');//Store
		Route::post('/brand/update', 'Admin\BrandController@update')->name('admin.brand.update');//Update
		Route::delete('/brand/', 'Admin\BrandController@destroy')->name('admin.brand.delete');//Delete

		//User
		Route::get('/user', 'Admin\UserController@index')->name('admin.user.list');//List
		Route::post('/user', 'Admin\UserController@store')->name('admin.user.store');//Store
		Route::post('/user/change-password', 'Admin\UserController@changePassword')->name('admin.user.change');//Store
		Route::post('/user/update', 'Admin\UserController@update')->name('admin.user.update');//Update
		Route::delete('/user/', 'Admin\UserController@destroyMulti')->name('admin.user.delete');//Detroy


		Route::get('/user-profile/profile', 'Admin\UserController@getProfileUser')->name('admin.user.profile');//List

		//Comment
		Route::get('/product/detail/comment/{product_id}', 'Admin\CommentController@index')->name('admin.product_detail.comment');//List
		Route::delete('/product/detail/comment/delete/{product_id}', 'Admin\CommentController@destroyMulti')->name('admin.product_detail.delete_comment');//Detroy

		//Feedback
		Route::get('/feedback/', 'Admin\FeedbackController@index')->name('admin.feedback.list');//List
		Route::delete('/feedback/delete/', 'Admin\FeedbackController@destroyMulti')->name('admin.feedback.delete');//Detroy
		Route::post('/send-mail/', 'Admin\FeedbackController@sendMail')->name('admin.feedback.send_mail');//Detroy

		//Bill
		Route::get('/bill/', 'Admin\BillController@index')->name('admin.bill.list');//List
		Route::post('/bill/', 'Admin\BillController@update')->name('admin.bill.update');//Update
		Route::delete('/bill/', 'Admin\BillController@destroyMulti')->name('admin.bill.delete');//Detroy
		Route::get('/bill/export-pdf/', 'Admin\BillController@exportPDF')->name('admin.bill.export_pdf');//List

		//PayPal
		Route::get('/paypal/list', 'Admin\PayPalController@paymentList')->name('admin.paypal_list');

		Route::post('/search-paypal', 'Admin\PayPalController@searchPayPal')->name('admin.search_paypal');

		Route::get('/color/list', 'Admin\ColorController@index')->name('admin.color.list');
		Route::post('/color', 'Admin\ColorController@store')->name('admin.color.store');//Store
		Route::post('/color/update', 'Admin\ColorController@update')->name('admin.color.update');//Update
		Route::delete('/color/', 'Admin\ColorController@destroy')->name('admin.color.delete');//Delete
	});

	Route::get('/password2nd', 'Admin\UserController@getPassword2nd')->name('admin.password2nd');

	Route::post('/password2nd', 'Admin\UserController@checkPassword2nd')->name('admin.post_password2nd');

	Route::get('/logout', 'Admin\UserController@getLogout')->name('admin.logout');
});


Route::group(['middleware'=>'cart'],function (){//ReStore Cart to DB

	Route::group(['middleware'=>'user'],function (){//Must be Login to do 

		//Cart
		Route::get('/shopping-cart' , 'Frontend\ShopController@getCart')->name('frontend.shopping_cart');
		Route::post('/shopping-cart' , 'Frontend\ShopController@addCart')->name('frontend.post_shopping_cart');
		Route::delete('/shopping-cart' , 'Frontend\ShopController@deleteCart')->name('frontend.delete_shopping_cart');
		Route::post('/shopping-cart/update' , 'Frontend\ShopController@updateCart')->name('frontend.update_shopping_cart');

		//User
		Route::get('/user-profile', 'Frontend\UserController@getUserProfile')->name('frontend.user_profile');
		Route::post('/user-profile', 'Frontend\UserController@postUserProfile')->name('frontend.post_user_profile');
		Route::post('/change-password', 'Frontend\UserController@changePassword')->name('frontend.change_password');

		Route::get('/logout', 'Frontend\UserController@logout')->name('frontend.logout');

		//Feedback
		Route::post('/feedback/{product_id}', 'Frontend\UserController@postComment')->name('frontend.post_comment');
		Route::post('/feedback/', 'Frontend\UserController@postFeedback')->name('frontend.post_feedback');

		//Comment
		Route::delete('comment-delete', 'Frontend\UserController@deleteComment')->name('frontend.comment.delete');

		//Bill
		Route::post('/bill/' , 'Frontend\ShopController@postBill')->name('frontend.post_bill');

		//Checkout Paypal
		Route::get('/paypal', 'Frontend\PayPalController@index')->name('frontend.paypal');

		Route::get('/paypal/success', 'Frontend\PayPalController@successPaypal')->name('frontend.paypal_success');
	});

	Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');

	Route::get('/contact', 'Frontend\ContactController@index')->name('frontend.contact');
		
	Route::get('/shopping', 'Frontend\ShopController@index')->name('frontend.shopping');

	Route::get('/shopping/{product_id}' , 'Frontend\ShopController@show')->name('frontend.product');

	//User
	Route::get('/login', 'Frontend\UserController@getLogin')->name('frontend.login');

	//Reset Password
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');//Request Email
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');//Change Password
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');//Request Email
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset_post');//Change Password

	
	Route::post('/login', 'Frontend\UserController@postLogin')->name('frontend.post_login');

	//Thuận Make :))))))
	Route::get('/register', 'Frontend\UserController@getregister')->name('frontend.register');

	Route::post('/register', 'Frontend\UserController@postregister')->name('frontend.post.register');

	//Get Ajax
	Route::get('/ajax/get-cart', 'Frontend\ShopController@getCartAjax')->name('frontend.ajax.get_cart');

	Route::get('/ajax/get-size/{product_id}/{color_id}', 'Frontend\ShopController@getSizeAjax')->name('frontend.ajax.get_size');

	Route::get('/ajax/get-product-detail/{color_id}/{size}', 'Frontend\ShopController@getProductDetailAjax')->name('frontend.ajax.get_product_detail');


	//Pusher Notification
	Route::get('/testPusher', function () {
		return view('showNotification');
	});

	Route::get('getPusher', function (){
		return view('form_pusher');
	});

	Route::get('/pusher', function(Illuminate\Http\Request $request) {
		event(new App\Events\HelloPusherEvent($request));
		return redirect('getPusher');
	});
});




