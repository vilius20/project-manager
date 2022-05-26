<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Group;
use App\Models\Student;
use Attribute;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class ProjectController extends Controller
{
    /**
     * Form for creating new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Returns page where you can create project
        return view('create.create');
    }

    // /**
    //  * Form for creating new project.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function students()
    // {
    //     // Gets all Students
    //     $students = Student::get();
        
    //     return view('students.students', [
    //         'students' => $students
    //     ]);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gets all projects
        $projects = Project::get();

        // Gets all Groups
        $groups = Group::get();

        // Gets all Students
        $students = Student::get();

        // Number of students in groups
        $groupNumber = Student::all()->groupBy('group');

        // Returns projects to page
        return view('projects.projects', [
            'projects' => $projects,
            'groups' => $groups,
            'students' => $students,
            'groupNumber' => $groupNumber
        ]);    
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
            'title' => 'required|max:255',
            'groups' => 'required|numeric|max:30',
            'students' => 'required|numeric|min:2'
        ]);

        Project::create([
            'title' => $request->title,
            'groups' => $request->groups,
            'students' => $request->students
        ]);

        $title = $request->title;
        $info = Project::where('title', $title)->first()->only(['id']);
        $project_id = data_get($info, 'id');
        $count = $request->groups;

        for ($i=0; $i < $count; $i++) { 
            Group::create([
                'project_id' => $project_id,
                'title' => 'Group #',
            ]);
        }

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}