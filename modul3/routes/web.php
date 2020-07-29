<?php

use App\Http\Controllers\DictionaryController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('homepage');
});

Route::get('/hello/{name?}', function ($name = null) {
    if ($name) {
        return view('Laracasts');
    } else {
        echo "hello you";
    }
});
Route::get('logins/login', function () {
    return view('logins.login');
});
Route::post('login', function (Illuminate\Http\Request $request) {
    if ($request->email == 'admin' && $request->password == 'admin') {
        $welcom = "<script>alert('welcom')</script>";
        return view('logins.admin', ['welcom' => $welcom]);
    } else {
        $error = "<script>alert('Email và mật khẩu không đúng')</script>";
        return view('logins.loginerror', ['error' => $error]);
    }
});
Route::get('calculaters/index', function () {
    return view('calculaters.index');
});
Route::post('calculaters/index', function (Illuminate\Http\Request $request) {
    $Price = $request->Price;
    $Percent = $request->Percent / 100;
    $DiscountAmount = $Price * $Percent * 0.1;
    $DiscountPrice =  $Price - $DiscountAmount;
    return view('calculaters.display-discount', [
        'DiscountAmount' => $DiscountAmount,
        'DiscountPrice' => $DiscountPrice
    ]);
});
Route::get('distionaries/index', function () {
    return view('distionaries.index');
});
Route::post('distionaries/index', function (Illuminate\Http\Request $request) {
    $name = $request->text;
    $result = '';
    if ($request->choose == "Việt-Anh") {
        $arrDictionary = [
            "nhà" => "home",
            "chợ" => "market",
            "đi"  => "go"
        ];
        foreach ($arrDictionary as $key => $val) {
            if ($name == $key) {
                return $result = $val;
            }
            return " Từ bạn tìm không có trong từ điển";
        }
        return view('distionaries.index', ['result' => $result]);
    } elseif ($request->choose == "Anh-Việt") {
        $arrDictionary = [
            "home" => "nhà",
            "market" => "chợ",
            "go"  => "đi"
        ];
        foreach ($arrDictionary as $key => $val) {
            if ($name == $key) {
                return $result = $val;
            }
            return " Từ bạn tìm không có trong từ điển";
        }
        return view('distionaries.index', ['result' => $result]);
    }
});
Route::get('times/index', function () {
    return view('times.index');
});
Route::post('times/index', 'TimeController@index');


Route::group(['prefix' => 'customers'], function(){
    Route::get('index','ManagerController@index');
    Route::get('create', 'ManagerController@create');
    Route::get('delete/{id}', 'ManagerController@delete');
    Route::get('edit/{id}', 'ManagerController@edit');
});

Route::post('store', function () {

});


Route::get('/services', 'ServiceController@index');
Route::post('/services', 'ServiceController@store');

Route::get('/customers', 'ManagerController@store')->name('customers.index');
Route::get('/customers/{manager}', 'ManagerController@show');
Route::post('/customers/store', 'ManagerController@store');
Route::get('/customers/delete/{id}', 'ManagerController@delete')->name('customers.delete');
Route::get('/customers/edit/{id}', 'ManagerController@edit')->name('customers.edit');
Route::put('/customers/update/{id}', 'ManagerController@update')->name('customers.update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'tasks'], function () {
    Route::get('/index', 'TaskController@index')->name('tasks.index');
    Route::get('/list', 'TaskController@select')->name('tasks.list');
    Route::get('/add', 'TaskController@add')->name('tasks.add');
    Route::post('/store', 'TaskController@store')->name('tasks.store');
});

Route::group(['prefix' => 'guests'], function () {
    Route::get('/index', 'GuestController@index')->name('guests.index');
    Route::get('/{id}/edit', 'GuestController@edit')->name('guests.edit');
    Route::post('/{id}/edit', 'GuestController@update')->name('guests.update');
    Route::get('/create', 'GuestController@create')->name('guests.create');
    Route::post('/create', 'GuestController@store')->name('guests.store');
    Route::get('/{id}/destroy', 'GuestController@destroy')->name('guests.destroy');
});

Route::group(['prefix' => 'Product'],function(){
    Route::get('/index', 'ProductController@index')->name('product.index');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::get('/show/{id}', 'ProductController@show')->name('product.show');
});

Route::group(['prefix' => 'carts'], function () {
    Route::get('/index', 'CartController@index')->name('carts.index');
    Route::get('/cart/{id}', 'CartController@cart')->name('carts.cart');
    Route::get('/deleteCart/{id}', 'CartController@deleteCart')->name('carts.deleteCart');
});
