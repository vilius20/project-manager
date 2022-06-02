@extends('layouts.app')

@section('main')

@if ($projects->count())
    @foreach ($projects as $project)

{{--------------------------------------- PROJECT INFO ---------------------------}}

        @include('projects.projects')
           
{{--------------------------------------- STUDENTS -------------------------------}}

        @include('students.students')

{{--------------------------------------- GROUPS ---------------------------------}}

        @include('groups.groups')
            

    @endforeach

    @else
    
            <p class="text-3xl">Register project...</p>
            <p class="mt-5">Top right corner...</p>
            
@endif  
<script src="{{ asset('js/groups.js') }}"></script>
@endsection