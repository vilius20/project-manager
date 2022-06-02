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