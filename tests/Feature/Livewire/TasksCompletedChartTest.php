<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TasksCompletedChart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TasksCompletedChartTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(TasksCompletedChart::class);

        $component->assertStatus(200);
    }
}
