<?php
use \App\Http\Middleware\CheckStatus;
// // use Auth;
// use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/* ADMIN PANEL */
    
Route::get('/admin', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@index']);
Route::get('/admin/create-product', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@create']);
Route::get('/admin/store', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@store','as' => 'admin.store' ]);
Route::post('/admin/store', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@store']);
Route::get('/admin/show/{id}', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@show']);
Route::get('/admin/show/{id}/edit', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@edit']);
Route::put('/admin/show/{id}/edit/update', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@update', 'as' => 'admin.update']);
Route::delete('/admin/destroy/{id}', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@destroy', 'as' => 'admin.destroy']);
Route::get('/news/create', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'PostsController@create']);
Route::get('/news/store', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'PostsController@store','as' => 'news.store' ]);
Route::post('/news/store', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'PostsController@store']);
Route::get('/news/{id}/edit', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'PostsController@edit']);
Route::put('/news/{id}/edit/update', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'PostsController@update', 'as' => 'news.update']);
Route::delete('/news/destroy/{id}', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'PostsController@destroy', 'as' => 'news.destroy']);
Route::get('/admin/news', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@news']);
Route::get('/admin/mails', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@mailist']);
Route::get('/admin/newadmin', 'AdminController@newadmin');
Route::get('/admin/addadmin', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@addadmin','as' => 'admin.addadmin' ]);
Route::post('/admin/addadmin', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@addadmin']);
Route::get('/notadmin', 'PageController@NotAdmin');
Route::get('/admin/orders', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@orders']);
Route::delete('/admin/orders/destroy/{id}', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@deleteOrder', 'as' => 'admin.deleteorder']);

Route::get('/admin/edit-about-page/{id}/', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@editaboutpage']);
Route::put('/admin/edit-about-page/{id}/update', ['middleware' => ['auth','admin'], 'as' => 'admin', 'uses' => 'AdminController@updateaboutpage', 'as' => 'admin.updateaboutpage']);


/*ADMIN PANEL END */

/* SINGLE PAGES */
Route::get ('/', 'PageController@index');
Route::get ('/about-us', 'PageController@about');
Route::get('/news', 'PostsController@index');
Route::get('/news/{id}', 'PostsController@show');
Route::get('/subscribe', [
    'uses' => 'AdminController@store_mail',
    'as' => 'admin.store_mail'
]);
Route::post('/subscribe', 'AdminController@store_mail');
Route::get ('/contact', 'PageController@contact');
/* SINGLE PAGES END */

/* SHOP */

Route::get('/shop', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);
/* SHOP END */

/* USER */

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);

        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);

        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);

        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
});
/* USER END */