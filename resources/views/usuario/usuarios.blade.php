@extends('.layouts.app')

@section('styles')
	<style>
		.list-group-item{
			cursor:pointer
		}
		.list-group-item small{
			margin-left:10px;
		}
		.list-group-item .btn{
			float:right;
			margin-right:10px;
		}
	</style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			
                <div class="panel-heading">Usuários</div>
					
					<div class="panel-body">
					
						<form action="" class="form col-xs-12 col-sm-12" >

							<div class="form-group col-xs-6 col-sm-6">
								<input type="text" name='search' class="form-control" placeholder="Digite um Nome ou Email">
							</div>
							<div class="form-group col-xs-6 col-sm-6">
								<button class="btn btn-default"  data-loading-text="Loading..." >Buscar</button>
							</div>
						</form>
						<p>Atualmente o  sistema possui {{$usuarios->count()}} usuários</p>
						<ul class="list-group col-xs-12 col-sm-12">
							@foreach($usuarios as $usuario)
								 <li class="list-group-item" onclick='window.open("{{url("admin/usuario/deletar",$usuario->id)}}" ,"_self")' > 
									{{$usuario->name}}
									<small>- {{$usuario->email}}</small>
									<button class="btn btn-danger btn-xs">excluir</button>
								 </li>
							@endforeach
						</ul>
						<div class="row col-xs-12 col-sm-12">
							{!! $usuarios->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
@endsection 
