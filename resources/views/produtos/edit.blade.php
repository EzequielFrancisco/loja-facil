<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar Produto') }}: {{ $produto->nome }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('produtos.show', $produto) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    Ver Produto
                </a>
                <a href="{{ route('produtos.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    ← Voltar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl">
                <form method="POST" action="{{ route('produtos.update', $produto) }}" class="p-6"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nome do Produto -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="nome" :value="__('Nome do Produto *')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome', $produto->nome)" required autofocus placeholder="Digite o nome do produto" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Loja -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="loja_id" :value="__('Loja *')" />
                            <select id="loja_id" name="loja_id" required class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Selecione uma loja</option>
                                @foreach($lojas as $loja)
                                    <option value="{{ $loja->id }}" {{ old('loja_id', $produto->loja_id) == $loja->id ? 'selected' : '' }}>
                                        {{ $loja->nome }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('loja_id')" class="mt-2" />
                            @if($lojas->isEmpty())
                                <p class="text-sm text-red-600 dark:text-red-400 mt-2">
                                    Você não tem nenhuma loja cadastrada. 
                                    <a href="{{ route('lojas.create') }}" class="text-blue-500 hover:text-blue-600">Criar loja agora</a>
                                </p>
                            @endif
                        </div>

                        <!-- Preço e Quantidade -->
                        <div>
                            <x-input-label for="preco" :value="__('Preço (Kz) *')" />
                            <x-text-input id="preco" class="block mt-1 w-full" type="number" step="0.01" name="preco" :value="old('preco', $produto->preco)" required placeholder="0.00" />
                            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="quantidade" :value="__('Quantidade *')" />
                            <x-text-input id="quantidade" class="block mt-1 w-full" type="number" name="quantidade" :value="old('quantidade', $produto->quantidade)" required placeholder="0" />
                            <x-input-error :messages="$errors->get('quantidade')" class="mt-2" />
                        </div>

                        <!-- Categoria -->
                        <div>
                            <x-input-label for="categoria" :value="__('Categoria')" />
                            <select id="categoria" name="categoria" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Selecione uma categoria</option>
                                <option value="Eletrônicos" {{ old('categoria', $produto->categoria) == 'Eletrônicos' ? 'selected' : '' }}>Eletrônicos</option>
                                <option value="Roupas" {{ old('categoria', $produto->categoria) == 'Roupas' ? 'selected' : '' }}>Roupas</option>
                                <option value="Alimentos" {{ old('categoria', $produto->categoria) == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
                                <option value="Móveis" {{ old('categoria', $produto->categoria) == 'Móveis' ? 'selected' : '' }}>Móveis</option>
                                <option value="Livros" {{ old('categoria', $produto->categoria) == 'Livros' ? 'selected' : '' }}>Livros</option>
                                <option value="Brinquedos" {{ old('categoria', $produto->categoria) == 'Brinquedos' ? 'selected' : '' }}>Brinquedos</option>
                                <option value="Esportes" {{ old('categoria', $produto->categoria) == 'Esportes' ? 'selected' : '' }}>Esportes</option>
                                <option value="Beleza" {{ old('categoria', $produto->categoria) == 'Beleza' ? 'selected' : '' }}>Beleza</option>
                                <option value="Saúde" {{ old('categoria', $produto->categoria) == 'Saúde' ? 'selected' : '' }}>Saúde</option>
                                <option value="Automotivo" {{ old('categoria', $produto->categoria) == 'Automotivo' ? 'selected' : '' }}>Automotivo</option>
                                <option value="Ferramentas" {{ old('categoria', $produto->categoria) == 'Ferramentas' ? 'selected' : '' }}>Ferramentas</option>
                                <option value="Outros" {{ old('categoria', $produto->categoria) == 'Outros' ? 'selected' : '' }}>Outros</option>
                            </select>
                            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
                        </div>

                        <!-- SKU -->
                        <div>
                            <x-input-label for="sku" :value="__('SKU (Código)')" />
                            <x-text-input id="sku" class="block mt-1 w-full" type="text" name="sku" :value="old('sku', $produto->sku)" placeholder="Código único do produto" />
                            <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Código único para identificar o produto</p>
                        </div>

                        <!-- Status do Estoque -->
                        <div>
                            <x-input-label for="status" :value="__('Status do Estoque')" />
                            <div class="mt-2 p-3 rounded-lg {{ $produto->quantidade > 0 ? 'bg-green-100 dark:bg-green-900/30' : 'bg-red-100 dark:bg-red-900/30' }}">
                                @if($produto->quantidade > 0)
                                    <span class="text-green-700 dark:text-green-400">✓ Produto em estoque ({{ $produto->quantidade }} unidades)</span>
                                @else
                                    <span class="text-red-700 dark:text-red-400">⚠ Produto esgotado</span>
                                @endif
                            </div>
                        </div>

                        <!-- Valor Total -->
                        <div>
                            <x-input-label for="valor_total" :value="__('Valor Total em Stock')" />
                            <div class="mt-2 p-3 rounded-lg bg-blue-100 dark:bg-blue-900/30">
                                <span class="text-blue-700 dark:text-blue-400 font-bold">
                                    Kz {{ number_format($produto->preco * $produto->quantidade, 2, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Descrição -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <textarea id="descricao" name="descricao" rows="5" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Descreva o produto...">{{ old('descricao', $produto->descricao) }}</textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>
                        <!-- foto -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="foto" :value="__('Foto do Produto')" />
                            
                            @if($produto->foto)
                                <div class="mt-2 mb-2">
                                    <img src="{{ Storage::url($produto->foto) }}" alt="{{ $produto->nome }}" 
                                         class="w-32 h-32 object-cover rounded-lg border border-gray-300 dark:border-gray-600">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Foto atual</p>
                                </div>
                            @endif
                            
                            <input type="file" id="foto" name="foto" accept="image/*"
                                   class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Deixe em branco para manter a foto atual. Formatos: JPG, PNG, WEBP. Máximo 2MB.</p>
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <!-- Informações adicionais -->
                        <div class="col-span-1 md:col-span-2 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Informações do Sistema</h4>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Criado em:</span>
                                    <span class="text-gray-700 dark:text-gray-300 ml-2">{{ $produto->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Última atualização:</span>
                                    <span class="text-gray-700 dark:text-gray-300 ml-2">{{ $produto->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botões de Ação -->
                    <div class="flex items-center justify-end gap-3 mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('produtos.index') }}" class="px-5 py-2.5 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 font-medium">
                            Cancelar
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-medium shadow-md hover:shadow-lg">
                            Atualizar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Preview do valor total em tempo real
        const precoInput = document.getElementById('preco');
        const quantidadeInput = document.getElementById('quantidade');
        const valorTotalDiv = document.querySelector('.bg-blue-100 span');
        
        function updateValorTotal() {
            const preco = parseFloat(precoInput.value) || 0;
            const quantidade = parseInt(quantidadeInput.value) || 0;
            const valorTotal = preco * quantidade;
            
            if (valorTotalDiv) {
                valorTotalDiv.textContent = `Kz ${valorTotal.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            }
        }
        
        if (precoInput && quantidadeInput) {
            precoInput.addEventListener('input', updateValorTotal);
            quantidadeInput.addEventListener('input', updateValorTotal);
        }
        
        // Atualizar status do estoque
        function updateStatusEstoque() {
            const quantidade = parseInt(quantidadeInput?.value) || 0;
            const statusDiv = document.querySelector('[class*="bg-green-100"], [class*="bg-red-100"]');
            
            if (statusDiv) {
                if (quantidade > 0) {
                    statusDiv.className = 'mt-2 p-3 rounded-lg bg-green-100 dark:bg-green-900/30';
                    statusDiv.innerHTML = `<span class="text-green-700 dark:text-green-400">✓ Produto em estoque (${quantidade} unidades)</span>`;
                } else {
                    statusDiv.className = 'mt-2 p-3 rounded-lg bg-red-100 dark:bg-red-900/30';
                    statusDiv.innerHTML = '<span class="text-red-700 dark:text-red-400">⚠ Produto esgotado</span>';
                }
            }
        }
        
        if (quantidadeInput) {
            quantidadeInput.addEventListener('input', updateStatusEstoque);
        }
    </script>
    @endpush
</x-app-layout>