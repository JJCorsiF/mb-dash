<?php

namespace App\Http\Livewire;

use App\Models\TaskModel;
use App\Models\User;
use Livewire\Component;

class TaskComponent extends Component
{
    public ?TaskModel $task = null;

    private $assigneeId;

    public $searchAssignee;
    public $showSearchInput;

    protected $rules = [
        'task.name' => 'required|string|min:1',
        'task.description' => 'string|max:500',
    ];

    protected $messages = [
        'task.name.required' => 'The task name cannot be empty.',
        'task.description.max' => 'The task description can\'t be too long.',
    ];

    public function mount() {
        $this->showSearchInput = false;
    }

    public function complete() {
        // $this->validate();

        $this->task->status = 'Done';
        $this->task->date_updated = now();
        $this->task->date_done = now();
        $this->task->save();

        $this->emitTo('search-tasks', 'taskCompleted');

        session()->flash('message', 'Task completed.');
    }

    public function delete() {
        session()->flash('message', 'Task successfully deleted.');

        $this->task->delete();
    }

    public function render()
    {
        if ($this->task) {
            $this->assigneeId = $this->task->assignee ? $this->task->assignee->id : null;
        }

        $this->saveAssignee();

        $users = User::orderBy('name', 'ASC');

        if ($this->searchAssignee) {
            $users->where('name', 'like', "%{$this->searchAssignee}%");
        }

        $users = $users->get(); //$users->paginate(6);

        return view('livewire.task', [
            'assignee' => $this->task ? $this->task->assignee : null,
            'showSearchInput' => $this->showSearchInput,
            'users' => $users, //$users->total() > 0 ? $users : [],
        ]);
    }

    public function save() {
        $this->validate();

        $this->task->save();

        session()->flash('message', 'Task successfully updated.');
    }

    public function saveAssignee() {
        if ($this->task) {
            $this->task->assignee_id = $this->assigneeId;
            $this->task->save();
            $this->task = TaskModel::find($this->task->id)->first();
        }

        $this->emitTo('search-tasks', 'taskAssigned');

        session()->flash('message', 'Task assignee updated.');
    }

    public function setAssignee(User $assignee) {
        $this->assigneeId = $assignee->id;
    }

    public function toggleShowSearchInput() {
        $this->showSearchInput = !$this->showSearchInput;
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function updatingSearch() {
        $this->resetPage();
    }
}
