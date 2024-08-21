<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="my-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a  href="{{ route('project.create') }}"
               class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                create new project
            </a>
        </div>
    </div>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                                ID
                            </th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                                Name
                            </th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                                Email
                            </th>
                            <th class="py-2 px-4 bg-gray-100 border-b border-gray-300 text-left text-sm font-semibold text-gray-600">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $project->id }}
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    <a class="text-blue-600 hover:underline"
                                       href="{{ route('project.show', $project->id) }}">{{ $project->name }}</a>
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $project->user->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    <a class="text-blue-600 hover:underline" href="{{ route('project.show', $project->id) }}">Edit</a>
                                    <form action="{{ route('project.show', $project->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>


</x-app-layout>
