@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @role('educator')
                <div class="card-header">Моё расписание</div>
                @endrole
                @role('student')
                <div class="card-header">Расписание группы№: {{ $userBelongs->group_number }}</div>
                @endrole

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="monday-tab" data-bs-toggle="tab" data-bs-target="#monday" type="button" role="tab" aria-controls="monday" aria-selected="true">Понедельник</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="thuesday-tab" data-bs-toggle="tab" data-bs-target="#thuesday" type="button" role="tab" aria-controls="thuesday" aria-selected="false">Вторник</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="wednesday-tab" data-bs-toggle="tab" data-bs-target="#wednesday" type="button" role="tab" aria-controls="wednesday" aria-selected="false">Среда</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="thursday-tab" data-bs-toggle="tab" data-bs-target="#thursday" type="button" role="tab" aria-controls="thursday" aria-selected="false">Четверг</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="friday-tab" data-bs-toggle="tab" data-bs-target="#friday" type="button" role="tab" aria-controls="friday" aria-selected="false">Пятница</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="monday" role="tabpanel" aria-labelledby="monday-tab">
                            <div class="row justify-content-start my-4">
                                @foreach($lessons as $lesson)
                                @if($lesson->day_of_week == 'Понедельник')
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
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="thuesday" role="tabpanel" aria-labelledby="thuesday-tab">
                            <div class="row justify-content-start my-4">
                                @foreach($lessons as $lesson)
                                @if($lesson->day_of_week == 'Вторник')
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
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
                            <div class="row justify-content-start my-4">
                                @foreach($lessons as $lesson)
                                @if($lesson->day_of_week == 'Среда')
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
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
                            <div class="row justify-content-start my-4">
                                @foreach($lessons as $lesson)
                                @if($lesson->day_of_week == 'Четверг')
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
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">
                            <div class="row justify-content-start my-4">
                                @foreach($lessons as $lesson)
                                @if($lesson->day_of_week == 'Пятница')
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
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
