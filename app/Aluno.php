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


    public function exercicio2(){
      Aluno::where('status', 'aprovado')->first();
    }

    public function exercicio4($request, $id){
      $aluno_novo = Aluno::find($id);
      $aluno_novo->nome=$request->nome;
      $aluno_novo->serie=$request->serie;
      $aluno_novo->turma=$request->turma;
      $aluno_novo->faltas=$request->faltas;
      $aluno_novo->media=$request->media;
      $aluno_novo->save();
      return back();
    }

    public function exercicio5(){
      Aluno::where('media', '>', 6.90)
            ->update(['status' => 'aprovado']);
      Aluno::where('media', '<', 5)
            ->update(['status' => 'reprovado']);
      Aluno::where('media', '>', 5)
            ->where('media','<',7)
            ->update(['status' => 'em recuperação']);

    }

}
