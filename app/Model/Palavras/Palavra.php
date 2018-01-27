<?php

namespace App\Model\Palavras;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Model\Palavras\MarcacoesPalavra;

class Palavra extends Model
{
    protected $fillable = [
        'palavra_pt', 'traducao_en', 'significado_pt', 'significado_en'
    ];
	
	public $rules = [
        'palavra_pt' => 'required', 
		'traducao_en' => 'required', 
		'significado_pt' => 'required', 
		'significado_en' => 'required'
    ];
	
	public function marcacoes(){
		
		$idPalavra = $this->attributes['id'];
		
		$acao = null;
		
	
		if(Auth()->check() and !Auth()->user()->is_admin ){
			$MP = new MarcacoesPalavra;
			$acao = $MP->where('palavra_id',$idPalavra)->where('user_id', Auth()->user()->id)->first();
		}
		
		$colors = [1=>'#000', 2=>'#000'];
		
		if($acao){
		
			if($acao->acao == 1) $colors[1] = "green'";
			
			if($acao->acao == 2) $colors[2] = "red";
			
		}	
		
		$num = $this->numerosMarcocoes();
		
		return "<label>
			<a><span class='glyphicon glyphicon-thumbs-up' style='color:{$colors[1]}' ></span> {$num['gostei']}</a>
			<a><span class='glyphicon glyphicon-thumbs-down' style='color:{$colors[2]}' ></span> {$num['naogostei']}</a>
		</label>";
	}
	
	public function numerosMarcocoes(){
		
		$idPalavra = $this->attributes['id'];
		
		$MP = new MarcacoesPalavra;
		
		$num['gostei'] = $MP->where('palavra_id',$idPalavra)->where('acao',1)->count();
		$num['naogostei'] = $MP->where('palavra_id',$idPalavra)->where('acao',2)->count();

		return $num;
	}
	
}
