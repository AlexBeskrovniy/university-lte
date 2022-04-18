<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Lesson;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->check()){
            $user = User::find(auth()->user()->id);

            $user->hasRole('educator') ?
            $userBelongs = $user->subject()->first() :
            $userBelongs = $user->group()->first();
        }

        if($user->hasRole('educator')){
            $lessons = $user->lessons()
                        ->orderBy('date')
                        ->with('room', 'subject', 'group', 'educator')
                        ->get();
        }

        if($user->hasRole('student')){
            $group = $user->group()->first();
            $lessons = Lesson::where('group_id', $group->id)
                        ->orderBy('date')
                        ->with('room', 'subject', 'group', 'educator')
                        ->get();
        }

        if($user->hasRole('admin')){
            return redirect()->route('panel');
        } else {
            return view('home', compact('userBelongs', 'lessons'));
        }
    }
}
