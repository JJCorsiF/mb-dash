<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div x-data="{}" class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- <button @click="wire.addTask()">+</button> --}}
                    <livewire:search-tasks />
                    {{-- <livewire:show-tasks /> --}}
                    {{-- @if($tasks = $wire.tasks) --}}
                        {{-- <ul>
                        @foreach($wire.tasks as $task)
                            <div class="flex items-center justify-between p-2 -mx-2 hover:bg-gray-100">
                                <li>
                                    <livewire:show-tasks />
                                    @livewire('show-tasks', compact('task'), key($task->id))
                                </li>
                            </div>
                        @endforeach
                        </ul> --}}
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
