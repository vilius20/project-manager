<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'student' => 'required|unique:students,student|max:255|regex:/^[\pL\s\-]+$/u'
        ]);

        Student::create([
            'student' => $request->student
        ]);

        return redirect('/');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int  $grouop_id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $group_id)
    {
        $student_group = Student::find($id);
        $group_count = $student_group->where('group', $group_id)->count();
        $get_project_id = Group::where('id', $group_id)->first();
        $get_allowed_students = Project::where('id', $get_project_id->project_id)->first();
        $allowed_students = $get_allowed_students->students;

        if ($group_count < $allowed_students) {
            $student_group->update([
                'group' => $group_id
            ]);
            return redirect('/');
        } 
        else {
            return redirect()->back()->with('message', 'Group already full...');  
        }

        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/');
    }
}