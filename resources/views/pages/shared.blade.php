@extends('layouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('inc.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">share</i> Documentos Compartidos</h3>
        <div class="divider"></div>
      </div>
      <div class="card">
        <div class="card-content">
          <table class="bordered centered highlight responsive-table" id="myDataTable">
            <thead>
              <tr>
                  <th>Nombre del Documento</th>
                  <th>Propietario</th>
                  <th>Área</th>
                  <th>Fecha de Carga</th>
                  <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @if(count($shared) > 0)
                @foreach($shared as $share)
                <tr>
                  <td>{{ $share->name }}</td>
                  <td>{{ $share->user->name }}</td>
                  <td>{{ $share->user->department['dptName'] }}</td>
                  <td>{{ $share->created_at->toDayDateTimeString() }}</td>
                  <td>
                    <p>
                      <a href="documents/open/{{ $share->document_id }}" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Abrir"><i class="material-icons">open_with</i></a>
                    </p>
                    <br>
                    <p>
                      <a href="documents/download/{{ $share->document_id }}" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Descargar"><i class="material-icons">file_download</i></a>
                    </p>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6"><h5 class="teal-text">No Hay Documentos Compartidos Aún</h5></td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
