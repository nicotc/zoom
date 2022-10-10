@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('zoom_meet'))
                        <div class="alert alert-success" role="alert">
                            @php
                                $zoom_meet = (array)  json_decode(session('zoom_meet') );

                            @endphp
                                <label>url: </label> {{ $zoom_meet['url'] }} <br>
                                <label>id: </label> {{ $zoom_meet['id'] }}<br>
                                <label>Topic: </label>{{ $zoom_meet['nivel'] }}<br>
                                <label>Start Time: </label> {{ $zoom_meet['hora de inicio'] }}<br>
                                <label>timezone: </label> {{ $zoom_meet['timezone'] }}<br>
                        </div>
                    @endif


                    @if(session()->get('errors'))
                        <div class="alert alert-danger">
                            @php
                                $errors = json_decode(session()->get('errors'));
                                foreach ($errors as $error ) {
                                    echo $error[0] . '<br>';
                                }
                            @endphp
                        </div>
                    @endif


                    {{ Form::open(['route' => 'zoom.store']) }}
                        <input type="text" name="topic" placeholder="Tema de la reunion">
                        <input type="date" name="date" placeholder="Agenda de la reunion">
                        <input type="time" name="start_time" placeholder="Fecha y hora de inicio">
                        <input type="text" name="password" placeholder="Contraseña de la reunion">
                        <input type="submit" value="Crear Reunion">
                    {{ Form::close() }}


                </div>

                  <a href="{{ route('zoom.index') }}" class="btn btn-outline-primary btn-lg">Listado Zoom</a>

            </div>

        </div>
    </div>
</div>
@endsection
