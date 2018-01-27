@extends('.layouts.app')

@section('styles')
	<style>
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
			
                <div class="panel-heading">Sugestôes de Palavras</div>
					
					<div class="panel-body">
			
						<ul class="list-group">
							@foreach($palavras as $palavra)
								<li class="list-group-item" > 
									<p>Sugestão - {{$palavra->created_at->format('Y/m/d')}}</p>
									<p> <a>Nome: {{$palavra->user->name}}</a> <a>Email: {{$palavra->user->email}}</a></p>
									<label>Palavra em Português</label>
									<p><strong>{{$palavra->palavra_pt}}</strong></p>
									<label>Tradução em Inglês</label>
									<p><strong>{{$palavra->traducao_en}}</strong></p>
									<label>Significado em Português</label>
									<p>{{$palavra->significado_pt}}</p>
									<label>Significado em Inglês</label>
									<p>{{$palavra->significado_en}}</p>
									<button class='btn btn-primary' onclick='window.open("{{url("admin/sugestoes/sugestao/$palavra->id")}}" ,"_self")' >publicar</button>
									<button class='btn btn-default' onclick='window.open("{{url("admin/sugestoes/recusar/$palavra->id")}}" ,"_self")' >recusar</button>
									<button class='btn btn-danger' onclick='window.open("{{url("admin/sugestoes/deletar/$palavra->id")}}" ,"_self")' >excluir</button>
								</li>
							@endforeach
						</ul>
						
						{!! $palavras->links() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
@endsection 
