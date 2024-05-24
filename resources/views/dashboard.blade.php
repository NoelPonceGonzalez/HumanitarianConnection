<x-app-layout>
    @if (auth()->user()->role === 'admin')
    <div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-md rounded p-6 w-full max-w-lg">
        <p class="text-lg font-semibold mb-4">Bienvenido, {{ auth()->user()->name }}.</p>
        <h2 class="text-xl font-semibold mb-2">Panel de Administración</h2>
        <div class="flex justify-center space-x-4">
        </div>
    </div>
</div>

    @elseif (auth()->user()->role === 'contManager')
        <div>
            <p>Bienvenido, profesor.</p>
        </div>
    @elseif (auth()->user()->role === 'guest')
        <div>
            <p>Bienvenido, estudiante.</p>
        </div>
    @endif
</x-app-layout>