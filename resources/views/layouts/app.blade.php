<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title>{{ config('app.name', 'DIFonary') }}</title>
		
		<!-- Styles -->
		<link href="{{url('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		@yield('styles')
		<!-- Scripts -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>		
		@yield('scripts')
	</head>
	<body>
		<div id="app">
			
			<header class="container" style="margin-top:10px">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							
							<!-- Collapsed Hamburger -->
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
							<!-- Branding Image -->
							<a class="navbar-brand" href="{{ url('/') }}">
								<span class="glyphicon glyphicon-book"></span>
								<strong><font color='green'>PT</font> For <font color='blue'>EN</font></strong>
							</a>
						</div>
						
						<div class="collapse navbar-collapse" id="app-navbar-collapse">
							<!-- Left Side Of Navbar -->
							<ul class="nav navbar-nav">
								<li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span> INICIO</a></li>
								
								@if (Auth::check())
								
									@if(Auth::user()->is_admin)
										<li><a><strong><span class="glyphicon glyphicon-wrench"></span> ADMINISTRAÇÃO</strong></a></li>
									@else
										<li><a href="{{ url('/usuario/sugestao/adicionar') }}"><span class="glyphicon glyphicon-plus"></span> SUGERIR PALAVRA</a></li>
										
									@endif
								@endif
							</ul>
							
							<!-- Right Side Of Navbar -->
							<ul class="nav navbar-nav navbar-right">
								<!-- Authentication Links -->
								@if (Auth::guest())
								<li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> ENTRAR</a></li>
								<li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> CADASTRAR-SE</a></li>
								@else
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										<span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
									</a>
									
									<ul class="dropdown-menu" role="menu">
										@if(Auth::user()->is_admin)
							
											<li><a href="{{ url('/admin/palavras/adicionar') }}"><span class="glyphicon glyphicon-plus"></span> ADICIONAR PALAVRAS</a></li>
											<li><a href="{{ url('/admin/sugestoes') }}"><span class="glyphicon glyphicon-question-sign"></span> SUGESTÔES DE PALAVRAS</a></li>
											<li><a href="{{ url('/admin/usuarios') }}"><span class="glyphicon glyphicon-user"></span> USUÁRIOS DO SISTEMA</a></li>
										@else
											<li><a href="{{ url('/usuario/sugestao') }}">MINHAS SUGESTÔES DE PALAVRAS</a></li>
											<li><a href="{{ url('usuario/marcacoes') }}">MINHAS MARCAÇÕES</a></li>
										@endif
											<li>  
											<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
												<span class="glyphicon glyphicon-log-out"></span> SAIR
											</a>
											
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</li>
									</ul>
								</li>
								@endif
							</ul>
						</div>
					</div>
				</nav>
			</header>
			
			@yield('content')
			
			
		</body>
	</html>
