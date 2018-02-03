<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function exemplo($id){

        $exemplo = Professor::find($id);
        $status = new Professor;
        $status->exercicio5();
        return $exemplo;
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
