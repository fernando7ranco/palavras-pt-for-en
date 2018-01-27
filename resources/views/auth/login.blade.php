@extends('layouts.app')

@section('styles')
	<link href="{{ asset('css/socialbuttons.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Entrar</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite seu email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Digite sua senha" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Mantenha-me Logado
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Logar
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                   Você Esqueceu Sua Senha?
                                </a>
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                           
								<div class='iconeWebSite' id='facebookApp' onclick="window.open('{{url('/authsocial/redirectforfacebook')}}','_self')">
									<img src='img/icones/face.jpg' id='icone'>
									Logar com Facebook
								</div>
								
								<div class='iconeWebSite' id='googleApp' onclick="window.open('{{url('/authsocial/redirectforgoogle')}}','_self')">
									<img src='img/icones/google+.jpg' id='icone' >
									Logar com Google+
								</div>
								
							</div>
                        </div>
						
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
