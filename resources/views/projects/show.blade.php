<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-300 dark:bg-green-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-6">Project Details</h2>
                    <div class="bg-green-100 shadow-md rounded-lg p-6">
                        <p class="text-lg font-medium ">Name:
                        <form action="{{route('project.update', $project->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="flex  inline-flex">
                                <label for="title">name</label>
                                <input type="text" name="name" id="name" value="{{ $project->name }}"
                                       class="form-control" required>
                                <button type="submit"
                                        class="text-black border border-black p-2 btn btn-primary ">
                                    save
                                </button>
                            </div>
                        </form>
                        </p>
                        <p class="text-lg font-medium">User Email: {{ $project->user->name }}</p>
                        <p class="text-lg font-medium">Created At: {{ $project->created_at->diffForHumans() }}</p>
                        <p class="text-lg font-medium">Updated At: {{ $project->updated_at->diffForHumans() }}</p>

                        <a href="{{ route('projects.list') }}"
                           class="mt-4 inline-block bg-blue-500 py-2 px-4 rounded hover:bg-blue-600 text-black">Back
                            to
                            Projects List
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-50">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 mb-4 font-bold size-5 text-gray-500">
                add new task
            </div>
            <div class="m-2">
                <div class="bg-green-300 dark:bg-green-300 overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <form action="{{route('tasks.store', $project->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="flex flex-col">
                            <label for="title">Task Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{ old('title', $task->title ?? '') }}" required>
                        </div>
                        <div class="flex flex-col">
                            <label for="priority">Priority</label>
                            <select name="priority" id="priority" class="form-control" required>
                                @foreach($priorities as $priority)
                                    <option
                                        value="{{ $priority }}" {{ (old('priority', $task->priority ?? '') == $priority) ? 'selected' : '' }}>
                                        {{ ucfirst($priority) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="priority">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                @foreach($statuses as $status)
                                    <option
                                        value="{{ $status }}" {{ (old('priority', $task->status ?? '') == $status) ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="due_date">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control"
                                   value="{{ old('due_date', $task->due_date ?? '') }}">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="text-black  border p-2 btn btn-primary ">
                                Add new task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-50">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 mb-4 font-bold size-5 text-gray-500">
                project task list
            </div>

            <form method="GET" action="{{ route('project.show', $project->id) }}" class="mb-4">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach($statuses as $statuse)
                                <option value="{{ $statuse }}"
                                    {{ (old('status', $task->statuse ?? '') == $statuse) ? 'selected' : '' }}>
                                    {{ ucfirst($statuse) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700">due_date</label>
                        <input type="date" id="due_date" name="due_date"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="sort_by" class="block text-sm font-medium text-gray-700">Sort By Priority</label>
                        <select id="sort_by" name="sort_by"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="asc" {{ request('sort_by') === 'asc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ request('sort_by') === 'desc' ? 'selected' : '' }}>Descending
                            </option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Search</button>
            </form>


            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>

                    <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                        title
                    </th>
                    <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                        status
                    </th>
                    <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                        priority
                    </th>
                    <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                        due date
                    </th>
                    <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($result as $task)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">
                            {{ $task->title}}

                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            {{ $task->status}}

                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            {{ $task->priority}}

                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            {{ $task->due_date }}

                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">

                            <a class="text-blue-600 hover:underline" href="{{route('project.task.show',$task->id) }}">Edit</a>
                            <form action="{{ route('project.task.destroy', $task->id) }}" method="POST"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $result->links() }}
            </div>
        </div>
    </div>

</x-app-layout>


