@extends('.layouts.app')

@section('styles')
	<style>

		form textarea{
			min-height:130px;
			resize: vertical;
		}

	</style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			
                <div class="panel-heading">{{$formInfo['title']}}</div>
					
					<div class="panel-body">
					
						@if( isset($errors) and count($errors) )
							<div class='alert alert-danger'>
								@foreach($errors->all() as $erro)
									<p>{{@$erro}}</p>
								@endforeach
							</div>	
						@endif
						
						@if(Session::has('sucesso'))
							<div class="flash-message">
								<p class="alert alert-success">Inserção Completa</p>
							</div>
						@endif
					
						<form class='col-sm-8' method='POST' action="{{ $formInfo['action'] }}">
							{!! csrf_field() !!}
							
							<input type="hidden" name='id' value='{{$palavra->id or ''}}'>
							
							<div class="form-group">
								<label for="palavra_pt">Palavra em Português:</label>
								<input type="text" name='palavra_pt' value="{{$palavra->palavra_pt or old('palavra_pt')}}" class="form-control" id="palavra_pt" placeholder='digite a palavra em português' required>
							</div>
							
							<div class="form-group">
								<label for="traducao_en">Tradução para Inglês:</label>
								<input type="text" name='traducao_en' value="{{$palavra->traducao_en or old('traducao_en')}}" class="form-control" id="traducao_en" placeholder='digite a tradução da palavra para o inglês' required>
							</div>
						
							<div class="form-group">
								<label for="significado_pt">Significado em Português:</label>
								<textarea name='significado_pt' class="form-control" rows="5" id="significado_pt" placeholder='digite o significado da palavra em português' required>{{$palavra->significado_pt or old('significado_pt')}}</textarea>
							</div>
							
							<div class="form-group">
								<label for="significado_en">Significado em Inglês:</label>
								<textarea name='significado_en' class="form-control" rows="5" id="significado_en" placeholder='digite o significado da palavra em inglês' required>{{$palavra->significado_en or old('significado_en')}}</textarea>
							</div>
							
							<button type="submit" class="btn btn-default">SALVAR</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
@endsection 
