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


Route::get('/','IndexController@index')->name('index');
Route::get('/users/{username}',['uses' => 'IndexController@showUserProfile'])->name('show.user');
// lang
Route::get('/lang/{locale}',['uses' => 'LanguageController@switchLang','as' => 'lang.switch']);


// users
Route::get('/register','UsersController@register')->name('register');
Route::post('/register','UsersController@registerPost')->name('register');
Route::post('/update-user-settings', ['middleware' => 'auth','uses' => 'UsersController@updateSettings'])->name('update.user.settings');
Route::post('/upload-pic', ['middleware' => 'auth','uses' => 'UsersController@upload',])->name('user.upload.pic');
Route::post('/upload-cover', ['middleware' => 'auth','uses' => 'UsersController@uploadCover'])->name('user.upload.cover');
Route::get('/userd/settings',['middleware' => 'auth','uses' => 'UsersController@settings'])->name('user.settings');
// users login
Route::get('/login','UsersController@login')->name('login');
Route::post('/login',['uses' => 'UsersController@loginPost','as' => 'login.user']);



// comps
Route::post('/update-comp-settings', ['middleware' => 'comp','uses' => 'CompController@updateSettings'])->name('update.comp.settings');
Route::post('/new-service', ['middleware' => 'comp','uses' => 'CompController@newService'])->name('new-service');
Route::post('/new-miss', ['middleware' => 'comp','uses' => 'CompController@newMiss'])->name('new-miss');
Route::get('/new-service', ['middleware' => 'comp','uses' => function(){ return '';}])->name('new-service');
Route::post('/upload-pic-comp', ['middleware' => 'comp','uses' => 'CompController@upload'])->name('comp.upload.pic');
Route::post('/upload-cover-comp', ['middleware' => 'comp','uses' => 'CompController@uploadCover'])->name('comp.upload.cover');
Route::get('/compd/settings',['middleware' => 'comp','uses' => 'CompController@settings'])->name('comp.settings');
Route::get('/comp-register','CompController@register')->name('comp-register');
Route::post('/comp-register','CompController@registerPost')->name('comp-register');
// show missions and services requests
Route::get('/compd/miss-requests/{miss}',['middleware' => 'comp' ,'uses' => 'CompController@showMissionRequests'])->name('miss-requests');
Route::get('/compd/serv-requests/{serv}',['middleware' => 'comp' ,'uses' => 'CompController@showServiceRequests'])->name('serv-requests');
// logo miss / service
Route::post('/upload-serv-logo', ['middleware' => 'comp','uses' => 'CompController@uploadServiceLogo'])->name('service.upload.logo');
Route::post('/upload-miss-logo', ['middleware' => 'comp','uses' => 'CompController@uploadMissLogo'])->name('miss.upload.logo');
// comps login
Route::get('/comp-login','CompController@login')->name('login.comp');
Route::post('/comp-login',['uses' => 'CompController@loginPost','as' => 'login.comp']);


// admin login
Route::get('/admin-login','AdminController@login');
Route::post('/admin-login',['uses' => 'AdminController@loginPost','as' => 'login.admin']);

/*
 * #**********NOTE************#
 * # these is testing routes  #
 * # we will generate         #
 * # fucntions for thiese     #
 * # routes                   #
 * #**************************#
 */
Route::get('admind', [
    'middleware' => 'admin',
    'uses' => function(){
        $admin = Auth::guard('admin')->user();
        echo '<h2>Admin panel</h2>';
        echo "Your email is: " . $admin->admin_email;
        echo "<br/>";
        echo '<a href="'. route('logout') .'">Logout</a>';
    }
]);

Route::get('compd', [
    'middleware' => 'comp',
    'uses' => 'CompController@compDB'
])->name('compd');

Route::get('userd', [
    'middleware' => 'auth',
    'uses' => 'UsersController@userDB'
])->name('userd');

Route::post('/logout', function(){
    Auth::guard('comp')->logout();
    Auth::guard('admin')->logout();
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/confirm/user/{ccode}',[
    'uses' => 'UsersController@confirmUser'
])->name('confirm.user');

Route::get('/confirm/comp/{ccode}',[
    'uses' => 'CompController@confirmComp'
])->name('confirm.comp');

Route::get('/logout', function(){
    Auth::guard('comp')->logout();
    Auth::guard('admin')->logout();
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/mail', 'IndexController@mail');
?>