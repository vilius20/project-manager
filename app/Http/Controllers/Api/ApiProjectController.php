<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Project;
use Illuminate\Http\Request;

class ApiProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::all();
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
            'user_id' => 'required|max:11|numeric',
            'title' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'groups' => 'required|numeric|max:30|min:2|gt:0',
            'students' => 'required|numeric|min:2|max:100|gt:0'
        ]);

        Project::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Project::find($id);
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
     * Search for project.
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Project::where('title', 'like', '%'.$title.'%')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return Project::destroy($id);
    }
}