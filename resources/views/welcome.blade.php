<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="{{url('bootstrap/css/glyphicon.css')}}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                right: 50px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
				display:inline-block;
				line-height:25px;
                color: #636b6f;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
			 .links > a:hover{
				 background-color:rgba(0,0,0,0.1);
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
                    <a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span> INICIO</a>
                    @if (Auth::guest())            
                        <a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> ENTRAR</a>
                        <a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> CADASTRAR-SE</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
					<span class="glyphicon glyphicon-book"></span>
                    <strong><font color='green'>PT</font></strong> For <strong><font color='blue'>EN</font></strong>
                </div>
            </div>
        </div>
    </body>
</html>
