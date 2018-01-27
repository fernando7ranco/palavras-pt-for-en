<?php

namespace App\Model\Palavras;

use Illuminate\Database\Eloquent\Model;

class PalavraSugestao extends Model
{ 
	protected $table = 'sugestao_palavras';
	
    protected $fillable = [
        'user_id','palavra_pt', 'traducao_en', 'significado_pt', 'significado_en','status'
    ];
	
	public $rules = [
        'palavra_pt' => 'required', 
		'traducao_en' => 'required', 
		'significado_pt' => 'required', 
		'significado_en' => 'required'
    ];
	
	protected $dates = [
        'created_at',
        'updated_at'
    ];
	
	public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	public function getStatusAttribute()
    {
		switch($this->attributes['status']){
			case '1': $status = 'pendente'; break;
			case '2': $status = '<font color="green">aprovada</font>'; break;
			case '3': $status = '<font color="red">recusada</font>'; break;
			default: $status = null;
		}
		
        return "status: {$status}";
    }
}
