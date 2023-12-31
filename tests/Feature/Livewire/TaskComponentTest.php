<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TaskComponent;
use App\Models\TaskModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TaskComponentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(TaskComponent::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function task_can_be_completed() {
        //given
        $component = Livewire::test(
            TaskComponent::class,
            [
                'task' => TaskModel::create([
                    'id' => 1,
                    'name' => 'an existing task name'
                ])
            ]
        );

        //when
        $component->call('complete');

        //then
        $this->assertTrue(
            TaskModel::find(1)
            // ->where('name', 'an existing task name')
            ->where('status', 'Done')
            ->whereNotNull('date_updated')
            ->whereNotNull('date_done')
            ->exists()
        );
        // $this->assertDatabaseHas('tasks', ['name' => 'an existing task name', 'status' => 'Done']);
    }

    /** @test */
    public function task_can_be_deleted() {
        //given
        $component = Livewire::test(
            TaskComponent::class,
            [
                'task' => TaskModel::create([
                    'id' => 2,
                    'name' => 'another existing task name'
                ])
            ]
        );

        //when
        $component->call('delete');

        //then
        $this->assertNull(
            TaskModel::find(2)
        );
        // $this->assertDatabaseMissing('tasks', ['name' => 'another existing task name']);
    }
}
