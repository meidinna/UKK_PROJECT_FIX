<x-guest-layout>
    <div class="relative w-full h-screen">

        <!-- Background Image -->
        <img src="{{ asset('images/sliders/slider3.jpg') }}" alt="foto" class="absolute inset-0 w-full h-full object-cover" />

        <!-- Gradient & blur background layer -->
        <div class="relative z-10 min-h-screen bg-gradient-to-br from-[#2E7D65] via-[#4C9A7E] to-[#1F5A4A] bg-opacity-70 flex items-center justify-center px-4 left-0">

            <!-- Glassmorphism container -->
            <div class="w-full md:w-[50vw] h-[calc(100vh-2rem)] bg-white/20 backdrop-blur-lg shadow-xl border border-white/30 rounded-3xl px-7 md:px-32 py-6 flex flex-col justify-between">

                <!-- Optional logo/title -->
                <div class="text-center mb-2">
                    <a href="{{ url('/') }}">
                        <div class="text-3xl font-bold text-white drop-shadow-md">
                            <!-- Judul dihapus sesuai permintaan -->
                        </div>
                    </a>
                </div>

                <!-- Form login -->
                <div>
                    <div class="text-center mb-8 text-4xl text-white font-extrabold drop-shadow-lg">Welcome Back!</div>

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" class="text-white" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="text-white" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-green-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                                <span class="ml-2 text-white text-sm">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-green-100 hover:text-white underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="mt-6">
                            <x-button class="w-full justify-center bg-[#2E7D65] hover:bg-[#246955] focus:bg-[#1F5A4A] active:bg-[#1F5A4A] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest px-4 py-2 transition ease-in-out duration-150">
                                {{ __('Login') }}
                            </x-button>
                        </div>
                    </form>
                </div>

                <div class="text-sm text-center text-green-100 mt-6">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-white font-bold hover:underline">Register</a>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
