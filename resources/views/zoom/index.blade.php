@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                   <table class="table table-striped">
                        <tr>
                            <th>id</th>
                            <th>topic</th>
                            <th>start_time</th>
                            <th>join_url</th>
                        </tr>
                        @forelse ($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->topic }}</td>
                                <td>{{ $item->start_time }}</td>
                                <td>{{ $item->join_url }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No hay reuniones</td>
                            </tr>
                        @endforelse
                   </table>




                    <a href="{{ route('zoom.create') }}" class="btn btn-outline-primary btn-lg">Nueva Reunion Zoom</a>
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
