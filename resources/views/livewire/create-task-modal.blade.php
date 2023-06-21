<div id="createTaskModal" class="flex" aria-labelledby="create task modal" aria-hidden="true"> <!-- class="modal fade" tabindex="-1"  --> <!-- wire:model="createTaskModal" x-show="$wire.createTaskModal" -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new Task</h5>
                <button type="button" class="btn-close" aria-label="Close" wire:click="closeTaskModal"></button> <!--  data-bs-dismiss="modal" -->
            </div>
            <form wire:submit.prevent="createTask">
                <div class="modal-body flex flex-col items-center justify-center">

                    <div class="flex flex-row flex-wrap">
                        <label for="newtask.name" class="form-label">Task name *</label>
                        <input wire:model.lazy="newTaskName" id="newtask.name" class="form-control" type="text" placeholder="" required />
                    </div>

                    <div class="flex flex-row flex-wrap">
                        <label for="newtask.description" class="form-label">Task description</label>
                        <input wire:model.lazy="newTaskDescription" id="newtask.description" class="form-control" type="text" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeTaskModal">Close</button> <!--  data-bs-dismiss="modal" -->
                    <button type="submit" class="btn btn-primary" wire:click="createTask">Add new Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
