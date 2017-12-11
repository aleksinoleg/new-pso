<?php
/**
 * Old routes
 */

$path = (isset($_SERVER['REQUEST_URI']))?$_SERVER['REQUEST_URI']:'/';
$path = urldecode($path);


if($path=='/'){
    $lang = env('DEFAULT_LANG');
}else{
    $lang = \App\Http\Controllers\PageController::getCurLang();
}

\App\Http\Controllers\RedirectController::returnRedirects($lang, $path);


Route::get('affiliate/{aff_id}/{banner_id}/{lang}/{url?}',[
    'uses'=>'AffiliateController@index',
    'as'=>'affiliate'
]);

Route::any('payment-success','PageController@paymentSuccess');
Route::any('payment-failed','PageController@paymentFailed');
Route::any('paypal-payment','PageController@paypalPayment');

Route::post('/saveAnswer',[
    'uses'=>'VoteController@saveAnswer'
]);
Route::post('/cart',[
    'uses'=>'CartController@addToCart'
]);
Route::get('/admin/dellCart/{id}', [
    'uses'=>'CartController@dell_cart'
]);
Route::post('/proceed_order',[
    'uses'=>'OrderController@proceed'
]);
Route::post('/finish_order',[
    'uses'=>'OrderController@finishOrder'
]);

Route::get('/admin/getStates/{id}', 'PageController@getStates');
Route::get('/admin/getStates_shipping/{id}', 'PageController@getStates_shipping');
Route::get('/admin/getStates_c/{id}', 'PageController@getStates_c');
Route::get('/admin/getStates_shipping_c/{id}', 'PageController@getStates_shipping_c');

Route::post('/get_discount_first_time', 'DiscountController@firstTime');
Route::post('/checkUniqueEmail', 'DiscountController@checkUniqueEmail');
Route::post('/checkDiscount', 'DiscountController@checkDiscount');

Route::post('/admin/save_review', 'ReviewController@store');

Route::post('/admin/customer_login', 'CustomerController@login');
Route::post('/admin/customer_auth_shipping', 'CustomerController@customer_auth_shipping');
Route::post('/admin/customer_register', 'CustomerController@register');
Route::post('/admin/customer_register_shipping', 'CustomerController@register_shipping');

Route::get('/admin/customer_logout', function(){
    session()->forget('customer');
    return redirect()->back();
});

Route::post('/admin/forget_pass', 'CustomerController@forget_pass');
Route::post('/admin/forget_pass_shipping', 'CustomerController@forget_pass_shipping');
Route::post('/admin/update-customer/{id}', 'CustomerController@update');

Route::get('/admin/pay-order/{method}/{id}', 'OrderController@repayOrder');

Route::get('/admin/addProdToCart/{id}/{link}/{lang}', 'CartController@addProdToCart');

Route::post('/admin/contact-us', 'CustomerController@contactUs');

Route::post('local-store', 'LocalStoreController@saveLocalStore');
Route::post('saveLocalStoreEmail', 'LocalStoreController@saveLocalStoreEmail');
Route::get('/admin/answer/{id}', [
    'uses' => 'QuestionController@answerQuestion',
    'middleware'=>'auth',
]);
Route::post('/admin/ask_question', 'QuestionController@askQuestion');

Route::get('/admin/get_article/{id}/{count}', 'PageController@getBlogArticle');
Route::get('/admin/get_question/{prod_id}/{count}', 'PageController@getQuestionByScroll');

Route::get('/admin/free-soap/{email}', 'PageController@freeSoap');
Route::post('/admin/leave_email_review', 'ReviewController@leave_email_review');
Route::post('/admin/addOneTo', 'OrderController@addOneTo');
Route::post('/admin/removeOneTo', 'OrderController@removeOneTo');
Route::post('/admin/toMail', 'CustomerController@toMail');

Route::get('admin/unsubscribe/{lang}/{email}/{subject}', 'CustomerController@unsubscribe');
Route::post('admin/unsubscribe', 'CustomerController@doUnsubscribe');
Route::post('/admin/page-to-page', 'PageController@page_to_page');

Auth::routes();

Route::get('/logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('page');
});
if(env('REGISTRATION')==false){
    Route::get('/register',function (){
        return redirect()->route('page');
    })->name('register');
}

/**
 * Routes for all Admins
 */
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('{method}/{lang}/{id?}/{type?}', [
        'uses'=>'Admin\AdminController@index',
        'as'=>'admin'
    ]);

    Route::post('{action}/{target}/{lang}', [
        'uses'=>'Admin\AdminController@post',
        'as'=>'admin.post'
    ]);
});
/**
 * Redirect Routes
 */
Route::get('/admin',function (){
    return redirect()->route('admin',['method'=>'index','lang'=>env('DEFAULT_LANG')]);
});
Route::get('/'.env('DEFAULT_LANG').'/',function (){
    return redirect()->route('page');
});

/**
 * Routes for Clients
 */

Route::get('{lang?}/{url?}', [
    'uses'=>'DispatcherController@index',
    'as'=>'page',
    'middleware' => ['SendStatistic','SendUniqueUser']
])->where('lang','^[en||es||it||fr||de||cz||ua||ru]{2}$');
