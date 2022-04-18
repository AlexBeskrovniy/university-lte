<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Room;
use App\Models\Subject;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'subject_id' => 'required|exists:subjects,id',
            'group_id' => 'required|exists:groups,id',
            'educator_id' => 'required|exists:users,id',
            'date' => 'required|string',
            'day_of_week' => 'required|string',
            'time' => 'required|string',
        ]);

        Lesson::create([
            'room_id' => $request['room_id'],
            'subject_id' => $request['subject_id'],
            'group_id' => $request['group_id'],
            'educator_id' => $request['educator_id'],
            'date' => $request['date'],
            'day_of_week' => $request['day_of_week'],
            'time' => $request['time'],
        ]);

        return back()->with('success', 'Новое занятие добавлено в расписание');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);

        $educators = User::where('subject_id', '!=', null)->get();
        $groups = Group::get();
        $rooms = Room::get();
        $subjects = Subject::get();

        return view('admin.admin-panel-lessons-edit', compact('lesson', 'educators', 'groups', 'rooms', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'subject_id' => 'required|exists:subjects,id',
            'group_id' => 'required|exists:groups,id',
            'educator_id' => 'required|exists:users,id',
            'date' => 'required|string',
            'day_of_week' => 'required|string',
            'time' => 'required|string',
        ]);

            $lesson->room_id = $request['room_id'];
            $lesson->subject_id = $request['subject_id'];
            $lesson->group_id = $request['group_id'];
            $lesson->educator_id = $request['educator_id'];
            $lesson->date = $request['date'];
            $lesson->day_of_week = $request['day_of_week'];
            $lesson->time = $request['time'];

            $lesson->save();

        return redirect('/admin/admin-panel-lessons')->with('success', 'Успешное изменение данных.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return back()->with('success', 'Занятие успешно удалено.');
    }
}
