<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Model\Palavras\Palavra;

use App\Model\Palavras\PalavraSugestao;

use App\User;

class AdminController extends Controller
{
	private $user;
    
	public function __construct()
    {
		
        $this->middleware('auth');
		
		$this->middleware(function ($request, $next) {
			
			$this->user = Auth::user();
			
			if(!$this->user->is_admin){
				abort(404);
			}
			
			return $next($request);
		});
    }
	
    public function formAdicionarPalavra()
    {
		$formInfo['title'] = 'Adicionar Palavra';
		$formInfo['action'] = url('admin/palavras/inserir');
		
        return view('palavras.form-palavra',compact('formInfo'));
    }    
	
	
	public function formEditarPalavra(Palavra $palavra, $id)
    {
		$formInfo['title'] = 'Editar Palavra';
		$formInfo['action'] = url('admin/palavras/editar');
		
		$palavra = $palavra->where('id',$id)->first();
		
		if(!$palavra) return redirect()->back();
		
        return view('palavras.form-palavra',compact('formInfo','palavra'));
    }	
	
	public function editarPalavra(Palavra $palavra, Request $request)
    {
		$dados = $request->all();
		
		$palavra = $palavra->where('id',$dados['id'])->first();
		
		if(!$palavra) return redirect()->back();
		
		$update = $palavra->update($dados);
		
		if($update)
			return redirect('/palavra/'. $dados['id']);
		
		return redirect()->back();
    }	
	
	public function deletarPalavra(Palavra $palavra, $id)
    {
		
		$palavra = $palavra->where('id',$id)->first();
		
		if(!$palavra) return redirect()->back();
		
		$delete = $palavra->delete();
		
		if($delete)
			return redirect('/home');
		
		return redirect()->back();
    }
	
	public function listaUsuarios(Request $request, User $user)
	{
		$dados = $request->all();
		
		if(isset($dados['search']))
			$user = $user->where('name','like',"%{$dados['search']}%")->oRwhere('email','like',"%{$dados['search']}%");
		
		$usuarios = $user->where('id','>',1)->paginate(20);
		
		return view('usuario.usuarios',compact('usuarios'));
	}
	
	public function deletarUsuario(User $user, $id)
	{
		$usuario = $user->where('id',$id)->first();
		$usuario->delete();
		
		return redirect()->back();
	}
	
	public function adicionarPalavra(Request $request, Palavra $palavra)
	{
		$this->validate($request, $palavra->rules);
		
		$dados = $request->all();
		
		$insert = $palavra->create($dados);
		
		if($insert){
			
			
			// quando for uma sugestao de algum usuario
			if(is_numeric($dados['id'])){
				
				$PS = new PalavraSugestao;
				$ps = $PS->where('id',$dados['id'])->first();
				
				$update = $ps->update(['status' => 2]);
			
			}
			
			return redirect('/palavra/'. $dados['id']);
		}
		return redirect('/home');
		
	}
	
	public function sugestoesPalavras(PalavraSugestao $palavra){
		
		$palavras = $palavra->where('status',1)->orderBy('id','desc')->paginate(20);
		
		return view('palavras.sugestoesPalavrasDeTodos',compact('palavras'));
	}
	
	public function sugestaoPalavra(PalavraSugestao $palavra, $id){
		
		$formInfo['title'] = 'Adicionar Sugestão de Palavra';
		$formInfo['action'] = url('admin/palavras/inserir');
		
		$palavra = $palavra->where('id',$id)->where('status',1)->first();
		
		if(!$palavra) return redirect()->back();
		
		return view('palavras.form-palavra',compact('palavra','formInfo'));
	}	
	
	public function recusarSugestaoPalavra(PalavraSugestao $palavra, $id)
    {
		$palavra = $palavra->where('id',$id)->first();
		
		if(!$palavra) return redirect()->back();
		
		$palavra->update(['status' => 3]);
		
        return redirect()->back();
    }
	
	public function deletarSugestaoPalavra(PalavraSugestao $palavra, $id)
    {
		
		$palavra = $palavra->where('id',$id)->first();
		
		if(!$palavra) return redirect()->back();
		
		$palavra->delete();
		
		return redirect()->back();
      
    }
	
}
