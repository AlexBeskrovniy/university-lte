@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Панель управления</h1>

    @if(session()->has('success'))
    <div class="alert alert-success d-flex justify-content-center">
        {{ session('success')}}
    </div>
    @endif

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
    <div class="row justify-content-between my-4">
        <div class="col-md-4">
            <div class="card">
              <div class="card-header text-center">
                <h5>Добавить занятие</h5>
              </div>
              <div class="card-body my-2">
                  <form method="POST" action="{{ route('lessons.store') }}" class="row">
                    @csrf

                    <div class="col-md-12">
                        <label>Аудитория <select class="form-select" name="room_id">
                            <option value="" selected>Выбрать</option>
                            @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                            @endforeach
                        </select></label>
                    </div>

                    <div class="col-md-12">
                        <label>Предмет <select class="form-select" name="subject_id">
                            <option value="" selected>Выбрать</option>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select></label>
                    </div>

                    <div class="col-md-12">
                        <label>Группа <select class="form-select" name="group_id">
                            <option value="" selected>Выбрать</option>
                            @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->group_number }}</option>
                            @endforeach
                        </select></label>
                    </div>

                    <div class="col-md-12">
                        <label>Преподаватель <select class="form-select" name="educator_id">
                            <option value="" selected>Выбрать</option>
                            @foreach($educators as $educator)
                            <option value="{{ $educator->id }}">{{ $educator->name }}</option>
                            @endforeach
                        </select></label>
                    </div>

                    <div class="col-md-12">
                        <label>Дата <input type="date" name="date" placeholder="Выбор даты"></label>
                    </div>

                    <div class="col-md-12">
                        <label>День недели <select class="form-select" name="day_of_week">
                            <option value="" selected>Выбрать</option>
                            <option value="Понедельник">Понедельник</option>
                            <option value="Вторник">Вторник</option>
                            <option value="Среда">Среда</option>
                            <option value="Четверг">Четверг</option>
                            <option value="Пятница">Пятница</option>
                        </select></label>
                    </div>
                    
                    <div class="col-md-12">
                        <label>Время <select class="form-select" name="time">
                            <option value="" selected>Выбрать</option>
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
                        <button class="btn btn-primary" type="submit">Добавить</button>
                        <button class="btn btn-primary" type="reset">Сбросить</button>
                    </div>
                  </form>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
              <div class="card-header text-center">
                <h5>Добавить предмет</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('subjects.store') }}" class="row">
                    @csrf
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control"
                   value="{{ old('name') }}" placeholder="Название предмета">
                    </div>

                    <div class="card-footer col-md-12 d-flex justify-content-around">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                        <button class="btn btn-primary" type="reset">Сбросить</button>
                    </div>
                  </form>
              </div>
            </div>

            <div class="card">
              <div class="card-header text-center">
                <h5>Добавить группу</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('groups.store') }}" class="row">
                    @csrf
                    <div class="col-md-12">
                        <input type="text" name="group_number" class="form-control"
                   value="{{ old('name') }}" placeholder="Номер группы">
                    </div>

                    <div class="card-footer col-md-12 d-flex justify-content-around">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                        <button class="btn btn-primary" type="reset">Сбросить</button>
                    </div>
                  </form>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
              <div class="card-header text-center">
                <h5>Добавить аудиторию</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('rooms.store') }}" class="row">
                    @csrf
                    <div class="col-md-12">
                        <input type="text" name="room_number" class="form-control"
                   value="{{ old('name') }}" placeholder="Номер аудитории">
                    </div>

                    <div class="card-footer col-md-12 d-flex justify-content-around">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                        <button class="btn btn-primary" type="reset">Сбросить</button>
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop