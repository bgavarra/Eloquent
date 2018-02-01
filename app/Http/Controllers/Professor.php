<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Professor;

class ProfessorController extends Controller
{

    public function index()
    {
      $profs = Professor::all();

      return view('professores',['professores' => $profs]);
    }


    public function insereProfessor(Request $request)
    {
      $prof=new Professor;
      $prof->nome=$request->nome;
      $prof->credencial=$request->credencial;
      $prof->disciplina=$request->disciplina;
      $prof->quantidade_turmas=$request->quantidade_turmas;
      $prof->total_alunos=$request->total_alunos;
      $prof->aprovados=$request->aprovados;
      $prof->horas_aula=$request->horas_aula;
      $prof->salario=$request->salario;
      $prof->email=$request->email;
      $prof->save();
      return back();
    }

    public function atualizaProfessor(Request $request, $id)
    {
      $prof = Professor::find($id);
      $prof->nome=$request->nome;
      $prof->credencial=$request->credencial;
      $prof->disciplina=$request->disciplina;
      $prof->quantidade_turmas=$request->quantidade_turmas;
      $prof->total_alunos=$request->total_alunos;
      $prof->aprovados=$request->aprovados;
      $prof->horas_aula=$request->horas_aula;
      $prof->salario=$request->salario;
      $prof->email=$request->email;
      $prof->save();
      return back();
    }


    public function deletaProfessor($id)
    {
      $prof = Professor::find(1);
      $prof->delete();
    }
}
