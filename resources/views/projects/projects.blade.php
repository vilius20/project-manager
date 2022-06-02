<hr class="mt-10 mb-10">
    <div class="mb-5 flex justify-between">
        <div>
            <div class="flex flex-row gap-2 mb-2 text-3xl">
                <h2>Project: </h2>
                <p class="font-bold">{{ $project->title }}</p>
            </div>
            <div class="flex flex-row gap-2 mb-2 text-2xl">

                <h3>Number of groups:</h3>
                <p class="font-bold">{{ $project->groups }}</p>
            </div>
            <div class="flex flex-row gap-2 mb-2 text-2xl">
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