$(function(){
	
	buscarPalavras('');
	
	function buscarPalavras(caminho,$btn){

		if(!caminho) caminho = $('#form-palavra').attr('action');
	
		var dados = {};
		
		dados['palavra'] = $('#form-palavra input').val().trim();
		dados['idioma'] = $('#form-palavra select option:selected').val();
	
		$.ajax({
			url: caminho,
			method:'POST',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: dados,
			dataType:'JSON'
		}).done(function(re){
			
			re[0] = re[0] ? re[0] : '<p>nenhuma palavra encontrada</p>';
			
			$('#lista-de-palavras').html(re[0]);
			
			if($btn)
				$btn.button('reset');
			
			$('#pagination').html(re[1]);
		});
	}
	
	$('#form-palavra button').click(function(){
		var $btn = $(this).button('loading');
		buscarPalavras('',$btn);
	});
	
	$('#pagination').delegate('li:not(.active,#active,.disabled)','click',function(){
		
		$(this).attr('id','active');
		$(this).find('a').text('#');
		
		buscarPalavras($(this).find('a').attr('href'),'');
		
		return false;
	});
	
	$('#lista-de-palavras').delegate('li','click',function(){
		
		location.href = "palavra/"+$(this).data('id');
		
	});
});