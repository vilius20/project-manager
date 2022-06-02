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