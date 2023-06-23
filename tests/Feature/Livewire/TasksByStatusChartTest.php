<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TasksByStatusChart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TasksByStatusChartTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(TasksByStatusChart::class);

        $component->assertStatus(200);
    }
}
