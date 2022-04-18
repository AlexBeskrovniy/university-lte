@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Студенты</h1>
    @if(session()->has('success'))
    <div class="alert alert-success d-flex justify-content-center">
        {{ session('success')}}
    </div>
    @endif
@stop

@section('content')
    <h5>Фильтры:</h5>

    <div>
        <form class="row justify-content-start my-4 align-items-center" method="GET" action="#">

            <div class="col-md-2">
                <label>Группа <select class="form-select" name="group_id">
                    <option value="" selected>Всё</option>
                    @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group_number }}</option>
                    @endforeach
                </select></label>
            </div>

             <div class="col-md-2">
                <button class="btn btn-primary" type="submit">Применить</button>
            </div>

        </form>
    </div>

    <div class="row justify-content-start my-4">
        @foreach($students as $student)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    Группа: {{ $student->group->group_number }}
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">{{ $student->name }}</li>
                    </ul>
                <div class="card-footer col-md-12 d-flex justify-content-around">
                    <form method="POST" action="{{ route('users.destroy', $student->id) }}">
                    @csrf {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                    <a class="btn btn-primary" href="{{ route('users.edit', $student->id) }}">Изменить</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center my-4">
        {{ $students->withQueryString()->links() }}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop