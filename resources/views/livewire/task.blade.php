<tr class="item">
    <td>
        <input wire:model.debounce.500ms.lazy="task.name" type="text" />
    </td>
    <td>
        <textarea wire:model.debounce.500ms.lazy="task.description"></textarea>
    </td>
    <td>{{$task ? $task->status : ''}}</td>
    <td>{{$assignee ? $assignee->name : '-'}}</td>
    <td>{{$task ? $task->date_created : ''}}</td>
    <td>{{$task ? $task->date_updated : ''}}</td>
    <td>{{$task ? $task->due_date : ''}}</td>
    <td>{{$task ? $task->date_closed : ''}}</td>
    <td>{{$task ? $task->date_done : ''}}</td>
    <td>{{$task ? ($task->archived ? 'yes' : 'no') : ''}}</td>
    <td>{{$task ? $task->time_spent / 3600000 : 0 }} hours</td>
    <td>
        <button class="btn" type="button" wire:click="save">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save text-success" viewBox="0 0 16 16">
                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
            </svg>
        </button>
        <button class="btn" type="button" wire:click="complete">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square text-success" viewBox="0 0 16 16">
                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
            </svg>
        </button>
        <div class="dropdown" aria-expanded="false">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false"> <!-- wire:click="showSearchInput" -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle text-primary" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </button>
            {{-- <input id="searchAssignee" :class="{'invisible': {{$showSearchInput ? 0 : 1}}}" class="form-control invisible" aria-label="searchAssignee" wire:model="searchAssignee" type="search" placeholder="Search assignee by name..." /> --}}
            <div class="dropdown-menu">
                <ul>
                    @if ($users)
                        @foreach ($users as $user)
                            <li><a :class="{'active': {{ $assignee !== null && $assignee->id === $user->id ? 1 : 0 }} }" class="dropdown-item" {{$task->user_id !== null && $task->user_id === $user->id ? 'aria-current=true' : ''}} wire:click="setAssignee({{ $user->id }});" href="#">{{ $user->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <button class="btn" type="button" wire:click="delete">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
            </svg>
        </button>
    </td>
</tr>
