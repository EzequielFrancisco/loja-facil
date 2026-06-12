<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Minhas Lojas') }}
            </h2>
            <a href="{{ route('lojas.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 shadow-md hover:shadow-lg">
                + Nova Loja
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensagens de sucesso/erro -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-400 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-400 rounded-lg shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if($lojas->count() > 0)
                <!-- Grid de Lojas -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($lojas as $loja)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <!-- Header da Loja -->
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4">
                                <div class="flex justify-between items-start">
                                    <div class="text-white">
                                        <h3 class="text-xl font-bold">{{ $loja->nome }}</h3>
                                        <p class="text-blue-100 text-sm mt-1">{{ $loja->produtos_count ?? 0 }} produtos</p>
                                    </div>
                                    @if($loja->ativo)
                                        <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">Ativa</span>
                                    @else
                                        <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Inativa</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Corpo da Loja -->
                            <div class="p-4">
                                <!-- Email -->
                                <div class="flex items-center gap-2 mb-2 text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-sm">{{ $loja->email }}</span>
                                </div>

                                <!-- NIF -->
                                <div class="flex items-center gap-2 mb-2 text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                    </svg>
                                    <span class="text-sm">{{ $loja->nif_formatado ?? $loja->nif }}</span>
                                </div>

                                <!-- Telefone -->
                                @if($loja->telefone)
                                <div class="flex items-center gap-2 mb-2 text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span class="text-sm">{{ $loja->telefone }}</span>
                                </div>
                                @endif

                                <!-- Endereço -->
                                @if($loja->endereco)
                                <div class="flex items-center gap-2 mb-2 text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-sm">{{ $loja->endereco }}, {{ $loja->cidade }} - {{ $loja->estado }}</span>
                                </div>
                                @endif

                                <!-- Descrição (resumida) -->
                                @if($loja->descricao)
                                <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                        {{ Str::limit($loja->descricao, 100) }}
                                    </p>
                                </div>
                                @endif

                                <!-- Botões de Ação -->
                                <div class="mt-4 flex gap-2">
                                    <a href="{{ route('lojas.show', $loja) }}" 
                                       class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                        Ver Detalhes
                                    </a>
                                    <a href="{{ route('lojas.edit', $loja) }}" 
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('lojas.destroy', $loja) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta loja?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Paginação -->
                <div class="mt-8">
                    
                </div>

            @else
                <!-- Estado vazio -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-100 dark:bg-blue-900/30 rounded-full p-4 mb-4">
                            <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Nenhuma loja cadastrada</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Comece criando sua primeira loja agora mesmo!</p>
                        <a href="{{ route('lojas.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-all duration-200 shadow-md hover:shadow-lg">
                            + Criar Primeira Loja
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>