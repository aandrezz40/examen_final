<x-app-layout>



    <div class="container w-full mt-4">
        <div class=" mx-auto bg-white shadow-md rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-2xl font-semibold">Crear Nueva Categoría</h2>
            </div>
            <div class="px-6 py-4">
                <!-- Formulario para crear una nueva categoría -->
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf <!-- Token de protección CSRF -->
    
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nombre de la Categoría</label>
                        <input type="text" class="w-full border-gray-300 rounded-md shadow-sm p-2" id="name" name="name" required maxlength="255">
                    </div>
    
                    <button type="submit" class="bg-blue-500 m-auto text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Crear Categoría</button>
                </form>
            </div>
        </div>
    </div>

    
</x-app-layout>
