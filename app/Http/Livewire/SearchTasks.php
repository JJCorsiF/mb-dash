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

    protected $listeners = ['taskCreated', 'taskCompleted'];

    public function taskCompleted() {
        $this->resetPage();
    }

    public function taskCreated() {
        $this->resetPage();
    }

    public function render()
    {
        $searchResults = TaskModel::orderBy('date_created', 'DESC');

        if ($this->searchName) {
            $searchResults = $searchResults->where('name', 'like', "%{$this->searchName}%");
        }

        if ($this->searchDescription) {
            $searchResults = $searchResults->where('description', 'like', "%{$this->searchDescription}%");
        }

        if ($this->searchStatus) {
            $searchResults = $searchResults->where('status', 'like', "%{$this->searchStatus}%");
        }

        $tasks = $searchResults->paginate(16);

        return view('livewire.search-tasks', [
            'tasks' => $tasks->total() > 0 ? $tasks : [],
        ]);
    }

    public function updatingSearch() {
        $this->resetPage();
    }
}
