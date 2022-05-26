@extends('layouts.app')

@section('projects')
{{--------------------------------------- PROJECT INFO ---------------------------}}

            @if ($projects->count())
                @foreach ($projects as $project)
                <hr class="mt-10 mb-10">
                    <div class="mb-5">
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
        <p>No students added...</p>
    @endif
<form action="{{ route('newStudent') }}" method="post">
    @csrf
    <label for="student" class="sr-only">Student name: </label>
    <input type="text" name="student" id="student" placeholder="Name Surname"
        class="bg-gray-100 border-2 p-2 rounded-lg @error('student') border-red-400 @enderror"
        value="{{ old('student') }}">

    <!-- Error message -->
    @error('student')
    <div class="text-red-500 mt-2 text-sm">
        {{ $message }}
    </div>
    @enderror

    <button type="submit" class="bg-gray-200 p-2 rounded" href="">Add new student</button>
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
    <div class="grid grid-cols-3 gap-5">
        @foreach ($groups as $group)
            @if ($project->id === $group->project_id)
                <div class="p-4 bg-gray-200 flex flex-col justify-center items-center">

                    {{-- Single card --}}

                    <p class="font-bold">Group# {{ $group->id }}</p>
                    
                        @for ($i=0; $i<$groupNumber->count();$i++)
                        
                            
                                    @foreach ($students as $student)
                                    

                                        @if ($group->id === $student->group)
                                                
                                                    <p>{{ $student->student }}</p>
                                                    
                                                
                                        @endif  
                                        

                                    @endforeach
                            @break
                        @endfor

                        <form id="group-form" action="" method="post">
                            @csrf
                                <select name="group" id="students" class="students select">
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
    
{{--------------------------------------------------------------------------------}}

        @endforeach
    @endif  
<script src="{{ asset('js/groups.js') }}"></script>
@endsection