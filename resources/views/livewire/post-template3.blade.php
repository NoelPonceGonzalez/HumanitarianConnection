<div class="flex justify-center">
    <!-- Botón de Upload Post -->
    <button class="absolute flex flex-end right-0 mt-5 mr-20 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded" wire:click="savePost">Upload Post</button>
    <div class="w-2/4 mt-10">
        <!-- Header -->
        <header class="bg-gray-800 text-white py-4 px-6 flex justify-between items-center">
            <!-- Título -->
            <h1 class="text-xl font-bold">HumanitarianConnection</h1>
        </header>

        <!-- Contenido principal -->
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="text-center">
                <!-- Título principal -->
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                    @if($title)
                        {{ $title }}
                    @else
                        Welcome to our Newspaper
                    @endif
                </h1>
                <!-- Email -->
            </div>
            <!-- Contenido específico de la plantilla -->
            <div class="mt-8 flex flex-col items-center">
                <!-- Imagen por defecto -->
                <input type="file" id="imageInput2" class="hidden">
                <label for="imageInput2" class="cursor-pointer w-full flex justify-center mt-4">
                    <img id="articleImage2" src="{{ asset('periodico.jpeg') }}" alt="Periodico" class="w-56 h-40">
                </label>
                <!-- Text Area 1 -->
                <div class="w-full flex flex-col justify-between items-start mt-4">
                    <textarea wire:model="description1" class="w-full h-40 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Write your article here..."></textarea>
                </div>
                <!-- Text Area 2 -->
                <textarea wire:model="description2" class="w-full h-40 px-4 py-2 mt-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Write your article here..."></textarea>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 px-6 text-center">
            <p>{{ $email }}</p>
            <p>&copy; 2024 My Newspaper. All rights reserved.</p>
        </footer>
    </div>
</div>

<script>
    // Manejar el evento de clic en la imagen para abrir el selector de archivos
    document.getElementById('imageInput2').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const image = document.getElementById('articleImage2');
            image.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>
