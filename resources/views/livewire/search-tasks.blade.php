<div class="w-full overflow-x-scroll text-center table-responsive">
    <h1>Tasks:</h1>

    <div class="flex flex-row">
        <input id="searchName" class="form-control" aria-label="searchName" wire:model="searchName" type="search" placeholder="Search tasks by name..." />
        <input id="searchDescription" class="form-control" aria-label="searchDescription" wire:model="searchDescription" type="search" placeholder="Search tasks by description..." />
        <input id="searchStatus" class="form-control" aria-label="searchStatus" wire:model="searchStatus" type="search" placeholder="Search tasks by status..." />

        <button
            class="btn"
            type="button"
            onClick="Livewire.emit('openModal', 'create-task-modal');"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square text-primary text-5xl" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </button>
    </div>

    @if($tasks)
        <table class="table table-hover table-bordered sortable" id="mbDashTable">
            {{-- <caption>Tasks</caption> --}}
            <thead>
                <tr id="items">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date created</th>
                    <th>Date updated</th>
                    <th>Due date</th>
                    <th>Date closed</th>
                    <th>Date done</th>
                    <th>Is archived</th>
                    <th>Time tracked</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <livewire:task-component :task="$task" wire:key="task-table-item-{{$task->id}}" />
                @endforeach
            </tbody>
        </table>

        {{ $tasks->links() }}
    @else
        <div>No task was found</div>
    @endif

    {{-- <script>
        const el = document.getElementById('items');
        const sortable = Sortable.create(el);
    </script> --}}
</div>
