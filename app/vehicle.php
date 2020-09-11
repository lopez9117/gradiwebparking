<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    

			protected $table ='vehicles';


    protected $fillable = ['id','placa', 'tipodevehiculo', 'marca','userid'];



     public function user()
    {
        return $this->belongsTo('App\User');
    }

}
