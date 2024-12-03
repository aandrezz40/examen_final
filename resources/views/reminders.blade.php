<x-app-layout>
    <div class="container w-full mt-4">
        <div class="mx-auto bg-white shadow-md rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-2xl font-semibold">All Categories and Their Reminders</h2>
            </div>
            <div class="px-6 py-4">
                @foreach($categories as $category)
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold">Category: {{ $category->name }}</h3>
                        @if($category->tasks->isEmpty())
                            <p>No reminders found for this category.</p>
                        @else
                            <ul>
                                @foreach($category->tasks as $task)
                                    @if(!$task->completed) <!-- Mostrar solo tareas no completadas -->
                                        <li class="mb-2 p-2 border rounded">
                                            <strong>Title:</strong> {{ $task->title }}<br>
                                            <strong>Description:</strong> {{ $task->description }}<br>
                                            <strong>Completed:</strong> {{ $task->completed ? 'Yes' : 'No' }}

                                            <!-- Botones de acción -->
                                            <div class="mt-2">
                                                <!-- Botón de edición -->
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="bg-blue-500 text-white font-bold py-1 px-2 rounded hover:bg-blue-600">
                                                    Edit
                                                </a>
                                                <!-- Botón de actualizar estado -->
                                                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="bg-yellow-500 text-white font-bold py-1 px-2 rounded hover:bg-yellow-600">
                                                        Mark as Completed
                                                    </button>
                                                </form>
                                                <!-- Botón de eliminación -->
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white font-bold py-1 px-2 rounded hover:bg-red-600">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
