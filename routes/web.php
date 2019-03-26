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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin.home', 'AdminController@index')->name('admin.home');

// Authentication Routes...
$this->get('admin-login', 'Admin\LoginController@showLoginForm')->name('admin-login');
$this->post('admin.login', 'Admin\LoginController@login');
$this->post('logout', 'Admin\LoginController@logout')->name('logout');



// Password Reset Routes...
if ($options['reset'] ?? true) {
    $this->get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    $this->post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    $this->get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    $this->post('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
}

// // Email Verification Routes...
// if ($options['verify'] ?? false) {
//     $this->emailVerification();
// }
