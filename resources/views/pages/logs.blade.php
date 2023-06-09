@extends('layouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('inc.sidebar')
    </div>
    <div class="col m11 s12">
		<div class="row">
			<h3 class="flow-text"><i class="material-icons">view_list</i> Actividades de los Usuarios
			@can('root')
			<a href="logsdel" data-position="left" data-delay="50" data-tooltip="Limpiar todo" class="right tooltipped pulse"><i class="material-icons">clear_all</i></a>
			@endcan
			</h3>
			<div class="divider"></div>
		</div>
		<div class="row">
		@if(count($logs) > 0)
			@foreach($logs as $key => $log)
			<div class="card horizontal hoverable blue-grey darken-1">
				<div class="card-content white-text">
					<div class="col s3">
						<h4 class="center yellow-text z-depth-5">{{ ++$key }}</h4>
						<br>
						<blockquote>{{ $log->created_at->toDayDateTimeString() }}</blockquote>
					</div>
					<div class="col s9">
						<blockquote>
							<ul>
								<li>Asunto => {{ $log->subject }}</li>
								<li>URL => {{ $log->url }}</li>
								<li>Método REST => {{ $log->method }}</li>
								<li>IP => {{ $log->ip }}</li>
								<li>Agente => {{ $log->agent }}</li>
								<li>ID del Usuario => {{ $log->user_id }}</li>
							</ul>
						</blockquote>
					</div>
				</div>
			</div>
			@endforeach
		@else
			<div class="card-panel blue-grey">
				<p class="flow-text white-text">
					No hay logs registrados aún ...
				</p>
			</div>
		@endif
		</div>
    </div>
  </div>
</div>
@endsection
