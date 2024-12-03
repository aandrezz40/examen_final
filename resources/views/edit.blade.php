<x-app-layout>
    <div class="container w-full mt-4">
        <div class="mx-auto bg-white shadow-md rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-2xl font-semibold">Edit Task</h2>
            </div>
            <div class="px-6 py-4">
                <!-- Formulario para editar la tarea -->
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                        <input type="text" class="w-full border-gray-300 rounded-md shadow-sm p-2" id="title" name="title" value="{{ $task->title }}" required maxlength="50">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                        <input type="text" class="w-full border-gray-300 rounded-md shadow-sm p-2" id="description" name="description" value="{{ $task->description }}" required maxlength="100">
                    </div>

                    <div class="mb-4">
                        <label for="completed" class="block text-gray-700 font-medium mb-2">Completed</label>
                        <select class="w-full border-gray-300 rounded-md shadow-sm p-2" id="completed" name="completed">
                            <option value="1" {{ $task->completed ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$task->completed ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                        Update Task
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
