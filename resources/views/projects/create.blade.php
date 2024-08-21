<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('create project') }}
        </h2>
    </x-slot>


        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-50">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 mb-4 font-bold size-5 text-gray-500">
                add new project
            </div>
            <div class="">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <form action="{{route('project.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="flex flex-col">
                            <label for="title">name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="text-black  border p-2 btn btn-primary ">
                                Add new project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
