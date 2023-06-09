@extends('layouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('inc.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">mode_edit</i> Editar Área
          <button data-target="modal1" class="btn waves-effect waves-light modal-trigger right">Agregar Nueva</button>
        </h3>
        <div class="divider"></div>
      </div>
      {!! Form::open(['action' => ['DepartmentsController@update',$dept->id], 'method' => 'PATCH', 'class' => 'col m12']) !!}
      <div class="card z-depth-2">
        <div class="card-content">
          <div class="row">
            <div class="col m6 input-field">
              <i class="material-icons prefix">class</i>
              {{ Form::text('dptName', $dept->dptName, ['class' => 'validate', 'id' => 'department']) }}
              <label for="department">Nombre de Área</label>
            </div>      
          </div>
          <div class="row">
            <div class="col m6 input-field">
              {{ Form::submit('Guardar Cambios', ['class' => 'btn waves-effect waves-light']) }}
            </div>
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Agregar Nueva Área</h4>
    <div class="divider"></div>
    <div class="row">
      {!! Form::open(['action' => 'DepartmentsController@store', 'method' => 'POST', 'class' => 'col s12']) !!}
      <div class="input-field">
        {{ Form::text('dptName','', ['class' => 'validate', 'id' => 'dptName']) }}
        <label for="dptName">Nombre de Área</label>
      </div>
      <div class="input-field">
        {{ Form::submit('Agregar', ['class' => 'btn waves-effect waves-light']) }}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
