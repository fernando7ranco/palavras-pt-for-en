<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Palavras\Palavra;
use App\Model\Palavras\MarcacoesPalavra;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }  

	public function bucarPalavra(Palavra $palavra, Request $request)
    {
		$dados = $request->all();
		
		if($dados['idioma'] == 'pt')
			$campo = 'palavra_pt';
		
		if($dados['idioma'] == 'en')
			$campo = 'traducao_en';
	
		$palavras = $palavra->where($campo, 'like', "%{$dados['palavra']}%")->orderBy($campo)->paginate(20);
		
		$estrutura = '';
		
		foreach($palavras as $palavra){
			$estrutura.= "<li class='list-group-item' data-id='{$palavra->id}'> 
				<strong>{$palavra->palavra_pt }</strong>
				<small>- tradução: {$palavra->traducao_en}</small>
				{$palavra->marcacoes()}							
			</li>";
		}
		
		return response()->json([$estrutura, e($palavras->links())]);
	}
	
	public function palavra(Palavra $palavra, $id){
		

		$palavra = $palavra->where('id',$id)->first();
		
		if(!$palavra) return redirect()->back();
		
		return view('palavras.palavra',compact('palavra'));
	}	
	
    public function palavraMarcacao(Palavra $palavra, Request $request){
		
		$dados = $request->all();
		
		if(($dados['qual'] == 1 or $dados['qual'] == 2) and Auth()->check() and !Auth()->user()->is_admin ){
			
			$palavra = $palavra->where('id', $dados['id'])->first();
			
			if(!$palavra) return false;
			
			$MP = new MarcacoesPalavra;
			
			$acao = $MP->where('palavra_id', $palavra->id)->where('user_id', Auth()->user()->id)->first();
		
			
			if($acao){
				
				if($acao->acao == $dados['qual'])
					$acao->delete();
				else
					$acao->update(['acao' => $dados['qual']]);
			
			}else{
				
				$MP->create([
					'user_id' => Auth()->user()->id,
					'palavra_id' => $palavra->id,
					'acao' => $dados['qual']
				]);
			}
			
			$palavra = $palavra->where('id', $dados['id'])->first();
			
			return $palavra->marcacoes();
		}
		return false;
		
	}	
       
}
