<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Todo list
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="w-full p-4 sm:p-8 bg-white shadow sm:rounded-lg flex justify-center items-center">
                <div class="w-2/4">
                    <form method="POST" action="/todoList" class="mt-6 space-y-6">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="task" value="Task:"></x-input-label>
                            <x-text-input id="task" class="block mt-1 w-full" type="text" name="task"
                                          :value="old('task')" required autofocus autocomplete="task"></x-text-input>
                            <x-input-error :messages="$errors->get('task')" class="mt-2"></x-input-error>
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ 'Add task !' }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                <tr class="hover:bg-gray-50">
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Task</th>
                                    <th scope="col" class="px-6 py-4">State</th>
                                    <th scope="col" class="px-6 py-4">Handle</th>
                                </tr>
                                </thead>
                                @foreach($todos as $todo)
                                    <tr class="border-b dark:border-neutral-500 hover:bg-gray-50">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{$todo['texte']}}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{$todo['termine'] ? "Done" : "To do"}}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-a-done href="/todoList/doTask/{{$todo['id']}}">Done</x-a-done>
                                            <x-a-delete href="/todoList/deleteTask/{{$todo['id']}}">Delete</x-a-delete>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
