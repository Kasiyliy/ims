<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>InvestmentKZ</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{asset("admin/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("admin/bower_components/font-awesome/css/font-awesome.min.css")}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">На главную</a>
                    @else
                        <a href="{{ route('login') }}">Войти</a>

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{asset('kaz.png')}}" style="width: 50%" alt="">
                    <p>Инвестиции Казахстана!</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="m-b-md panel panel-primary">
                            <h4><a href="{{route('register',['type'=>'investor'])}}" class="btn btn-link">Регистрация Инвесторам</a></h4>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="m-b-md panel panel-danger">
                            <h4><a href="{{route('register',['type'=>'entrepreneur'])}}" class="btn btn-link text-success">Регистрация Предпренимателям</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
