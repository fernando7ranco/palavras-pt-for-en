@extends('layouts.app')

@section('styles')

	<style>
		.list-group li label{
			margin: 0px 10px;
			float:right;
			display:inline-block;
		}
		.list-group-item{
			cursor:pointer
		}
		.list-group-item small{
			margin-left:10px;
		}
	</style>
	
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Palavras</div>

                <div class="panel-body">
				
					<form id="form-palavra" action="{{url('postbuscarpalavras')}}" class="navbar-form navbar col-xs-12 col-sm-12" role="search">

						<div class="form-group">
							<input type="text" name='palavra' class="form-control" value="{{old('palavra') or ''}}" placeholder="Palavra">
						</div>
						
						<div class="form-group" >
							<select name='idioma'  class="form-control" id="empresa" >
								<option value='pt'>Português</option>
								<option value='en'>Inglês</option>
							</select>
						</div> 
						
						<button type='button' class="btn btn-default"  data-loading-text="Loading..." >Buscar</button>
					</form>
				
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<ul class="list-group  col-xs-12 col-sm-12" id='lista-de-palavras' ></ul>
						
					<div id='pagination'  class="row col-xs-12 col-sm-12">
						<h3>carregando ...</h3>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
	<script src="{{url('js/palavras/lista-palavras.js')}}"></script>
@endsection
