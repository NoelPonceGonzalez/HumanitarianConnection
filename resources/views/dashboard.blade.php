<x-app-layout>
    <span id="errorMessage" class="hidden absolute top-4 right-4 bg-red-500 opacity-60 text-white py-2 px-4 rounded">Please choose a template</span>
    <span id="errorMessageNull" class="hidden absolute top-4 right-4 bg-red-500 opacity-60 text-white py-2 px-4 rounded">Please complete all fields</span>

    <div class="relative">
        <!-- Contenedor del título y botón -->
        <div id="titleAndButton" class="max-w-4xl mx-auto mt-8 flex justify-between items-center">
            <h1 class="text-3xl font-semibold text-gray-800">Posts</h1>
            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'contManager')
                <button id="btnAddNewPost" class="rounded h-10 w-20 bg-green-500 text-white hover:bg-green-600">
                    New Post
                </button>
            @endif
        </div>

<!-- Contenedor de los posts -->
<div id="postsContent" class="max-w-4xl w-1/3 mx-auto mt-4 space-y-6">
    @php
        $sortedPosts = $posts->sortByDesc('likes')->values();
    @endphp

    @foreach ($sortedPosts as $index => $post)
        <div class="bg-white shadow overflow-hidden sm:rounded-lg relative">
            <div class="px-4 py-5 sm:px-6">
                <a href="{{ route('show', ['post' => $post->id]) }}" class="post-link">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $post->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</p>
                    </div>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $post->description }}</p>
                </a>
            </div>
            <!-- Botón de "like" -->
            <div class="flex justify-end  space-between mr-2 flex items-center">
                <x-ei-like wire:click="like" class="w-7 right-2 opacity-60 cursor-pointer transition-transform duration-300 transform hover:scale-110 hover:text-blue-900"/>     
                <p class="text-sm text-gray-500 mt-1 mr-2">{{ $post->likes }}</p>
            </div>
        </div>
    @endforeach
</div>


    <!-- Formulario para crear un nuevo post -->
    <div id="newPostForm" class="hidden flex flex-col items-center justify-center max-w-4xl mx-auto mt-56 space-y-6">
        <div class="mt-16">
            <form id="postForm" class="w-full max-w-md">
                <div class="flex -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label for="title" class="block text-xl font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label for="email" class="block text-xl font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>
                </div>
                <div class="w-full">
                    <label for="description" class="block text-xl font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required></textarea>
                </div>
                <!-- Botón de Siguiente -->
                <div class="mt-4">
                    <button type="button" id="btnNextForm" class="bg-blue-500 h-10 w-20 text-white px-4 py-2 rounded hover:bg-blue-600">Next</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Columna para la selección de plantilla -->
    <div id="templateSelection" class="hidden flex justify-center items-center mt-56 space-x-8">
        <label for="template1" class="template-label flex flex-col items-center cursor-pointer mb-4 transition-transform duration-300 transform hover:scale-110">
            <input type="radio" id="template1" name="template" value="template1" class="hidden peer">
            <img src="{{ asset('imgTemplate1.png') }}" alt="Template 1" class="w-56 h-56 rounded-lg mb-2 peer-checked:border-blue-500 peer-checked:scale-105">
            <span class="text-xl font-medium text-gray-700 peer-checked:text-blue-500">Template 1</span>
        </label>
        <label for="template2" class="template-label flex flex-col items-center cursor-pointer mb-4 transition-transform duration-300 transform hover:scale-110">
            <input type="radio" id="template2" name="template" value="template2" class="hidden peer">
            <img src="{{ asset('imgTemplate2.png') }}" alt="Template 2" class="w-56 h-56 rounded-lg mb-2 peer-checked:border-blue-500 peer-checked:scale-105">
            <span class="text-xl font-medium text-gray-700 peer-checked:text-blue-500">Template 2</span>
        </label>
        <label for="template3" class="template-label flex flex-col items-center cursor-pointer mb-4 transition-transform duration-300 transform hover:scale-110">
            <input type="radio" id="template3" name="template" value="template3" class="hidden peer">
            <img src="{{ asset('imgTemplate3.png') }}" alt="Template 3" class="w-56 h-56 rounded-lg mb-2 peer-checked:border-blue-500 peer-checked:scale-105">
            <span class="text-xl font-medium text-gray-700 peer-checked:text-blue-500">Template 3</span>
        </label>
        <!-- Botón de Modificar Post -->
        <button type="button" id="btnNextTemplate" class="bg-blue-500 h-10 w-20 text-white px-4 py-2 rounded hover:bg-blue-600 wire:click=editPost">Next</button>
    </div>

    <script>
        document.getElementById('btnAddNewPost').addEventListener('click', function() {
            document.getElementById('titleAndButton').classList.add('hidden');
            document.getElementById('postsContent').classList.add('hidden');
            document.getElementById('newPostForm').classList.remove('hidden');
        });

        document.getElementById('btnNextForm').addEventListener('click', function() {
            // Obtener valores de los campos
            const title = document.getElementById('title').value.trim();
            const email = document.getElementById('email').value.trim();
            const description = document.getElementById('description').value.trim();

            // Verificar si los campos están vacíos
            if (title === '' || email === '' || description === '') {
                var errorMessage = document.getElementById('errorMessageNull');
                errorMessage.classList.remove('hidden');
                setTimeout(function() {
                    errorMessage.classList.add('hidden');
                }, 3000);
            } else {
                // Ocultar el formulario actual y mostrar la selección de plantilla
                document.getElementById('newPostForm').classList.add('hidden');
                document.getElementById('templateSelection').classList.remove('hidden');
            }
        });

        document.getElementById('btnNextTemplate').addEventListener('click', function() {
            var selectedTemplate = document.querySelector('input[name="template"]:checked');
            var title = document.getElementById('title').value;
            var email = document.getElementById('email').value;
            var description = document.getElementById('description').value;

            if (!selectedTemplate) {
                var errorMessage = document.getElementById('errorMessage');
                errorMessage.classList.remove('hidden');
                setTimeout(function() {
                    errorMessage.classList.add('hidden');
                }, 3000);
            } else {
                // Obtener el valor de la plantilla seleccionada
                var templateValue = selectedTemplate.value;
                // Redirigir a la ruta correspondiente con los datos proporcionados
                window.location.href = '/' + templateValue + '?title=' + title + '&email=' + email + '&description=' + description;
            }
        });
    </script>
</x-app-layout>
