<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard - LojaFacil') }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('lojas.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                    🏢 + Nova Loja
                </a>
                <a href="{{ route('produtos.create') }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                    📦 + Novo Produto
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Cards de Indicadores com animação -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total de Lojas -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm font-medium uppercase tracking-wider">Total de Lojas</p>
                                <p class="text-white text-4xl font-bold mt-2">{{ $totalLojas }}</p>
                            </div>
                            <div class="bg-white/20 rounded-full p-3 backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('lojas.index') }}" class="text-white text-sm hover:text-blue-100 transition-colors inline-flex items-center gap-1">
                                Ver todas as lojas 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Total de Produtos -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium uppercase tracking-wider">Total de Produtos</p>
                                <p class="text-white text-4xl font-bold mt-2">{{ $totalProdutos }}</p>
                            </div>
                            <div class="bg-white/20 rounded-full p-3 backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('produtos.index') }}" class="text-white text-sm hover:text-green-100 transition-colors inline-flex items-center gap-1">
                                Ver todos os produtos 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Valor Total do Stock -->
                <div class="bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium uppercase tracking-wider">Valor Total do Stock</p>
                                <p class="text-white text-4xl font-bold mt-2">
                                    Kz {{ number_format($valorTotalStock, 2, ',', '.') }}
                                </p>
                            </div>
                            <div class="bg-white/20 rounded-full p-3 backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('produtos.index') }}" class="text-white text-sm hover:text-purple-100 transition-colors inline-flex items-center gap-1">
                                Gerenciar stock 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráfico Impressionante e Últimos Itens -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Gráfico de Produtos por Loja - Versão Premium -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            📊 Produtos por Loja
                        </h3>
                    </div>
                    <div class="p-6">
                        @if($lojasNomes->count() > 0)
                            @php
                                $maxProdutos = $produtosCount->max() > 0 ? $produtosCount->max() : 1;
                                $cores = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#ec4899', '#06b6d4', '#84cc16'];
                            @endphp
                            
                            <div class="space-y-5">
                                @foreach($lojasNomes as $index => $nome)
                                    @php
                                        $porcentagem = ($produtosCount[$index] / $maxProdutos) * 100;
                                        $cor = $cores[$index % count($cores)];
                                    @endphp
                                    <div class="group">
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="flex items-center gap-2">
                                                <div class="w-3 h-3 rounded-full" style="background-color: {{ $cor }}"></div>
                                                <span class="font-semibold text-gray-700 dark:text-gray-300">{{ $nome }}</span>
                                            </div>
                                            <div class="flex items-center gap-3">
                                                <span class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{ $produtosCount[$index] }}</span>
                                                <span class="text-sm text-gray-500 dark:text-gray-400">produtos</span>
                                            </div>
                                        </div>
                                        <div class="relative">
                                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-10 overflow-hidden shadow-inner">
                                                <div class="h-full rounded-full transition-all duration-1000 ease-out relative overflow-hidden"
                                                     style="width: 0; background: linear-gradient(90deg, {{ $cor }}, {{ $cor }}cc);"
                                                     id="bar-{{ $index }}">
                                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/20 animate-shimmer"></div>
                                                </div>
                                            </div>
                                            <div class="absolute top-1/2 -translate-y-1/2 left-3 text-white text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                {{ $produtosCount[$index] }} produtos
                                            </div>
                                        </div>
                                        <div class="flex justify-between mt-1">
                                            <span class="text-xs text-gray-400">0</span>
                                            <span class="text-xs text-gray-400">{{ ceil($maxProdutos / 2) }}</span>
                                            <span class="text-xs text-gray-400">{{ $maxProdutos }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Média: {{ round($produtosCount->avg(), 1) }} produtos/loja</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Total: {{ $produtosCount->sum() }} produtos</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="h-80 flex items-center justify-center text-gray-500 dark:text-gray-400">
                                <div class="text-center">
                                    <svg class="w-24 h-24 mx-auto mb-4 text-gray-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                    <p class="text-lg font-medium">Nenhuma loja cadastrada ainda</p>
                                    <p class="text-sm mt-2">Comece criando sua primeira loja!</p>
                                    <a href="{{ route('lojas.create') }}" class="text-blue-500 hover:text-blue-600 text-sm mt-4 inline-block font-medium">
                                        + Criar primeira loja →
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Últimos Produtos Adicionados com design melhorado -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
                    <div class="bg-gradient-to-r from-green-600 to-teal-600 px-6 py-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                🆕 Últimos Produtos
                            </h3>
                            <a href="{{ route('produtos.index') }}" class="text-white/80 hover:text-white text-sm flex items-center gap-1 transition-colors">
                                Ver todos 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        <div class="space-y-3">
                            @forelse($ultimosProdutos as $produto)
                                <div class="group flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-102">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform">
                                            @if($produto->foto)
                                                <img src="{{ Storage::url($produto->foto) }}" alt="{{ $produto->nome }}" class="w-12 h-12 rounded-xl object-cover">
                                            @else
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                                {{ $produto->nome }}
                                            </p>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                    </svg>
                                                    {{ $produto->loja->nome ?? 'Sem loja' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-green-600 dark:text-green-400 text-lg">Kz {{ number_format($produto->preco, 2, ',', '.') }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1 justify-end">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                            Qtd: {{ $produto->quantidade }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12 text-gray-500 dark:text-gray-400">
                                    <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <p class="text-lg">Nenhum produto cadastrado ainda.</p>
                                    <a href="{{ route('produtos.create') }}" class="text-blue-500 hover:text-blue-600 inline-block mt-4 font-medium">
                                        + Adicionar primeiro produto
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lista de Lojas Recentes com design melhorado -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            🏪 Suas Lojas Recentes
                        </h3>
                        <a href="{{ route('lojas.index') }}" class="text-white/80 hover:text-white text-sm flex items-center gap-1 transition-colors">
                            Ver todas 
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                        @forelse($ultimasLojas as $loja)
                            <div class="group relative bg-gradient-to-br from-gray-50 to-white dark:from-gray-700 dark:to-gray-800 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-400/20 to-transparent rounded-bl-full"></div>
                                <div class="p-5">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-bold text-lg text-gray-800 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                            {{ $loja->nome }}
                                        </h4>
                                        @if($loja->ativo)
                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 font-medium flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                                Ativa
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 font-medium">
                                                Inativa
                                            </span>
                                        @endif
                                    </div>
                                    
                                    @if($loja->endereco)
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 flex items-start gap-1">
                                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ Str::limit($loja->endereco, 40) }}
                                        </p>
                                    @endif
                                    
                                    @if($loja->telefone)
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            {{ $loja->telefone }}
                                        </p>
                                    @endif
                                    
                                    <div class="mt-4 pt-3 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                                {{ $loja->produtos_count }} produtos
                                            </div>
                                        </div>
                                        <a href="{{ route('lojas.show', $loja) }}" 
                                           class="text-blue-500 hover:text-blue-700 text-sm font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                                            Ver detalhes
                                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-12 text-gray-500 dark:text-gray-400">
                                <svg class="w-20 h-20 mx-auto mb-4 text-gray-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <p class="text-lg">Nenhuma loja cadastrada ainda.</p>
                                <a href="{{ route('lojas.create') }}" class="text-blue-500 hover:text-blue-600 inline-block mt-4 font-medium">
                                    + Criar primeira loja
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.5s ease-out forwards;
            opacity: 0;
        }
        
        .animate-shimmer {
            animation: shimmer 2s infinite;
        }
        
        .hover\:scale-102:hover {
            transform: scale(1.02);
        }
        
        .hover\:shadow-3xl:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>

    <script>
        // Animação das barras do gráfico
        document.addEventListener('DOMContentLoaded', function() {
            const bars = document.querySelectorAll('[id^="bar-"]');
            bars.forEach((bar, index) => {
                const width = bar.style.width;
                setTimeout(() => {
                    bar.style.width = width;
                }, 100 + (index * 100));
            });
        });
    </script>
</x-app-layout>