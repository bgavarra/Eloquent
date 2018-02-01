<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    //-----------------------------------------------------------------
    //exemplo de função
    public function exemplo($id){

        $exemplo = Aluno::find($id);
        return $exemplo;
    }



    public function exercicio2($data){

    }

    public function exercicio5(Aluno $aluno){

    }

}
