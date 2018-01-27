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
			
                <div class="panel-heading">Marcações De Palavras</div>
					
					<div class="panel-body">
					
						<ul class="list-group">
							@foreach($marcacoes as $marcacao)
								 <li class="list-group-item" onclick='window.open("{{url("palavra",$marcacao->palavra->id)}}" ,"_self")' > 
									{{$marcacao->palavra->palavra_pt }}
									<small>- tradução: {{$marcacao->palavra->traducao_en}}</small>
									
									<small>- Marquei como: {!! $marcacao->marcacao !!}</small>
								 </li>
							@endforeach
						</ul>
						
						{!! $marcacoes->links() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
@endsection 
