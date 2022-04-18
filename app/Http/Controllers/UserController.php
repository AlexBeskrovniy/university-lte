<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $user = User::find($id);

        $groups = Group::get();
        $subjects = Subject::get();

        return view('admin.admin-panel-users-edit', compact('user', 'groups', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'subject_id' => 'nullable|required_without:group_id|exists:subjects,id',
            'group_id' => 'nullable|required_without:subject_id||exists:groups,id',
        ]);

            isset($request['subject_id']) ?
            $user->subject_id = $request['subject_id'] :
            $user->group_id = $request['group_id'];

            $user->save();

        if($user->wasChanged('subject_id')){
            return redirect('/admin/admin-panel-educators')->with('success', 'Успешное изменение данных.');
        }

        return redirect('/admin/admin-panel-students')->with('success', 'Успешное изменение данных.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('success', 'Пользователь успешно удален.');
    }
}
