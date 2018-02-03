@extends('Layouts.layout')



@section('content')


<div class="well panel col-xs-12 col-md-12">


  <div class="panel panel-default col-xs-12 col-md-12">


    <div class="text-center">
        <h1>Novo Aluno</h1>
    </div>

    <div class="">

      <form class="form-horizontal" action="{{action('AlunoController@insereAluno')}}" enctype="multipart/form-data" method="POST">
          {{ csrf_field() }}
          {{method_field('POST')}}

          <div class="form-group">
            <label for="registro" class="col-xs-2 control-label">Registro:</label>
            <div class="col-xs-1">
              <input type="integer" class="form-control" name="registro" id="registro" placeholder="3000">
            </div>


            <label for="nome" class="col-xs-2 control-label">Nome:</label>
            <div class="col-xs-2">
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Joel Santana">
            </div>


            <label for="serie" class="col-xs-1 control-label">Série:</label>
            <div class="col-xs-1">
              <input type="integer" class="form-control" name="serie" id="serie" placeholder="1-8">
            </div>
          </div>

          <div class="form-group">
            <label for="turma" class="col-xs-2 control-label">Turma:</label>
            <div class="col-xs-1">
              <input type="integer" class="form-control" name="turma" id="turma" placeholder="101">
            </div>


            <label for="media" class="col-xs-2 control-label">Media:</label>
            <div class="col-xs-1">
              <input type="float" class="form-control" name="media" id="media" placeholder="10.00">
            </div>


            <label for="faltas" class="col-xs-2 control-label">Faltas:</label>
            <div class="col-xs-1">
              <input type="integer" class="form-control" name="faltas" id="faltas" placeholder="0 - 50">
            </div>
          </div>

          <br><br><br>


          <div class="text-right">
              <button type="submit" class="btn btn-success waves-effect waves-light">Inserir Aluno</button>
          </div>
        </form>

        <!-- teste de função da model -->
        <div>
            <form class="" action="{{action('AlunoController@getAluno')}}" enctype="multipart/form-data" method="POST">
              {{ csrf_field() }}

                <h4 class="">- - - - -Testando função da model- - - - -</h4>
              <div class="form-group">
                <label for="id" class="text-right col-xs-1 control-label">id:</label>
                <div class="col-xs-1">
                  <input type="integer" class="form-control" name="id" id="id" placeholder="1">
                </div>
              </div>

              <button type="submit" class="btn btn-info waves-effect waves-light">enviar id</button>
            </form>
          </div>
        <br>
      </div>
    </div>

<!-- começo da panel de listagem de alunos -->
    <div class="panel panel-default col-xs-12 col-md-12">
      <div class="text-center">
          <h1>Alunos</h1>
      </div>

      <div class="table-responsive col-xs-12 col-md-12">
        <table class="table table-bordered table-hover dt-responsive nowrap">
          <thead class="thead-inverse">
            <tr>
              <th>ID</th>
              <th>Registro</th>
              <th>Nome</th>
              <th>Serie</th>
              <th>Turma</th>
              <th>Media</th>
              <th>Faltas</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>

          <tbody class="">
          <!-- lista alunos do banco -->
            @foreach ($alunos as $aluno)

                <tr>
                  <td>{{$aluno->id}}</td>
                  <td>{{$aluno->registro}}</td>
                  <td>{{$aluno->nome}}</td>
                  <td>{{$aluno->serie}}</td>
                  <td>{{$aluno->turma}}</td>
                  <td>{{$aluno->media}}</td>
                  <td>{{$aluno->faltas}}</td>
                  <td>{{$aluno->status}}</td>
                  <td class="col-xs-2">

                      <form class="col-xs-12" action="{{action('AlunoController@deletaAluno', ['id' => $aluno->id])}}" method="POST">
                          <a class="btn btn-md btn-info" data-toggle="modal" data-target="#modal-editar-aluno-{{$aluno->id}}">
                            <i class="material-icons" data-toggle="tooltip" data-placement="top" data-title="Editar">edit</i>
                          </a>

                          {{method_field('DELETE')}}
                          {{csrf_field()}}
                          <button class="btn btn-md btn-danger" type="submit">
                              <i class="material-icons" data-toggle="tooltip" data-placement="top" data-title="Deletar" data-original-title="" title="">
                                delete_forever
                              </i>
                          </button>
                      </form>


                    </td>
                  </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>


    <!--Modal editar aluno  -->
    @foreach($alunos as $aluno)
        <div id="modal-editar-aluno-{{$aluno->id}}" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close material-icons" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Atualizar Aluno</h4>
                    </div>
                    <form class="form-horizontal form-label-left input_mask" action="{{action('AlunoController@atualizaAluno', ['id' => $aluno->id])}}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="modal-body">
                            <div class="col-md-12 has-feedback">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" name="nome" id="inputSuccess2" value="{{$aluno->nome}}">
                            </div>
                            <br><br><br>
                            <div class="col-md-12 has-feedback">
                                <label for="">Série</label>
                                <input type="integer" class="form-control" name="serie" id="inputSuccess2" value="{{$aluno->serie}}">
                            </div>
                            <br><br><br>
                            <div class="col-md-12 has-feedback">
                                <label for="">Turma</label>
                                <input type="integer" class="form-control" name="turma" id="inputSuccess2" value="{{$aluno->turma}}">
                            </div>
                            <br><br><br>
                            <div class="col-md-12 has-feedback">
                                <label for="">Média</label>
                                <input type="float" class="form-control" name="media" id="inputSuccess2" value="{{$aluno->media}}">
                            </div>
                            <br><br><br>

                            <div class="col-md-12 has-feedback">
                                <label for="">Faltas</label>
                                <input type="integer" class="form-control" name="faltas" id="inputSuccess2" value="{{$aluno->faltas}}">
                            </div>
                            <br><br><br>

                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success waves-effect waves-light">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

{!! csrf_field() !!}




</div>
@endsection
