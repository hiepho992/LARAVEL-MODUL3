<?php

use App\Http\Controllers\DictionaryController;
use Illuminate\Support\Facades\Route;

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
    $name = "<script>alert('hello 123')</script>";
    return view('welcome', ['name' => $name]);
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
