<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CreateTaskModal;
use App\Models\TaskModel;
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

    /** @test */
    public function can_create_tasks() {
        //given
        $component = Livewire::test(CreateTaskModal::class);
        $component->set('newTaskName', 'finish this trial');
        $component->set('newTaskDescription', 'this trial needs tests');

        //when
        $component->call('createTask');

        //then
        $this->assertTrue(
            TaskModel::where('name', 'finish this trial')
            ->where('description', 'this trial needs tests')
            ->where('status', 'To Do')
            ->exists()
        );
    }
}
