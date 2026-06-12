<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detalhes do Produto') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('produtos.edit', $produto) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    Editar
                </a>
                <a href="{{ route('produtos.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    Voltar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Imagem/Ícone -->
                        <div class="flex justify-center items-center">
                            <div class="w-48 h-48 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Informações -->
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">{{ $produto->nome }}</h3>
                            
                            <div class="space-y-3">
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Loja:</span>
                                    <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $produto->loja->nome }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Preço:</span>
                                    <span class="font-bold text-2xl text-green-600 dark:text-green-400">Kz {{ number_format($produto->preco, 2, ',', '.') }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Quantidade:</span>
                                    <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $produto->quantidade }} unidades</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Valor Total:</span>
                                    <span class="font-semibold text-blue-600 dark:text-blue-400">Kz {{ number_format($produto->preco * $produto->quantidade, 2, ',', '.') }}</span>
                                </div>
                                @if($produto->categoria)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">Categoria:</span>
                                    <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg text-sm">{{ $produto->categoria }}</span>
                                </div>
                                @endif
                                @if($produto->sku)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-gray-600 dark:text-gray-400">SKU:</span>
                                    <span class="font-mono text-gray-800 dark:text-gray-200">{{ $produto->sku }}</span>
                                </div>
                                @endif
                                <div class="flex items-center justify-between py-2">
                                    <span class="text-gray-600 dark:text-gray-400">Status:</span>
                                    @if($produto->quantidade > 0)
                                        <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-lg text-sm">Em estoque</span>
                                    @else
                                        <span class="px-2 py-1 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-lg text-sm">Esgotado</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Descrição -->
                        @if($produto->descricao)
                        <div class="col-span-2 mt-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Descrição</h4>
                            <p class="text-gray-600 dark:text-gray-400">{{ $produto->descricao }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>