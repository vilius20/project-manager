@extends('layouts.app')

@section('projects')
{{--------------------------------------- PROJECT INFO ---------------------------}}

    @if ($projects->count())
        @foreach ($projects as $project)

                @if ($project->user_id == null)
                    
               
                {{-- ENDEX --}}

                <hr class="mt-10 mb-10">
                <div class="mb-5 flex justify-between">
                    <div>
                        <div class="flex flex-row gap-2">
                            <h2>Project: </h2>
                            <p class="font-bold">{{ $project->title }}</p>
                        </div>
                        <div class="flex flex-row gap-2">

                            <h3>Number of groups:</h3>
                            <p class="font-bold">{{ $project->groups }}</p>
                        </div>
                        <div class="flex flex-row gap-2">
                            <h3>Students per group:</h3>
                            <p class="font-bold">{{ $project->students }}</p>
                        </div>
                    </div>
                    <div>
                        <form action="/remove-project/{{ $project->id }}" method="post">
                            @csrf
                            <button class="font-bold text-red-500" type="submit">Delete Project</button>
                        </form>
                    </div>
                </div>
           
{{--------------------------------------------------------------------------------}}


{{--------------------------------------- STUDENTS -------------------------------}}
<h1 class="mb-2 text-3xl">Students</h1>
@if ($students->count())
<table class="table-auto w-full mb-4">
    <thead>
        <tr>
            <th class="p-2 border-2 bg-gray-200">Student</th>
            <th class="p-2 border-2 bg-gray-200">Group</th>
            <th class="p-2 border-2 bg-gray-200">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td class="text-center p-2 border-2">
                    {{ $student->student }}
                </td>
                <td class="text-center p-2 border-2">
                    Group# {{ $student->group }}
                </td>
                <td class="text-center p-2 border-2 text-red-500">
                    <form action="/remove-student/{{ $student->id }}" method="post">
                        @csrf
                        <button class="font-bold" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <p class="font-bold text-red-500">No students added...</p>
@endif
<form action="{{ route('newStudent') }}" method="post">
@csrf
<label for="student" class="sr-only">Student name: </label>
<input type="text" name="student" id="student" placeholder="Name Surname"
    class="bg-gray-100 border-2 p-2 rounded-lg mb-2 @error('student') border-red-400 @enderror"
    value="{{ old('student') }}">

<!-- Error message -->
@error('student')
<div class="text-red-500 mt-2 text-sm">
    {{ $message }}
</div>
@enderror

<button type="submit" class="bg-gray-200 p-2 text-cyan-600 rounded mt-4" href="">Add new student</button>
</form>

{{--------------------------------------------------------------------------------}}

{{--------------------------------------- GROUPS ---------------------------------}}

<h1 class="mb-2 mt-4 text-3xl">Groups</h1>
<!-- Error message -->
@if(session()->has('message'))
<div class="text-red-500 mt-2 text-sm mb-5 text-2xl">
{{ session()->get('message') }}
</div>
@endif
<div class="md:grid md:grid-cols-3 md:gap-5">
    @foreach ($groups as $group)
        @if ($project->id == $group->project_id)
            <div class="mb-5 p-4 bg-gray-200 rounded-lg flex flex-col justify-center items-center">

                {{-- Single card --}}

                <p class="font-bold">Group# {{ $group->id }}</p>
                
                    @for ($i=0; $i<$groupNumber->count();$i++)
                    
                        
                                @foreach ($students as $student)
                                

                                    @if ($group->id == $student->group)
                                            
                                    <ul>
                                        <li class="font-medium text-cyan-600 p-2">
                                            {{ $student->student }}
                                        </li>
                                    </ul>
                                                
                                                
                                            
                                    @endif  
                                    

                                @endforeach
                        @break
                    @endfor

                    <form id="group-form" action="" method="post" class="w-full">
                        @csrf
                            <select name="group" id="students" class="students select mt-5 w-full p-2 rounded-lg border-2 bg-white-100">
                                <option selected hidden value="">Assing student</option>
                                    @foreach ($students as $student)
                                        <option id="selectValue" class="selectValue" value="{{ $group->id.' '.$student->id }}">
                                            {{ $student->student }}
                                        </option>
                                    @endforeach
                            </select>
                    </form>

                {{-- Single card end --}}

            </div>
            
        @endif
    @endforeach
</div>



                {{-- ENDEX --}}
               
                @else
                <p class="text-3xl">Register project...</p>
                <p class="mt-5">Top right corner...</p>
                @endif
                
{{--------------------------------------------------------------------------------}}

            @endforeach
    @endif  
<script src="{{ asset('js/groups.js') }}"></script>
@endsection