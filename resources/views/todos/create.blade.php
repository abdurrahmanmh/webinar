<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Flowbite Table -->

                <form method="post" action="{{ route('todos.store') }}" class="mt-6 space-y-6">
                    @csrf
                   
                    <div class="mb-6">
                        <label for="name" :value="__('Task')"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task</label>
                        <input type="text" id="task" name="task"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Name" required>
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        <a href="{{ route('todos.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Cancel</a>

                    </div>

                </form>



            </div>
        </div>
    </div>
</x-app-layout>
