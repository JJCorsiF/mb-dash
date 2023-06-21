<?php

namespace App\Http\Livewire;

use App\Models\TaskModel;
use Livewire\Component;

class TaskComponent extends Component
{
    public TaskModel $task;

    protected $rules = [
        'task.name' => 'required|string|min:1',
        'task.description' => 'string|max:500',
    ];

    protected $messages = [
        'task.name.required' => 'The task name cannot be empty.',
        'task.description.max' => 'The task description can\'t be too long.',
    ];

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
        return view('livewire.task');
    }

    public function save() {
        $this->validate();

        $this->task->save();

        session()->flash('message', 'Task successfully updated.');
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }
}
