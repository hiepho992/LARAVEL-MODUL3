<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> {{env('APP_NAME')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

     <!-- CSS -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <style>

            @import url('https://fonts.googleapis.com/css?family=Nunito');

            @import 'variables';

            @import '~bootstrap/scss/bootstrap';
                .navbar-laravel {
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
                }
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        .customer{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .customer table,tr,th,td{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            align-items: center;
        }
        .login>form{
            display: flex;
            flex-direction: column;
        }
        .login>form>input{
            width: 300px;
            height: 25px;

        }
        .login>form>input, .login>form>label, h3{
            margin: 5px;
        }
        .main-content>form{
            align-items: center;
            display: flex;
        }
        .main-content>form>select{
            height: 30px;
            width: 300px;
            text-align: center;
            font-size: 25px;
        }
        .main-content>form>input{
            height: 30px;
        }
        #showtable{
            display: none;
        }
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
                }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        </style>
    </head>
<body>
    <header>
        <div class="content">
            <div class="links">
                <a href="/">Home</a>
                <a href="/home">LOGIN</a>
                <a href="/logins/login">logining</a>
                <a href="/calculaters/index">calculaters</a>
                <a href="/distionaries/index">Từ điển</a>
                <a href="/times/index">Time zone</a>
                <a href="/customers/index">customers</a>
                <a href="/services">Services</a>
                <a href="{{ route('tasks.index') }}">Task Managers</a>
                <a href="{{ route('guests.index') }}">Guests</a>
            </div>
        </div>
    </header>
