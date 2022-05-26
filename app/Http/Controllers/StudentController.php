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
        // Validates students name
        $this->validate($request, [
            'student' => 'required|unique:students,student|max:255|regex:/^[\pL\s\-]+$/u'
        ]);

        // If validation passes -> put stodent in database
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $group_id)
    {
        // Finds student
        $studentGroup = Student::find($id);
        // Counts how many students are in one group
        $group_count = $studentGroup->where('group', $group_id)->count();
        // Gets project id
        $get_project_id = Group::where('id', $group_id)->first();
        // Gets number of how much students can be in one group
        $get_allowed_students = Project::where('id', $get_project_id->project_id)->first();
        $allowed_students = $get_allowed_students->students;

        // If there is less students than allowed it updates students group id
        if ($group_count < $allowed_students) {
            $studentGroup->update([
                'group' => $group_id
            ]);
            return redirect('/');
        } 
        // Else it throws error
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
        // Deleting student by it's id
        Student::destroy($id);
        return redirect('/');
    }
}