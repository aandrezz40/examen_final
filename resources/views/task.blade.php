<x-app-layout>


    <div class="container w-full mt-4">
        <div class="mx-auto bg-white shadow-md rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-2xl font-semibold">Crear Nueva Tarea</h2>
            </div>
            <div class="px-6 py-4">
                <!-- Formulario para crear una nueva tarea -->
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf <!-- Token de protección CSRF -->

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-medium mb-2">Título de la Tarea</label>
                        <input type="text" class="w-full border-gray-300 rounded-md shadow-sm p-2" id="title" name="title" required maxlength="50">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-medium mb-2">Descripción</label>
                        <input type="text" class="w-full border-gray-300 rounded-md shadow-sm p-2" id="description" name="description" required maxlength="100">
                    </div>

                    <div class="mb-4">
                        <label for="completed" class="block text-gray-700 font-medium mb-2">¿Completada?</label>
                        <select class="w-full border-gray-300 rounded-md shadow-sm p-2" id="completed" name="completed">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="id_categories" class="block text-gray-700 font-medium mb-2">Categoría</label>
                        <select class="w-full border-gray-300 rounded-md shadow-sm p-2" id="id_categories" name="id_categories" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 m-auto text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Crear Tarea</button>
                </form>
            </div>
        </div>
    </div>

    
</x-app-layout>
