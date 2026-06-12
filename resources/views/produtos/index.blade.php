<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Meus Produtos') }}
            </h2>
            <a href="{{ route('produtos.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 shadow-md hover:shadow-lg">
                + Novo Produto
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensagens flash -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-400 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filtros e Busca -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-4 mb-6">
                <form method="GET" action="{{ route('produtos.index') }}" class="flex flex-col gap-4">
                    <!-- Linha 1: Busca e Loja -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Buscar por nome do produto..." 
                                   class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <select name="loja" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Todas as lojas</option>
                                @foreach($lojas as $loja)
                                    <option value="{{ $loja->id }}" {{ request('loja') == $loja->id ? 'selected' : '' }}>
                                        {{ $loja->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <!-- Linha 2: Preço Mínimo e Preço Máximo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="number" name="preco_min" value="{{ request('preco_min') }}" 
                                   placeholder="Preço mínimo (Kz)" step="0.01"
                                   class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <input type="number" name="preco_max" value="{{ request('preco_max') }}" 
                                   placeholder="Preço máximo (Kz)" step="0.01"
                                   class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                    
                    <!-- Linha 3: Apenas em Stock, Ordenação e Botões -->
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex flex-wrap items-center gap-4">
                            <!-- Checkbox Apenas em Stock -->
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="apenas_em_stock" value="1" 
                                       {{ request('apenas_em_stock') ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-blue-500 focus:ring-blue-500">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Apenas produtos em stock</span>
                            </label>
                            
                            <!-- Ordenação -->
                            <select name="ordenar" class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="recentes" {{ request('ordenar') == 'recentes' ? 'selected' : '' }}>Mais recentes</option>
                                <option value="antigos" {{ request('ordenar') == 'antigos' ? 'selected' : '' }}>Mais antigos</option>
                                <option value="nome_asc" {{ request('ordenar') == 'nome_asc' ? 'selected' : '' }}>Nome (A-Z)</option>
                                <option value="nome_desc" {{ request('ordenar') == 'nome_desc' ? 'selected' : '' }}>Nome (Z-A)</option>
                                <option value="preco_asc" {{ request('ordenar') == 'preco_asc' ? 'selected' : '' }}>Preço (menor-maior)</option>
                                <option value="preco_desc" {{ request('ordenar') == 'preco_desc' ? 'selected' : '' }}>Preço (maior-menor)</option>
                                <option value="quantidade_asc" {{ request('ordenar') == 'quantidade_asc' ? 'selected' : '' }}>Quantidade (menor-maior)</option>
                                <option value="quantidade_desc" {{ request('ordenar') == 'quantidade_desc' ? 'selected' : '' }}>Quantidade (maior-menor)</option>
                            </select>
                        </div>
                        
                        <div class="flex gap-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200">
                                Filtrar
                            </button>
                            @if(request('search') || request('loja') || request('preco_min') || request('preco_max') || request('apenas_em_stock') || request('ordenar'))
                                <a href="{{ route('produtos.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors duration-200">
                                    Limpar
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            @if($produtos)
            
                <!-- Tabela de Produtos -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Produto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Loja</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Preço</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Quantidade</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Valor Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($produtos as $produto)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produto->nome }}</div>
                                                    @if($produto->descricao)
                                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($produto->descricao, 50) }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-100">{{ $produto->loja->nome }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-green-600 dark:text-green-400">
                                                Kz {{ number_format($produto->preco, 2, ',', '.') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-100">{{ $produto->quantidade }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-blue-600 dark:text-blue-400">
                                                Kz {{ number_format($produto->preco * $produto->quantidade, 2, ',', '.') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($produto->quantidade > 0)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    Em estoque
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                    Esgotado
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end gap-2">
                                                <a href="{{ route('produtos.show', $produto) }}" 
                                                   class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('produtos.edit', $produto) }}" 
                                                   class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Paginação -->
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $produtos->appends(request()->query())->links() }}
                    </div>
                </div>

                <!-- Resumo -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total de Produtos</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{ $totalProdutos }}</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Valor Total do Stock</p>
                        <p class="text-2xl font-bold text-green-600 dark:text-green-400">Kz {{ number_format($valorTotalStock, 2, ',', '.') }}</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Produtos com Baixo Estoque</p>
                        <p class="text-2xl font-bold text-orange-600 dark:text-orange-400">{{ $produtosBaixoEstoque }}</p>
                    </div>
                </div>

            @else
                <!-- Estado vazio -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-100 dark:bg-blue-900/30 rounded-full p-4 mb-4">
                            <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Nenhum produto cadastrado</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Comece adicionando seu primeiro produto!</p>
                        <a href="{{ route('produtos.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-all duration-200 shadow-md hover:shadow-lg">
                            + Adicionar Produto
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>