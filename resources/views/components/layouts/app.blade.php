<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4 space-y-8">
        <div class="flex justify-center mb-6">
            <a href="{{ url('/') }}" 
               class="px-4 py-2 mx-2 rounded-md text-white {{ request()->is('/') ? 'bg-blue-500' : 'bg-gray-300' }}">
                Home
            </a>
            <a href="{{ route('tasks.index') }}" 
               class="px-4 py-2 mx-2 rounded-md text-white {{ request()->routeIs('tasks.index') ? 'bg-blue-500' : 'bg-gray-300' }}">
                Tarefas
            </a>
            <a href="{{ route('categories.index') }}" 
               class="px-4 py-2 mx-2 rounded-md text-white {{ request()->routeIs('categories.index') ? 'bg-blue-500' : 'bg-gray-300' }}">
                Categorias
            </a>
        </div>

        @yield('content')
    </div>

    @livewireScripts
</body>
</html>