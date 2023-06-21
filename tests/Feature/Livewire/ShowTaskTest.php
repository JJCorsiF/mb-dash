<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShowTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowTaskTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowTask::class);

        $component->assertStatus(200);
    }
}
