@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Преподаватели</h1>
    @if(session()->has('success'))
    <div class="alert alert-success d-flex justify-content-center">
        {{ session('success')}}
    </div>
    @endif
@stop

@section('content')
    <div class="row justify-content-start my-4">
        @foreach($educators as $educator)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    Предмет: {{ $educator->subject->name }}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">{{ $educator->name }}</li>
                </ul>
                <div class="card-footer col-md-12 d-flex justify-content-around">
                    <form method="POST" action="{{ route('users.destroy', $educator->id) }}">
                    @csrf {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                    <a class="btn btn-primary" href="{{ route('users.edit', $educator->id) }}">Изменить</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
