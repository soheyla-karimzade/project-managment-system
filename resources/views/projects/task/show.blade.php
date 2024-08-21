<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-300 dark:bg-green-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-gray-100">
                    <h2 class="text-lg font-bold mb-4">Edit Item</h2>
                    <form id="editForm" method="POST" action="{{route('project.task.update',$task->id) }}">
                        @csrf
                        @method('PUT')


                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                            <input type="text" id="title" name="title" value="{{$task->title}} "
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">


                            <select name="status" id="status" class="form-control" required>
                                @foreach($statuses as $statuse)
                                    <option value="{{ $statuse }}"
                                        {{ (old('status', $task->statuse ?? '') == $statuse) ? 'selected' : '' }}>
                                        {{ ucfirst($statuse) }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-4">

                            <select name="priority" id="priority" class="form-control" required>
                                @foreach($priorities as $priority)
                                    <option value="{{ $priority }}"
                                        {{ (old('priority', $task->priority ?? '') == $priority) ? 'selected' : '' }}>
                                        {{ ucfirst($priority) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="date_due" class="block text-sm font-medium text-gray-700">date_due</label>
                            <input type="date" name="due_date" id="due_date" class="form-control"
                                   value="{{ old('date_due', $task->due_date ?? '') }}">
                        </div>
                        <div class="flex justify-end">

                            <button type="submit"
                                    class="text-black  border p-2 btn btn-primary ">
                                save
                            </button>
                        </div>
                    </form>
                </div>
                <a href="{{ route('projects.list') }}"
                           class="mt-4 inline-block bg-blue-500 py-2 px-4 rounded hover:bg-blue-600 text-black">Back
                    to
                    Projects List
                </a>
            </div>
        </div>
    </div>


</x-app-layout>
