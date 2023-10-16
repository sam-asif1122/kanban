@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>
    <ul x-data="taskReorder()" x-cloak>
        <template x-for="(task, index) in tasks" :key="task.id">
            <li class="list-group-item" x-bind:data-task-id="task.id" draggable="true"
                @dragstart="onDragStart(index)" @dragover.prevent="onDragOver" @drop="onDrop(index)"
                @dragend="onEnd">
                <span x-text="task.title" class="dev-list"></span>
                <span x-text="task.priority" class="dev-list"></span>
            </li>
        </template>
    </ul>
    <script>
        function taskReorder() {
            return {
                tasks: @json($tasks), // Pass tasks from your controller
                draggedTaskIndex: null, // To store the index of the dragged task

                onDragStart(index) {
                    this.draggedTaskIndex = index;
                },

                onDragOver(event) {
                    event.preventDefault();
                },

                onDrop(index) {
                    if (this.draggedTaskIndex === index) {
                        return;
                    }
                    const movedTask = this.tasks.splice(this.draggedTaskIndex, 1)[0];
                    this.tasks.splice(index, 0, movedTask);
                    this.updatePriorities();
                },

                updatePriorities() {
                    this.tasks.forEach((task, index) => {
                        task.priority = index + 1;
                        axios.post(`/tasks/${task.id}/update-priority`, { newPriority: task.priority });
                    });
                },

                onEnd() {
                    this.updatePriorities();
                },
            };
        }
    </script>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    @endpush
@endsection
