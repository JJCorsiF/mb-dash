<?php

namespace App\Http\Livewire;

use App\Models\TaskModel;
use Livewire\Component;
use Livewire\WithPagination;

class SearchTasks extends Component
{
    use WithPagination;

    public $page = 1;
    public $searchName = '';
    public $searchDescription = '';
    public $searchStatus = '';

    protected $queryString = [
        'page' => ['except' => 1],
        'searchName' => ['except' => ''],
        'searchDescription' => ['except' => ''],
        'searchStatus' => ['except' => ''],
    ];

    protected $listeners = ['taskCreated', 'taskCompleted', 'taskAssigned'];

    public function taskAssigned() {
        $this->resetPage();

        $this->mount();
        $this->render();
    }

    public function taskCompleted() {
        $this->resetPage();
    }

    public function taskCreated() {
        $this->resetPage();
    }

    public function render()
    {
        $searchResults = TaskModel::with('assignee');

        if ($this->searchName) {
            $searchResults = $searchResults->where('name', 'like', "%{$this->searchName}%");
        }

        if ($this->searchDescription) {
            $searchResults = $searchResults->where('description', 'like', "%{$this->searchDescription}%");
        }

        if ($this->searchStatus) {
            $searchResults = $searchResults->where('status', 'like', "%{$this->searchStatus}%");
        }

        $tasks = $searchResults->orderBy('date_created', 'DESC')->paginate(16);

        return view('livewire.search-tasks', [
            'tasks' => $tasks->total() > 0 ? $tasks : [],
        ]);
    }

    public function updatingSearch() {
        $this->resetPage();
    }
}
