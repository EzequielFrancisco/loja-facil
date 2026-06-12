<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ isset($produto) ? __('Editar Produto') : __('Novo Produto') }}
            </h2>
            <a href="{{ route('produtos.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                ← Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl">
                <form method="POST" action="{{ isset($produto) ? route('produtos.update', $produto) : route('produtos.store') }}" class="p-6">
                    @csrf
                    @if(isset($produto))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nome do Produto -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="nome" :value="__('Nome do Produto *')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome', $produto->nome ?? '')" required autofocus placeholder="Digite o nome do produto" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Loja -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="loja_id" :value="__('Loja *')" />
                            <select id="loja_id" name="loja_id" required class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Selecione uma loja</option>
                                @foreach($lojas as $loja)
                                    <option value="{{ $loja->id }}" {{ old('loja_id', $produto->loja_id ?? '') == $loja->id ? 'selected' : '' }}>
                                        {{ $loja->nome }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('loja_id')" class="mt-2" />
                        </div>

                        <!-- Preço -->
                        <div>
                            <x-input-label for="preco" :value="__('Preço (Kz) *')" />
                            <x-text-input id="preco" class="block mt-1 w-full" type="number" step="0.01" name="preco" :value="old('preco', $produto->preco ?? '')" required placeholder="0.00" />
                            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
                        </div>

                        <!-- Quantidade -->
                        <div>
                            <x-input-label for="quantidade" :value="__('Quantidade *')" />
                            <x-text-input id="quantidade" class="block mt-1 w-full" type="number" name="quantidade" :value="old('quantidade', $produto->quantidade ?? '')" required placeholder="0" />
                            <x-input-error :messages="$errors->get('quantidade')" class="mt-2" />
                        </div>

                        <!-- Categoria -->
                        <div>
                            <x-input-label for="categoria" :value="__('Categoria')" />
                            <select id="categoria" name="categoria" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Selecione uma categoria</option>
                                <option value="Eletrônicos" {{ old('categoria', $produto->categoria ?? '') == 'Eletrônicos' ? 'selected' : '' }}>Eletrônicos</option>
                                <option value="Roupas" {{ old('categoria', $produto->categoria ?? '') == 'Roupas' ? 'selected' : '' }}>Roupas</option>
                                <option value="Alimentos" {{ old('categoria', $produto->categoria ?? '') == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
                                <option value="Móveis" {{ old('categoria', $produto->categoria ?? '') == 'Móveis' ? 'selected' : '' }}>Móveis</option>
                                <option value="Livros" {{ old('categoria', $produto->categoria ?? '') == 'Livros' ? 'selected' : '' }}>Livros</option>
                                <option value="Brinquedos" {{ old('categoria', $produto->categoria ?? '') == 'Brinquedos' ? 'selected' : '' }}>Brinquedos</option>
                                <option value="Esportes" {{ old('categoria', $produto->categoria ?? '') == 'Esportes' ? 'selected' : '' }}>Esportes</option>
                                <option value="Outros" {{ old('categoria', $produto->categoria ?? '') == 'Outros' ? 'selected' : '' }}>Outros</option>
                            </select>
                            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
                        </div>

                        <!-- SKU -->
                        <div>
                            <x-input-label for="sku" :value="__('SKU (Código)')" />
                            <x-text-input id="sku" class="block mt-1 w-full" type="text" name="sku" :value="old('sku', $produto->sku ?? '')" placeholder="Código único do produto" />
                            <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                        </div>

                        <!-- Descrição -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <textarea id="descricao" name="descricao" rows="4" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Descreva o produto...">{{ old('descricao', $produto->descricao ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>
                    </div>
                    <!-- Dentro do form, depois do campo descricao ou antes dos botões -->
                    <div class="col-span-1 md:col-span-2">
                        <x-input-label for="foto" :value="__('Foto do Produto')" />
                        <input type="file" id="foto" name="foto" accept="image/*"
                               class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Formatos: JPG, PNG, WEBP. Máximo 2MB.</p>
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <!-- Botões -->
                    <div class="flex items-center justify-end gap-3 mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('produtos.index') }}" class="px-5 py-2.5 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 font-medium">
                            Cancelar
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-medium shadow-md hover:shadow-lg">
                            {{ isset($produto) ? 'Atualizar Produto' : 'Cadastrar Produto' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>