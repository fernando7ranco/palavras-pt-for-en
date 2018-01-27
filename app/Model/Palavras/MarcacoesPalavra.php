<?php

namespace App\Model\Palavras;

use Illuminate\Database\Eloquent\Model;

class MarcacoesPalavra extends Model
{
	protected $table = 'marcacoes_palvras';
	
    protected $fillable = [
        'user_id', 'palavra_id', 'acao',
    ];
	
	public function palavra(){
		
        return $this->belongsTo('App\Model\Palavras\Palavra');
		
	}
	
	public function getMarcacaoAttribute()
	{
		if($this->attributes['acao'] == 1)
			return "<font color='green'>Gostei</font>";
		else
			return "<font color='red'>Não Gostei</font>";
	}
}
