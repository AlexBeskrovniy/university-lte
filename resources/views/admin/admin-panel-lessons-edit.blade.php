@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Изменить данные.</h1>
    @if ($errors->any())
    <div class="alert alert-danger d-flex justify-content-center">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
@stop

@section('content')

    <div class="row justify-content-center my-4">
        <div class="card" style="width: 25rem;">
            <div class="card-header text-center">
                <h5>Внести изменения.</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('lessons.update', $lesson) }}">
                    @csrf {{method_field('PATCH')}}

                    <div class="col-md-12">
                        <label>Аудитория <select class="form-select" name="room_id">
                            <option value="{{ $lesson->room_id }}" selected>{{ $lesson->room->room_number }}</option>
                            @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                            @endforeach
                        </select></label>
                    </div>

                    <div class="col-md-12">
                        <label>Предмет <select class="form-select" name="subject_id">
                            <option value="{{ $lesson->subject_id}}" selected>{{ $lesson->subject->name }}</option>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select></label>
                    </div>

                    <div class="col-md-12">
                        <label>Группа <select class="form-select" name="group_id">
                            <option value="{{ $lesson->group_id}}" selected>{{ $lesson->group->group_number }}</option>
                            @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->group_number }}</option>
                            @endforeach
                        </select></label>
                    </div>

                    <div class="col-md-12">
                        <label>Преподаватель <select class="form-select" name="educator_id">
                            <option value="{{ $lesson->educator_id }}" selected>{{ $lesson->educator->name }}</option>
                            @foreach($educators as $educator)
                            <option value="{{ $educator->id }}">{{ $educator->name }}</option>
                            @endforeach
                        </select></label>
                    </div>

                    <div class="col-md-12">
                        <label>Дата <input type="date" name="date" value="{{ $lesson->date }}" placeholder="Выбор даты"></label>
                    </div>

                    <div class="col-md-12">
                        <label>День недели <select class="form-select" name="day_of_week">
                            <option value="{{ $lesson->day_of_week }}" selected>{{ $lesson->day_of_week }}</option>
                            <option value="Понедельник">Понедельник</option>
                            <option value="Вторник">Вторник</option>
                            <option value="Среда">Среда</option>
                            <option value="Четверг">Четверг</option>
                            <option value="Пятница">Пятница</option>
                        </select></label>
                    </div>
                    
                    <div class="col-md-12">
                        <label>Время <select class="form-select" name="time">
                            <option value="{{ $lesson->time }}" selected>{{ $lesson->time }}</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                        </select></label>
                    </div>


                    <div class="card-footer col-md-12 d-flex justify-content-around">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                        <button class="btn btn-primary" type="reset">Сбросить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop