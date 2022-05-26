@extends('projects.index')

@section('students')

<h1 class="mb-2 mt-4 text-3xl">Groups</h1>
        <div class="grid grid-cols-3 gap-5">
            @foreach ($groups as $group)
                @if ($project->id === $group->project_id)
                    <div class="p-4 bg-gray-200 flex flex-col justify-center items-center">
                        <p class="font-bold">Group# {{ $group->id }}</p>
                        @for ($i=0; $i<$groupNumber->count();$i++)
                            @if ($student->group === $group->id)
                                @if ($student->group === $group->id)

                                    {{-- @for ($e=0; $e<$groupNumber->count();$e++)

                                        @foreach ($students as $student)        
                                                                
                                                    <p>{{ $student->student }}</p>

                                                    @break
                                            
                                        @endforeach

                                    @endfor --}}

                                
                                        
                                           
                                                
                                                <p>If student have group id show student</p>
                                            
                                            
                                        
                                                
                                                
                                                @else
                                                        <form id="group-form" action="" method="post">
                                                            @csrf
                                                            <select name="group" id="students">
                                                                <option value="">Assing student</option>
                                                                    @foreach ($students as $student)
                                                                        <option id="selectValue" value="{{ $group->id.' '.$student->id }}">
                                                                            {{ $student->student }}
                                                                        </option>
                                                                    @endforeach
                                                            </select>

                                                        </form>
                                @endif
                    @endif 
                    </div>
                @endif
            @endforeach
        </div>
        @endforeach
        @else
        <p>No projects created...</p>
        @endif
    </div>
</div>
<script src="{{ asset('js/groups.js') }}"></script>

@endsection










@if ($student->group === $group->id)
                            @if ($student->group === $group->id)
                                <p>If student have group id show student</p>                        
                            @else
                                <form id="group-form" action="" method="post">
                                    @csrf
                                        <select name="group" id="students">
                                            <option value="">Assing student</option>
                                                @foreach ($students as $student)
                                                    <option id="selectValue" value="{{ $group->id.' '.$student->id }}">
                                                        {{ $student->student }}
                                                    </option>
                                                @endforeach
                                        </select>
                                </form>
                            @endif
                        @endif


                        @if ($student->group === $group->id)
                                                    @php
                                                        $b = 0;
                                                            while ($b <= $g) {
                                                                $b++;
                                                            }
                                                           
                                                    @endphp
                                                    {{-- <p>{{ $loop->count }}</p> --}}
                                                        
                                                            
                                                                {{-- <p>{{ $i }}</p> --}}
                                                                {{-- <p>{{ $loop->count }}</p> --}}
                                                        
                                                    
                                                
                                                                {{-- <p>{{ $g }}</p> --}}
                                                                <p>{{ $b }}</p>
                                                        {{-- <p>{{ $loop->count }}</p> --}}
                                        @endif