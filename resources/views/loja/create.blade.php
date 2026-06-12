<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nova Loja') }}
            </h2>
            <a href="{{ route('lojas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                ← Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl">
                <form method="POST" action="{{ route('lojas.store') }}" class="p-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nome da Loja -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="nome" :value="__('Nome da Loja *')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus placeholder="Digite o nome da loja" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('E-mail *')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="contato@loja.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- NIF -->
                        <div>
                            <x-input-label for="nif" :value="__('NIF *')" />
                            <x-text-input id="nif" class="block mt-1 w-full" type="text" name="nif" :value="old('nif')" required placeholder="00.000.000/0000-00" />
                            <x-input-error :messages="$errors->get('nif')" class="mt-2" />
                        </div>

                        <!-- Telefone -->
                        <div>
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" placeholder="(+244) 000-000-000" />
                            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                        </div>

                        <!-- Website -->
                        <div>
                            <x-input-label for="website" :value="__('Website')" />
                            <x-text-input id="website" class="block mt-1 w-full" type="url" name="website" :value="old('website')" placeholder="https://www.loja.com" />
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>

                        <!-- Endereço -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="endereco" :value="__('Endereço')" />
                            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" placeholder="Rua, número, bairro" />
                            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
                        </div>

                        <!-- Cidade -->
                        <div>
                            <x-input-label for="cidade" :value="__('Cidade')" />
                            <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')" placeholder="Sua cidade" />
                            <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
                        </div>

                        <!-- Estado -->
                        <div>
                            <x-input-label for="estado" :value="__('Estado')" />
                            <select id="estado" name="estado" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Selecione o Municipio</option>
                                <option value="luanda" {{ old('estado') == 'luanda' ? 'selected' : '' }}>Luanda</option>
                                <option value="belas" {{ old('estado') == 'belas' ? 'selected' : '' }}>Belas</option>
                            </select>
                            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                        </div>

                        <!-- País -->
                        <div>
                            <x-input-label for="pais" :value="__('País')" />
                            <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais" :value="old('pais', 'Angola')" placeholder="País" />
                            <x-input-error :messages="$errors->get('pais')" class="mt-2" />
                        </div>

                        <!-- Descrição -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <textarea id="descricao" name="descricao" rows="4" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Descreva sua loja...">{{ old('descricao') }}</textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="flex items-center justify-end gap-3 mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('lojas.index') }}" class="px-5 py-2.5 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 font-medium">
                            Cancelar
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-medium shadow-md hover:shadow-lg">
                            Criar Loja
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
