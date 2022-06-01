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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id', null)->get();

        $groups = Group::where('user_id', null)->get();

        $students = Student::where('user_id', null)->get();

        $groupNumber = Student::where('user_id', null)->groupBy('group');

        return view('projects.projects', [
            'projects' => $projects,
            'groups' => $groups,
            'students' => $students,
            'groupNumber' => $groupNumber,
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
            'title' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'groups' => 'required|numeric|max:30|min:2|gt:0',
            'students' => 'required|numeric|min:2|max:100|gt:0'
        ]);

        Project::create([
            'title' => $request->title,
            'groups' => $request->groups,
            'students' => $request->students
        ]);


        $title = $request->title;
        $project_info = Project::where('title', $title)->first()->only(['id']);
        $project_id = data_get($project_info, 'id');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        return redirect('/');
    }
}