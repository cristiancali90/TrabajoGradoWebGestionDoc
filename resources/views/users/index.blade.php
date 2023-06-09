@extends('layouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('inc.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">person</i> Usuarios
          <button data-target="modal1" class="btn modal-trigger right">Agregar Nuevo</button>
        </h3>
        <div class="divider"></div>
      </div>
      <div class="card z-depth-2">
        <div class="card-content">
          <table class="bordered centered highlight" id="myDataTable">
            <thead>
              <tr>
                  <th>Naombre</th>
                  <th>Rol</th>
                  <th>Área</th>
                  <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @if(count($users) > 0)
                @foreach($users as $user)
                  @if(!$user->hasRole('Root'))
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                    <td>{{ $user->department['dptName'] }}</td>
                    <td>
                      <!-- DELETE using link -->
                      {!! Form::open(['action' => ['UsersController@destroy', $user->id],
                      'method' => 'DELETE',
                      'id' => 'form-delete-users-' . $user->id]) !!}
                      <a href="#" class="left"><i class="material-icons">visibility</i></a>
                      <a href="/users/{{ $user->id }}/edit" class="center"><i class="material-icons">mode_edit</i></a>
                      <a href="" class="right data-delete" data-form="users-{{ $user->id }}"><i class="material-icons">delete</i></a>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endif
                @endforeach
              @else
                <tr>
                  <td colspan="4"><h5 class="teal-text">No Hay Usuarios Creados Aún</h5></td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
  {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST', 'class' => 'col s12']) !!}
  <div class="modal-content">
    <h4>Add User</h4>
    <div class="divider"></div>
      <div class="row">
        <div class="col m6 s12 input-field">
          <i class="material-icons prefix">account_circle</i>
          {{ Form::text('name','',['class' => 'validate', 'id' => 'name']) }}
          <label for="name">Nombre</label>
        </div>
        <div class="col m6 s12 input-field">
          <i class="material-icons prefix">email</i>
          {{ Form::email('email','',['class' => 'validate', 'id' => 'email']) }}
          <label for="email">Correo Electrónico</label>
        </div>
      </div>
      <div class="row">
        <div class="col m6 s12 input-field">
          <i class="material-icons prefix">group</i>
          <select name="department_id" id="department_id">
            <option value="" disabled selected>Seleccionar Área</option>
            @if(count($depts) > 0)
              @if(Auth::user()->hasRole('Root'))
                @foreach($depts as $dept)
                <option value="{{ $dept->id }}">{{ $dept->dptName }}</option>
                @endforeach
              @elseif(Auth::user()->hasRole('Admin'))
                <option value="{{ Auth::user()->department_id }}">{{ Auth::user()->department['dptName'] }}</option>
              @endif
            @endif
          </select>
          <label for="department_id">Área</label>
        </div>
        <div class="col m6 s12 input-field">
          <i class="material-icons prefix">assignment_ind</i>
          <select name="role" id="role">
            <option value="" disabled selected>Asignar Rol</option>
            @if(count($roles) > 0)
              @foreach($roles as $role)
              <option value="{{ $role->id }}">{{ $role->name }}</option>
              @endforeach
            @endif
          </select>
          <label for="role">Rol</label>
        </div>
      </div>
      <div class="row">
        <div class="col m6 s12 input-field">
          <i class="material-icons prefix">vpn_key</i>
          {{ Form::password('password',['class' => 'validate', 'id' => 'password']) }}
          <label for="password">Contraseña</label>
        </div>
        <div class="col m6 s12 input-field">
          <i class="material-icons prefix">vpn_key</i>
          {{ Form::password('password_confirmation',['class' => 'validate', 'id' => 'password-confirm']) }}
          <label for="password-confirm">Confirmar Contraseña</label>
        </div>
      </div>
  </div>
  <div class="modal-footer">
    {{ Form::submit('submit',['class' => 'btn']) }}
  </div>
  {!! Form::close() !!}
</div>
@endsection
