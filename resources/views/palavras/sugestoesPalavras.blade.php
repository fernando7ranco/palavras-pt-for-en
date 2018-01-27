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
								 <li class="list-group-item" onclick='window.open("{{url("usuario/sugestao/palavra/$palavra->id")}}" ,"_self")' > 
									{{$palavra->palavra_pt }}
									<small>{!! $palavra->status !!}</small>
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
