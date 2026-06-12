<x-guest-layout>
            
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-white tracking-wide drop-shadow-lg">
            LojaFacil
        </h1>
        <p class="text-blue-100 mt-2 text-sm">Acesse sua conta</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" class="text-white/90 font-medium" />
            <x-text-input id="email" 
                class="block mt-1 w-full bg-white/20 border-white/30 text-white placeholder:text-white/50 focus:border-blue-300 focus:ring focus:ring-blue-200/50 rounded-lg" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username"
                placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" class="text-white/90 font-medium" />

            <x-text-input id="password" 
                class="block mt-1 w-full bg-white/20 border-white/30 text-white placeholder:text-white/50 focus:border-blue-300 focus:ring focus:ring-blue-200/50 rounded-lg"
                type="password"
                name="password"
                required 
                autocomplete="current-password"
                placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" 
                    class="rounded border-white/30 bg-white/20 text-blue-500 shadow-sm focus:ring-blue-400 focus:ring-offset-0 focus:ring-offset-transparent">
                <span class="ms-2 text-sm text-white/80">{{ __('Lembrar-me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-white/70 hover:text-white transition-colors duration-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300" 
                   href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif

            <button type="submit" 
                class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-blue-400 to-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:from-blue-500 hover:to-blue-700 active:from-blue-600 active:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2 focus:ring-offset-transparent transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                {{ __('Entrar') }}
            </button>
        </div>
    </form>

    <!-- Link para Registro -->
    <div class="mt-6 text-center">
        <p class="text-white/60 text-sm">
            Não tem uma conta?
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-white font-medium hover:text-blue-200 transition-colors duration-200">
                    Registrar-se
                </a>
            @endif
        </p>
    </div>

<!-- Footer -->
<div class="mt-8 text-center">
    <p class="text-white/40 text-xs">
        &copy; {{ date('Y') }} LojaFacil. Todos os direitos reservados.
    </p>
</div>

</x-guest-layout>