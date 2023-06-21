<?php

namespace App\Http\Livewire;

use App\Models\TaskModel;
use Livewire\Component;

class TasksByStatusChart extends Component
{
    public function render()
    {
        $tasksByStatus = TaskModel::selectRaw('COUNT(*) as count, status')
            ->groupBy('status')
            ->orderBy('status')
            ->get();

        return view('livewire.tasks-by-status-chart', [
            'tasksByStatus' => $tasksByStatus,
        ]);
    }
}
