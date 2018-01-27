$(function(){
	
	$('#marcacoes').delegate('label span:not(.loading)','click',function(){
		
		var idPalavra = $(this).parents('#marcacoes').data('id');
		var qual = $(this).parent('a').index() + 1;
		
		$(this).addClass('loading');
		
		$.ajax({
			url: 'marcacao',
			method:'POST',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: {qual: qual, id: idPalavra}
		}).done(function(re){
			$('#marcacoes').html(re);
		});
	});
	
});