<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\StudentFilterRequest;
use App\Http\Filters\LessonFilter;
use App\Http\Filters\StudentFilter;
use App\Models\User;
use App\Models\Group;
use App\Models\Room;
use App\Models\Subject;
use App\Models\Lesson;


class AdminController extends Controller
{
    public function index(){
        $educators = User::where('subject_id', '!=', null)->get();
        $groups = Group::get();
        $rooms = Room::get();
        $subjects = Subject::get();

        return view('admin.admin-panel', compact('educators', 'groups', 'rooms', 'subjects',));
    }

    public function getEducators(){
        $educators = User::where('subject_id', '!=', null)->with('subject')->get();

        return view('admin.admin-panel-educators', compact('educators'));
    }

    public function getStudents(StudentFilterRequest $request){
        $data = $request->validated();
        $filter = app()->make(StudentFilter::class, ['queryParams' => array_filter($data)]);

        if(isset($filter)){
            $students = User::filter($filter)
                        ->latest()
                        ->where('group_id', '!=', null)
                        ->with('group')
                        ->paginate(20);
        } else {
            $students = User::latest()
                        ->where('group_id', '!=', null)
                        ->with('group')
                        ->paginate(20);
        }

        $groups = Group::get();
        
        return view('admin.admin-panel-students', compact('students', 'groups'));
    }

    public function getLessons(FilterRequest $request){
        $data = $request->validated();
        $filter = app()->make(LessonFilter::class, ['queryParams' => array_filter($data)]);

        if(isset($filter)){
            $lessons = Lesson::filter($filter)
                        ->latest()
                        ->with('room', 'subject', 'group', 'educator')
                        ->paginate(12);}
            else{
              $lessons = Lesson::latest()
                        ->with('room', 'subject', 'group', 'educator')
                        ->paginate(12);  
            }

        $rooms = Room::get();
        $groups = Group::get();
        $subjects = Subject::get();

        return view('admin.admin-panel-lessons', compact('lessons', 'rooms', 'groups', 'subjects'));
    }
}
