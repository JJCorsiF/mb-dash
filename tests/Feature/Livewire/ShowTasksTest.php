<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShowTasks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowTasksTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowTasks::class);

        $component->assertStatus(200);
    }
}
