<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CreateTaskModal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTaskModalTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(CreateTaskModal::class);

        $component->assertStatus(200);
    }
}
