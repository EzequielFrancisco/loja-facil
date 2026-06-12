<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard - LojaFacil') }}
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('lojas.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    + Nova Loja
                </a>
                <a href="{{ route('produtos.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    + Novo Produto
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Cards de Indicadores -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total de Lojas -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm font-medium uppercase tracking-wide">Total de Lojas</p>
                                <p class="text-white text-3xl font-bold mt-2">{{ $totalLojas ?? 0 }}</p>
                            </div>
                            <div class="bg-white/20 rounded-full p-3">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('lojas.index') }}" class="text-white text-sm hover:text-blue-100 transition-colors">
                                Ver todas as lojas →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Total de Produtos -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium uppercase tracking-wide">Total de Produtos</p>
                                <p class="text-white text-3xl font-bold mt-2">{{ $totalProdutos ?? 0 }}</p>
                            </div>
                            <div class="bg-white/20 rounded-full p-3">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('produtos.index') }}" class="text-white text-sm hover:text-green-100 transition-colors">
                                Ver todos os produtos →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Valor Total do Stock -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium uppercase tracking-wide">Valor Total do Stock</p>
                                <p class="text-white text-3xl font-bold mt-2">
                                    {{ isset($valorTotalStock) ? 'Kz ' . number_format($valorTotalStock, 2, ',', '.') : 'Kz 0,00' }}
                                </p>
                            </div>
                            <div class="bg-white/20 rounded-full p-3">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('produtos.index') }}" class="text-white text-sm hover:text-purple-100 transition-colors">
                                Gerenciar stock →
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráfico e Últimos Itens -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Gráfico de Produtos por Loja -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Produtos por Loja</h3>
                    <div class="h-64">
                        <canvas id="produtosPorLojaChart"></canvas>
                    </div>
                </div>

                <!-- Últimos Produtos Adicionados -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Últimos Produtos</h3>
                        <a href="{{ route('produtos.index') }}" class="text-blue-500 hover:text-blue-600 text-sm">Ver todos →</a>
                    </div>
                    <div class="space-y-3">
                        @forelse($ultimosProdutos ?? [] as $produto)
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-800 dark:text-gray-200">{{ $produto->nome }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $produto->loja->nome ?? 'Sem loja' }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-800 dark:text-gray-200">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Qtd: {{ $produto->quantidade }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                Nenhum produto cadastrado ainda.
                                <a href="{{ route('produtos.create') }}" class="text-blue-500 hover:text-blue-600 block mt-2">Adicionar primeiro produto →</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Lista de Lojas Recentes -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Suas Lojas</h3>
                    <a href="{{ route('lojas.index') }}" class="text-blue-500 hover:text-blue-600 text-sm">Ver todas →</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($ultimasLojas ?? [] as $loja)
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition-shadow">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-200">{{ $loja->nome }}</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $loja->endereco ?? 'Endereço não informado' }}</p>
                            <div class="mt-3 flex justify-between items-center">
                                <span class="text-xs text-gray-500">{{ $loja->produtos_count ?? 0 }} produtos</span>
                                <a href="{{ route('lojas.show', $loja) }}" class="text-blue-500 hover:text-blue-600 text-sm">Ver detalhes →</a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8 text-gray-500 dark:text-gray-400">
                            Nenhuma loja cadastrada ainda.
                            <a href="{{ route('lojas.create') }}" class="text-blue-500 hover:text-blue-600 block mt-2">Criar primeira loja →</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('produtosPorLojaChart').getContext('2d');
        
        // Dados passados do controller
        const lojasNomes = @json($lojasNomes ?? []);
        const produtosCount = @json($produtosCount ?? []);
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: lojasNomes,
                datasets: [{
                    label: 'Quantidade de Produtos',
                    data: produtosCount,
                    backgroundColor: 'rgba(59, 130, 246, 0.5)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151'
                        },
                        grid: {
                            color: document.documentElement.classList.contains('dark') ? '#374151' : '#e5e7eb'
                        }
                    },
                    x: {
                        ticks: {
                            color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151'
                        },
                        grid: {
                            color: document.documentElement.classList.contains('dark') ? '#374151' : '#e5e7eb'
                        }
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>