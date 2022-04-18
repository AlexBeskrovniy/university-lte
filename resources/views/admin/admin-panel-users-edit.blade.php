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
                @if($user->subject_id != null)
                <h5>Изменить предмет.</h5>
                @endif
                @if($user->group_id != null)
                <h5>Изменить группу.</h5>
                @endif
            </div>
            <div class="card-body text-center">
                <h5>{{ $user->name }}</h5>
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf {{method_field('PATCH')}}

                    @if($user->subject_id != null)
                    <div class="col-md-12">
                        <label>Предмет <select class="form-select" name="subject_id">
                            <option value="{{ $user->subject_id}}" selected>{{ $user->subject->name }}</option>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select></label>
                    </div>
                    @endif

                    @if($user->group_id != null)
                    <div class="col-md-12">
                        <label>Группа <select class="form-select" name="group_id">
                            <option value="{{ $user->group_id}}" selected>{{ $user->group->group_number }}</option>
                            @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->group_number }}</option>
                            @endforeach
                        </select></label>
                    </div>
                    @endif

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