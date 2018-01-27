<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Model\Palavras\PalavraSugestao;

use App\Model\Palavras\MarcacoesPalavra;

class UsuarioController extends Controller
{
	private $user;
	
	public function __construct()
    {
		
        $this->middleware('auth');
		
		$this->middleware(function ($request, $next) {
			
			$this->user = Auth::user();
			
			if($this->user->is_admin){
				abort(404);
			}
			
			return $next($request);
		});
		
		
    }
	
	public function minhasSugestoes(PalavraSugestao $palavra){
	
		$palavras = $palavra->where('user_id', $this->user->id)->orderBy('id','desc')->paginate(20);
		
		return view('palavras.sugestoesPalavras',compact('palavras'));
	}	
	
	public function minhasSugestao(PalavraSugestao $palavra, $id)
	{
		$palavra = $palavra->where('id',$id)->where('user_id', $this->user->id)->first();
		
		return view('palavras.sugestaoPalavra',compact('palavra'));
	}
	
    public function formAdicionarSugestaoPalavra()
    {

		$formInfo['title'] = 'Sugerir Palavra';
		$formInfo['action'] = url('usuario/sugestao/inserir');
		
        return view('palavras.form-palavra',compact('formInfo'));
    }   

	public function adicionarSugestaoPalavra(Request $request, PalavraSugestao $palavra)
	{
		$this->validate($request, $palavra->rules);
		
		$dados = $request->all();
		
		$dados['user_id'] = $this->user->id;
		
		$dados['status'] = 1;
		
		$insert = $palavra->create($dados);
		
		if($insert)
			$request->session()->flash('sucesso', true);
		
		return redirect()->back();
		
	}

	public function formEditarSugestaoPalavra(PalavraSugestao $palavra, $id)
    {
		$formInfo['title'] = 'Editar Sugestão de Palavra';
		$formInfo['action'] = url('usuario/sugestao/editar');
		
		$palavra = $palavra->where('id',$id)->where('user_id', $this->user->id)->first();
		
        return view('palavras.form-palavra',compact('formInfo','palavra'));
    }
	
	public function editarSugestaoPalavra(Request $request, PalavraSugestao $palavra)
	{
		$this->validate($request, $palavra->rules);
		
		$dados = $request->all();
		
		$palavra = $palavra->where('id',$dados['id'])->where('user_id', $this->user->id)->first();
		
		if(!$palavra) return redirect()->back();
			
		$update = $palavra->update($dados);
	
		
		return redirect('usuario/sugestao/palavra/'. $dados['id']);
		
	}
	
	public function deletarSugestaoPalavra(PalavraSugestao $palavra, $id)
    {
		
		$palavra = $palavra->where('id',$id)->where('user_id', $this->user->id)->first();
		
		if(!$palavra) return redirect()->back();
		
		$palavra->delete();
		
        return redirect('usuario/sugestao');
    }
	
	public function minhasMarcacoes(MarcacoesPalavra $mp)
	{
		$marcacoes = $mp->where('user_id', $this->user->id)->orderBy('id','desc')->paginate(20);
		
		return view('usuario.marcacoes',compact('marcacoes'));
	}
	
}
