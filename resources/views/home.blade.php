@extends('components.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h1 class="text-4xl font-extrabold mb-6 text-gray-800">Bem-vindo ao Gerenciamento de Tarefas</h1>
    <p class="text-lg text-gray-600 mb-4">Gerencie suas tarefas e categorias de maneira eficiente.</p>
    <div class="flex justify-center space-x-4">
        <a href="{{ route('tasks.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Ver Tarefas</a>
        <a href="{{ route('categories.index') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Ver Categorias</a>
    </div>
</div>
@endsection