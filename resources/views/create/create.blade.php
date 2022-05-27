@extends('layouts.app')

@section('projects')
<div class="flex justify-center">
    <div class="md:w-6/12 w-full bg-white p-6 rounded-lg">
        <form action="{{ route('newProject') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="title" class="sr-only">Title</label>
                <input type="text" name="title" id="title" placeholder="Project title"
                    class="@error('title') border-red-400 @enderror bg-gray-100 border-2 w-full p-2 rounded-lg"
                    value="{{ old('title') }}">


                <!-- Error message -->
                @error('title')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="groups" class="sr-only">Groups in project</label>
                <input type="number" name="groups" id="groups" placeholder="Groups in project"
                    class="@error('groups') border-red-400 @enderror bg-gray-100 border-2 w-full p-2 rounded-lg"
                    value="{{ old('groups') }}">

                <!-- Error message -->
                @error('groups')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="students" class="sr-only">Students per group</label>
                <input type="number" name="students" id="students" placeholder="Students per group"
                    class="@error('students') border-red-400 @enderror bg-gray-100 border-2 w-full p-2 rounded-lg"
                    value="{{ old('students') }}">

                <!-- Error message -->
                @error('students')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Register project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection