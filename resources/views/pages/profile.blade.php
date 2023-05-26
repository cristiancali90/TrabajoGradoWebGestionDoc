@extends('layouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('inc.sidebar')
    </div>
    <div class="col m11">
    {!! Form::open(['action' => ['ProfileController@update', $acc->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
      {{ csrf_field() }}
      <div class="card hoverable">
        <div class="card-content">
          <div class="row">
            <div class="col m9">
              <div class="card-title">Información Actual</div>
              <div class="divider"></div>
              <div class="section">
                <div class="col m8 s12">
                  
                    <br>
                    <div class="input-field">
                      <i class="material-icons prefix">account_circle</i>
                      {{ Form::text('name',$acc->name,['id' => 'Name']) }}
                      <label for="Name" class="active">Nombre</label>
                    </div>
                    <br>
                    <div class="input-field">
                      <i class="material-icons prefix">email</i>
                      {{ Form::email('email',$acc->email,['id' => 'Email']) }}
                      <label for="Email" class="active">Correo Electrónico</label>
                    </div>
                    <br>
                    <div class="input-field">
                      {{ Form::submit('Guardar Cambios',['class' => 'waves-effect waves-light btn']) }}
                      <a href="#modal1" class="modal-trigger right">¿Desea Cambiar Su Contraseña?</a>
                    </div>
                  
                </div>
                <div class="col m4 hide-on-small-only">
                  <img src="/storage/images/user.jpg" class="responsive-img" alt="User Profile">
                </div>
              </div>
            </div>
            <div class="col m3">
              <div class="card-panel teal lighten-1 hide-on-med-and-down">
                <h4>Roles &amp; Permisos</h4>
                Su rol actual es 
                @hasrole('Root')  Root. <br>Por lo tanto, tiene todos los privilegios relacionados con documentos, usuarios, áreas, etc. Además, puede asignar roles y permisos y puede ver las actividades de los usuarios. @endhasrole
                @hasrole('Admin')  Administrador. <br>Por lo tanto, puede administrar usuarios en su área, cargar documentos y editarlos/compartirlos/eliminarlos. Puede ver sus registros de actividad pero no puede borrarlo. @endhasrole
                @hasrole('User')  Usuario. <br>Por lo tanto, puede cargar documentos y editarlos/compartirlos/eliminarlos. Puede ver su registro de actividad pero no puede borrarlo. @endhasrole
              </div>
            </div>
          </div>
        </div>
      </div>
    {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
  {!! Form::open(['action' => 'ProfileController@changePassword','method' => 'PATCH']) !!}
    {{ csrf_field() }}
  <div class="modal-content">
    <h4>Cambiar Contraseña</h4>
    <br>
    <div class="row">
        <div class="input-field col m4">
          <i class="material-icons prefix">vpn_key</i>
          {{ Form::password('current_password',['id' => 'current_password']) }}
          <label for="current_password">Contraseña Actual</label>
          @if ($errors->has('current_password'))
            <span class="red-text"><strong>{{ $errors->first('current_password') }}</strong></span>
          @endif
        </div>
        <div class="input-field col m4">
          <i class="material-icons prefix">vpn_key</i>
          {{ Form::password('new_password',['id' => 'new_password']) }}
          <label for="new_password">Nueva Contraseña</label>
          @if($errors->has('new_password'))
            <span class="red-text"><strong>{{ $errors->first('new_password') }}</strong></span>
          @endif
        </div>
        <div class="input-field col m4">
          <i class="material-icons prefix">vpn_key</i>
          {{ Form::password('new_password_confirmation',['id' => 'new_password_confirmation']) }}
          <label for="new_password_confirmation">Confirmar Contraseña</label>
          @if($errors->has('new_password_confirmation'))
            <span class="red-text"><strong>{{ $errors->first('new_password_confirmation') }}</strong></span>
          @endif
        </div>

    </div>
  </div>
  <div class="modal-footer">
    {{ Form::submit('Guardar Cambios',['class' => 'modal-action modal-close waves-effect waves-green btn']) }}
  </div>
  {!! Form::close() !!}
</div>
@endsection
