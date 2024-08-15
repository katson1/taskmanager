@extends('components.layouts.app')

@section('content')
<div>
    <h1 class="text-3xl font-extrabold mb-6 text-gray-800">Gerenciamento de Categorias</h1>

    <form wire:submit.prevent="store" class="mb-6 bg-white p-4 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome da Categoria</label>
            <input type="text" wire:model="name" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            {{ $categoryId ? 'Atualizar Categoria' : 'Criar Categoria' }}
        </button>
    </form>

    <h2 class="text-2xl font-bold mb-4 text-gray-800">Categorias</h2>
    <ul class="space-y-2">
        @foreach($categories as $category)
            <li class="flex justify-between items-center p-3 border border-gray-300 rounded-md hover:bg-gray-100 shadow-sm">
                <span class="text-gray-700">{{ $category->name }}</span>
                <div class="space-x-2">
                    <button wire:click="edit({{ $category->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">Editar</button>
                    <button wire:click="delete({{ $category->id }})" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Excluir</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection