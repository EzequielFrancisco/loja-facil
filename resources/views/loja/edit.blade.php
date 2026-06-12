<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar Loja') }}: {{ $loja->nome }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('lojas.show', $loja) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    Ver Loja
                </a>
                <a href="{{ route('lojas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                    ← Voltar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl">
                <form method="POST" action="{{ route('lojas.update', $loja) }}" class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nome da Loja -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="nome" :value="__('Nome da Loja *')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome', $loja->nome)" required autofocus placeholder="Digite o nome da loja" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('E-mail *')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $loja->email)" required placeholder="contato@loja.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- NIF -->
                        <div>
                            <x-input-label for="nif" :value="__('NIF *')" />
                            <x-text-input id="nif" class="block mt-1 w-full" type="text" name="nif" :value="old('nif', $loja->nif)" required placeholder="00.000.000/0000-00" />
                            <x-input-error :messages="$errors->get('nif')" class="mt-2" />
                        </div>

                        <!-- Telefone -->
                        <div>
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone', $loja->telefone)" placeholder="(00) 00000-0000" />
                            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                        </div>

                        <!-- Website -->
                        <div>
                            <x-input-label for="website" :value="__('Website')" />
                            <x-text-input id="website" class="block mt-1 w-full" type="url" name="website" :value="old('website', $loja->website)" placeholder="https://www.loja.com" />
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="ativo" :value="__('Status')" />
                            <select id="ativo" name="ativo" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="1" {{ old('ativo', $loja->ativo) == '1' ? 'selected' : '' }}>Ativa</option>
                                <option value="0" {{ old('ativo', $loja->ativo) == '0' ? 'selected' : '' }}>Inativa</option>
                            </select>
                            <x-input-error :messages="$errors->get('ativo')" class="mt-2" />
                        </div>

                        <!-- Endereço -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="endereco" :value="__('Endereço')" />
                            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco', $loja->endereco)" placeholder="Rua, número, bairro" />
                            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
                        </div>

                        <!-- Cidade -->
                        <div>
                            <x-input-label for="cidade" :value="__('Cidade')" />
                            <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade', $loja->cidade)" placeholder="Sua cidade" />
                            <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
                        </div>

                        <!-- Estado/Província -->
                        <div>
                            <x-input-label for="estado" :value="__('Província')" />
                            <select id="estado" name="estado" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Selecione a província</option>
                                <option value="Bengo" {{ old('estado', $loja->estado) == 'Bengo' ? 'selected' : '' }}>Bengo</option>
                                <option value="Benguela" {{ old('estado', $loja->estado) == 'Benguela' ? 'selected' : '' }}>Benguela</option>
                                <option value="Bié" {{ old('estado', $loja->estado) == 'Bié' ? 'selected' : '' }}>Bié</option>
                                <option value="Cabinda" {{ old('estado', $loja->estado) == 'Cabinda' ? 'selected' : '' }}>Cabinda</option>
                                <option value="Cuando Cubango" {{ old('estado', $loja->estado) == 'Cuando Cubango' ? 'selected' : '' }}>Cuando Cubango</option>
                                <option value="Cuanza Norte" {{ old('estado', $loja->estado) == 'Cuanza Norte' ? 'selected' : '' }}>Cuanza Norte</option>
                                <option value="Cuanza Sul" {{ old('estado', $loja->estado) == 'Cuanza Sul' ? 'selected' : '' }}>Cuanza Sul</option>
                                <option value="Cunene" {{ old('estado', $loja->estado) == 'Cunene' ? 'selected' : '' }}>Cunene</option>
                                <option value="Huambo" {{ old('estado', $loja->estado) == 'Huambo' ? 'selected' : '' }}>Huambo</option>
                                <option value="Huíla" {{ old('estado', $loja->estado) == 'Huíla' ? 'selected' : '' }}>Huíla</option>
                                <option value="Luanda" {{ old('estado', $loja->estado) == 'Luanda' ? 'selected' : '' }}>Luanda</option>
                                <option value="Lunda Norte" {{ old('estado', $loja->estado) == 'Lunda Norte' ? 'selected' : '' }}>Lunda Norte</option>
                                <option value="Lunda Sul" {{ old('estado', $loja->estado) == 'Lunda Sul' ? 'selected' : '' }}>Lunda Sul</option>
                                <option value="Malanje" {{ old('estado', $loja->estado) == 'Malanje' ? 'selected' : '' }}>Malanje</option>
                                <option value="Moxico" {{ old('estado', $loja->estado) == 'Moxico' ? 'selected' : '' }}>Moxico</option>
                                <option value="Namibe" {{ old('estado', $loja->estado) == 'Namibe' ? 'selected' : '' }}>Namibe</option>
                                <option value="Uíge" {{ old('estado', $loja->estado) == 'Uíge' ? 'selected' : '' }}>Uíge</option>
                                <option value="Zaire" {{ old('estado', $loja->estado) == 'Zaire' ? 'selected' : '' }}>Zaire</option>
                            </select>
                            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                        </div>

                        <!-- País -->
                        <div>
                            <x-input-label for="pais" :value="__('País')" />
                            <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais" :value="old('pais', $loja->pais)" placeholder="País" />
                            <x-input-error :messages="$errors->get('pais')" class="mt-2" />
                        </div>

                        <!-- Descrição -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <textarea id="descricao" name="descricao" rows="4" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Descreva sua loja...">{{ old('descricao', $loja->descricao) }}</textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                        <!-- Informações adicionais -->
                        <div class="col-span-1 md:col-span-2 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Informações do Sistema</h4>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Criado em:</span>
                                    <span class="text-gray-700 dark:text-gray-300 ml-2">{{ $loja->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Última atualização:</span>
                                    <span class="text-gray-700 dark:text-gray-300 ml-2">{{ $loja->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Total de Produtos:</span>
                                    <span class="text-gray-700 dark:text-gray-300 ml-2">{{ $loja->produtos()->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="flex items-center justify-end gap-3 mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('lojas.index') }}" class="px-5 py-2.5 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 font-medium">
                            Cancelar
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-medium shadow-md hover:shadow-lg">
                            Atualizar Loja
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>