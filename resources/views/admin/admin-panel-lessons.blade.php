@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Расписание занятий</h1>
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
                <label>Дата <input type="date" name="date" placeholder="Выбор даты"></label>
            </div>
            
            <div class="col-md-2">
                <label>Время <select class="form-select" name="time">
                    <option value="" selected>Всё</option>
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                </select></label>
            </div>

            <div class="col-md-2">
                <label>Аудитория <select class="form-select" name="room_id">
                    <option value="" selected>Всё</option>
                    @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                    @endforeach
                </select></label>
            </div>

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
        @foreach($lessons as $lesson)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Дата: {{ $lesson->date }}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Время: {{ $lesson->time }}</li>
                    <li class="list-group-item">Аудитория №: {{ $lesson->room->room_number }}</li>
                    <li class="list-group-item">Предмет: {{ $lesson->subject->name }}</li>
                    <li class="list-group-item">Группа №: {{ $lesson->group->group_number }}</li>
                    <li class="list-group-item">Преподаватель: {{ $lesson->educator->name }}</li>
                </ul>
                <div class="card-footer col-md-12 d-flex justify-content-around">
                    <form method="POST" action="{{ route('lessons.destroy', $lesson) }}">
                        @csrf {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                    <a class="btn btn-primary" href="{{ route('lessons.edit', $lesson->id) }}">Изменить</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center my-4">
        {{ $lessons->withQueryString()->links() }}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop