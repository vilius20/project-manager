<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Form for creating new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        // Returns page where you can create project
        return view('create.create');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $projects = Project::where('user_id', null)->get();
        $groups = Group::where('user_id', null)->get();
        $students = Student::where('user_id', null)->get();
        $groupNumber = Student::where('user_id', null)->groupBy('group');

        return view('main.main', [
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
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'title' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'groups' => 'required|numeric|max:30|min:2|gt:0',
            'students' => 'required|numeric|min:2|max:100|gt:0'
        ]);

        $result = Project::create([
            'title' => $request->title,
            'groups' => $request->groups,
            'students' => $request->students
        ]);

        $count = $request->groups;

        for ($i=0; $i < $count; $i++) { 
            Group::create([
                'project_id' => $result->id,
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
    public function destroy(int $id): RedirectResponse
    {
        Project::destroy($id);
        return redirect('/');
    }
}