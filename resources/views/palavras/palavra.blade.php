@extends('.layouts.app')
	
@section('styles')
	<style>
		#show-palavra p{
			margin-left:10px;
		}
		
		#marcacoes a{
			display:inline-block;
			cursor:pointer;
	
		}
		#marcacoes a span{
			font-size:22px;
		}
		#marcacoes span.loading{
			cursor:progress
		}
		
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
				
					<div class="panel-heading">Palavra</div>
						
						<div class="panel-body">
							@if(Auth::check() and Auth::user()->is_admin)
								<div style='margin:10px;'>
								
									<button class='btn btn-primary' onclick="window.open('{{url('admin/palavras/editar',@$palavra->id)}}','_self')">
										<span class='glyphicon glyphicon-pencil'></span> 
										Editar
									</button>
									
									<button class='btn btn-danger' data-toggle="modal" data-target="#myModal" >
										<span class='glyphicon glyphicon-trash'></span> 
										Excluir
									</button>
									
								</div>
								
								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Exclusão de Palavra</h4>
											</div>
											<div class="modal-body">
											você tem certeza que deseja excluir definitivamente está palavra: <strong>{{@$palavra->palavra_pt}}</strong>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
												<button type="button" class="btn btn-primary" onclick="window.open('{{url('admin/palavras/deletar',@$palavra->id)}}','_self')">Excluir</button>
											</div>
										</div>
									</div>
								</div>
							@endif
							
							<div class='row col-sm-12' id='show-palavra'>
							
								<p>{!! $palavra->status !!}</p>
								<label>Palavra em Português</label>
								<p><strong>{{$palavra->palavra_pt}}</strong></p>
								<label>Tradução em Inglês</label>
								<p><strong>{{$palavra->traducao_en}}</strong></p>
								<label>Significado em Português</label>
								<p>{{$palavra->significado_pt}}</p>
								<label>Significado em Inglês</label>
								<p>{{$palavra->significado_en}}</p>
								<p id='marcacoes' data-id="{{$palavra->id}}" >{!! $palavra->marcacoes() !!}</p>
							</div>
		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
@endsection

@section('scripts')
	@if(Auth::check())
		<script src="{{url('js/palavras/palavra.js')}}"></script>
	@endif
@endsection 

	