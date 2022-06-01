<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class ApiStudentController extends Controller
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
        $user_id = $request->user()->id;

        $this->validate($request, [
            'student' => 'required|unique:students,student|max:255|regex:/^[\pL\s\-]+$/u'
        ]);

        $result = Student::create([
            'user_id' => $user_id,
            'student' => $request->student
        ]);

        return $result;
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
    public function update(Request $request)
    {

       $arr = $request->all();

       foreach ($arr as $data) {
            $ids = explode(' ', $data);
            $group_id = $ids[0];
            $student_id = $ids[1];
            $student_group = Student::find($student_id);
            $group_count = $student_group->where('group', $group_id)->count();
            $get_project_id = Group::where('id', $group_id)->first();
            $get_allowed_students = Project::where('id', $get_project_id->project_id)->first();
            $allowed_students = $get_allowed_students->students;

            if ($group_count < $allowed_students) {
                $student_group->update([
                    'group' => $group_id
                ]);
            } 
            else {
                return abort(403, message: 'Group already full...');  
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $access_token = $request->header('Authorization');
        $auth_header = explode(' ', $access_token);
        $token_from_user = $auth_header[1];
        $token = PersonalAccessToken::findToken($token_from_user);
        $user = $token->tokenable;
        $student= Student::where('id', $id)->first();

        if ($user->id !== (int)$student->user_id) {
            return abort(403, message: 'Unauthorized action.');
        }
        
        return Student::destroy($id);
    }

    public function remove_test($id)
    {
           
        Student::destroy($id);

        return response('', Response::HTTP_NO_CONTENT);
    }
}