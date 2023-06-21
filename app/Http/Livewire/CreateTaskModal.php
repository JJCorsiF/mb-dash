<?php

namespace App\Http\Livewire;

use App\Models\TaskModel;
use LivewireUI\Modal\ModalComponent;

class CreateTaskModal extends ModalComponent {
    public $newTaskName;
    public $newTaskDescription;

    protected $rules = [
        'newTaskName' => 'required|string|min:1',
        'newTaskDescription' => 'string|max:500',
    ];

    protected $messages = [
        'newTaskName.required' => 'The task name cannot be empty.',
        'newTaskDescription.max' => 'The task description can\'t be too long.',
    ];

    public function closeTaskModal() {
        $this->forceClose()->closeModal();
    }

    public function createTask() {
        // $this->validate();

        $newTask = new TaskModel();
        $newTask->name = $this->newTaskName;
        $newTask->description = $this->newTaskDescription;
        $newTask->status = 'To Do';
        $newTask->save();

        $this->emitTo('search-tasks', 'taskCreated');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.create-task-modal');
    }
}
