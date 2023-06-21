<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchTasks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchTasksTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SearchTasks::class);

        $component->assertStatus(200);
    }
}
