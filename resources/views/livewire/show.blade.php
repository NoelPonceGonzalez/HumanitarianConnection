<div>
    @if($post->template === 'template1')
        <div class="max-w-4xl mx-auto mt-8">
            <div class="w-full mt-20">
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
                            @if($post->title)
                                {{ $post->title }}
                            @else
                                Welcome to our Newspaper
                            @endif
                        </h1>
                        <!-- Email -->
                    </div>
                    <!-- Contenido específico de la plantilla 1 -->
                    <div class="mt-8 flex flex-col sm:flex-row justify-between items-start">
                        <!-- Text Area 1 -->
                        <div class="w-full sm:w-1/2 flex justify-between items-start">
                            <p class="w-full h-40 px-4 py-2">{{$post->description1}}</p>
                        </div>
                        <!-- Imagen por defecto -->
                        <label for="imageInput">
                            <img id="articleImage" src="{{ asset('periodico.jpeg') }}" alt="Periodico" class="w-56 h-40 m-10 mr-28 mt-4 sm:mt-0">
                        </label>
                    </div>
                    <!-- Text Area 2 -->
                    <div class="mt-10">
                        <p class="w-full h-40 px-4 py-2 sm:mt-0 ">{{$post->description2}}</p>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="bg-gray-800 text-white py-4 px-6 text-center">
                    <p>{{ $post->email }}</p>
                    <p>&copy; 2024 My Newspaper. All rights reserved.</p>
                </footer>
            </div>
        </div>
    @elseif($post->template === 'template2')
        <div>
        <div class="flex justify-center">
    <div class="w-2/4 mt-5">
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
                    {{$post->title}}
                </h1>
                <!-- Email -->
            </div>
            <!-- Contenido específico de la plantilla 2 -->
            <div class="mt-8 flex flex-col justify-between items-start">
                <!-- Text Area 1 -->
                <div class="w-full flex justify-between items-start">
                    <p class="w-full h-40 px-4 py-2" placeholder="Write your article here...">{{$post->description1}}</p>
                </div>
                <!-- Imagen por defecto -->
                <label for="imageInput2" class="w-full flex justify-center mt-4">
                    <img id="articleImage2" src="{{ asset('periodico.jpeg') }}" alt="Periodico" class="w-56 h-40">
                </label>
                <!-- Text Area 2 -->
                <p class="w-full h-40 px-4 py-2 mt-4" placeholder="Write your article here...">{{$post->description2}}</p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 px-6 text-center">
            <p>{{ $post->email }}</p>
            <p>&copy; 2024 My Newspaper. All rights reserved.</p>
        </footer>
    </div>
</div>
        </div>
    @elseif($post->template === 'template3')
    <div class="flex justify-center">
    <div class="w-2/4 mt-5">
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
                    {{$post->title}}
                </h1>
                <!-- Email -->
            </div>
            <!-- Contenido específico de la plantilla -->
            <div class="mt-8 flex flex-col items-center">
                <!-- Imagen por defecto -->
                <label for="imageInput2" class="w-full flex justify-center mt-4">
                    <img id="articleImage2" src="{{ asset('periodico.jpeg') }}" alt="Periodico" class="w-56 h-40">
                </label>
                <!-- Text Area 1 -->
                <div class="w-full flex flex-col justify-between items-start mt-4">
                    <p class="w-full h-40 px-4 py-2 " placeholder="Write your article here...">{{$post->description1}}</p>
                </div>
                <!-- Text Area 2 -->
                <p class="w-full h-40 px-4 py-2 mt-4" placeholder="Write your article here...">{{$post->description2}}</p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 px-6 text-center">
            <p>{{ $post->email }}</p>
            <p>&copy; 2024 My Newspaper. All rights reserved.</p>
        </footer>
    </div>
</div>

    @endif
</div>
