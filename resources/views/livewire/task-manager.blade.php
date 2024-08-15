@extends('components.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-extrabold mb-6 text-gray-800">Gerenciamento de Tarefas</h1>

    <form wire:submit.prevent="store" class="mb-6 bg-white p-4 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" wire:model="title" id="title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea wire:model="description" id="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
            <select wire:model="category_id" id="category_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Selecione uma categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            {{ $taskId ? 'Atualizar Tarefa' : 'Criar Tarefa' }}
        </button>
    </form>

    <h2 class="text-2xl font-bold mb-4 text-gray-800">Tarefas</h2>
    <ul class="space-y-2">
        @foreach($tasks as $task)
            <li class="flex justify-between items-center p-3 border border-gray-300 rounded-md hover:bg-gray-100 shadow-sm">
                <div class="flex-1 space-y-1">
                    <strong class="block text-gray-800">{{ $task->title }}</strong>
                    <p class="text-sm text-gray-600">{{ $task->description }}</p>
                    <small class="block text-xs text-gray-500">Categoria: {{ $task->category->name }}</small>
                </div>
                <div class="space-x-2">
                    <button wire:click="edit({{ $task->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">Editar</button>
                    <button wire:click="delete({{ $task->id }})" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Excluir</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection