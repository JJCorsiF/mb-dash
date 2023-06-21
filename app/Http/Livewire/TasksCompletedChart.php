<?php

namespace App\Http\Livewire;

use App\Models\TaskModel;
use Livewire\Component;

class TasksCompletedChart extends Component
{
    public function render()
    {
        $tasksCompletedByDay = TaskModel::selectRaw('COUNT(*) as count, DATE_FORMAT(date_done, \'%D, %M, %Y\') as date')
            ->where('status', 'Done')
            ->where('date_done', '!=', 'null')
            ->groupBy('date')
            ->orderBy('date_done')
            ->get();

        return view('livewire.tasks-completed-chart', [
            'tasksCompletedByDay' => $tasksCompletedByDay,
        ]);
    }
}
