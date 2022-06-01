<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class ApiProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $projects = Project::where('user_id', $user_id)->get();
        $groups = Group::where('user_id', $user_id)->get();
        $students = Student::where('user_id', $user_id)->get();
        $students_no_group = Student::where('group', null)->where('user_id', $user_id)->get();
        return ['PROJECTS' => $projects, 'GROUPS' => $groups, 'STUDENTS' => $students, 'STUDENTS_NO_GROUP' => $students_no_group];
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
            'user_id' => 'exists:users,id',
            'title' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'groups' => 'required|numeric|max:30|min:2|gt:0',
            'students' => 'required|numeric|min:2|max:100|gt:0'
        ]);

        $user = $request->user();

       $result = Project::create([
            'title' => $request->title,
            'user_id' => $user->id,
            'groups' => $request->groups,
            'students' => $request->students
        ]);

        $count = $request->groups;

        for ($i=0; $i < $count; $i++) { 
            Group::create([
                'user_id' => $user->id,
                'project_id' => $result->id,
                'title' => 'Group #',
            ]);
        }

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Models\Project  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request, Project $project)
    {
        $user = $request->user();

        
        if ($user->id !== $project->user_id) {
            return abort(403, message: 'Unauthorized action.');
        }

        return Project::find($id);
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
     * @param  \App\Models\Project  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $access_token = $request->header('Authorization');
        $auth_header = explode(' ', $access_token);
        $token_from_user = $auth_header[1];
        $token = PersonalAccessToken::findToken($token_from_user);
        $user = $token->tokenable;
        $project= Project::where('id', $id)->first();

        if ($user->id !== (int)$project->user_id) {
            return abort(403, message: 'Unauthorized action.');
        }
        
        return Project::destroy($id);
    }
}