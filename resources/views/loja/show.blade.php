<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detalhes da Loja') }}: {{ $loja->nome }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('lojas.edit', $loja) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    Editar Loja
                </a>
                <a href="{{ route('lojas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    ← Voltar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Cards de Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6">
                    <p class="text-blue-100 text-sm">Total de Produtos</p>
                    <p class="text-white text-3xl font-bold">{{ $totalProdutos }}</p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6">
                    <p class="text-green-100 text-sm">Valor Total do Stock</p>
                    <p class="text-white text-3xl font-bold">Kz {{ number_format($valorTotalStock, 2, ',', '.') }}</p>
                </div>
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg p-6">
                    <p class="text-orange-100 text-sm">Produtos com Baixo Estoque</p>
                    <p class="text-white text-3xl font-bold">{{ $produtosBaixoEstoque }}</p>
                </div>
            </div>

            <!-- Informações da Loja -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Informações Gerais</h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Nome:</span>
                                    <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $loja->nome }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">E-mail:</span>
                                    <span class="text-gray-800 dark:text-gray-200">{{ $loja->email }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">NIF:</span>
                                    <span class="text-gray-800 dark:text-gray-200">{{ $loja->nif }}</span>
                                </div>
                                @if($loja->telefone)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Telefone:</span>
                                    <span class="text-gray-800 dark:text-gray-200">{{ $loja->telefone }}</span>
                                </div>
                                @endif
                                @if($loja->website)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Website:</span>
                                    <a href="{{ $loja->website }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">{{ $loja->website }}</a>
                                </div>
                                @endif
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Status:</span>
                                    @if($loja->ativo)
                                        <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-lg text-sm">Ativa</span>
                                    @else
                                        <span class="px-2 py-1 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-lg text-sm">Inativa</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Endereço</h3>
                            <div class="space-y-3">
                                @if($loja->endereco)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Endereço:</span>
                                    <span class="text-gray-800 dark:text-gray-200">{{ $loja->endereco }}</span>
                                </div>
                                @endif
                                @if($loja->cidade)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Cidade:</span>
                                    <span class="text-gray-800 dark:text-gray-200">{{ $loja->cidade }}</span>
                                </div>
                                @endif
                                @if($loja->estado)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Província:</span>
                                    <span class="text-gray-800 dark:text-gray-200">{{ $loja->estado }}</span>
                                </div>
                                @endif
                                @if($loja->pais)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">País:</span>
                                    <span class="text-gray-800 dark:text-gray-200">{{ $loja->pais }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        @if($loja->descricao)
                        <div class="col-span-2 mt-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Descrição</h4>
                            <p class="text-gray-600 dark:text-gray-400">{{ $loja->descricao }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Últimos Produtos da Loja -->
            <div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Últimos Produtos</h3>
                        <a href="{{ route('produtos.create') }}?loja_id={{ $loja->id }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">+ Adicionar Produto</a>
                    </div>
                    
                    @if($loja->produtos->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Produto</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Preço</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Quantidade</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($loja->produtos->take(5) as $produto)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produto->nome }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-green-600 dark:text-green-400">Kz {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $produto->quantidade }}</td>
                                            <td class="px-6 py-4">
                                                @if($produto->quantidade > 0)
                                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Em estoque</span>
                                                @else
                                                    <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">Esgotado</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($loja->produtos->count() > 5)
                            <div class="mt-4 text-center">
                                <a href="{{ route('produtos.index', ['loja' => $loja->id]) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Ver todos os {{ $loja->produtos->count() }} produtos →</a>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                            Nenhum produto cadastrado nesta loja ainda.
                            <a href="{{ route('produtos.create') }}?loja_id={{ $loja->id }}" class="text-blue-600 dark:text-blue-400 hover:underline block mt-2">Adicionar primeiro produto →</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>