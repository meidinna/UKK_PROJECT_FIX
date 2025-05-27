<x-guest-layout>
    <div class="relative w-full h-screen">

        <img src="{{ asset('images/sliders/slider3.jpg') }}" alt="foto" class="absolute inset-0 w-full h-full object-cover" />

        <div class="relative z-10 min-h-screen bg-gradient-to-br from-[#2E7D65] via-[#4C9A7E] to-[#1F5A4A] bg-opacity-70 flex items-center justify-center px-4 left-0">

            <div class="w-full md:w-[50vw] h-[calc(100vh-2rem)] bg-white/20 backdrop-blur-lg shadow-xl border border-white/30 rounded-3xl px-7 md:px-32 py-6 flex flex-col justify-between">

                <div class="text-center mb-2">
                    <a href="{{ url('/') }}">
                        <div class="text-3xl font-bold text-white drop-shadow-md">
                            <!-- Judul dihapus sesuai permintaan -->
                        </div>
                    </a>
                </div>

                <div>
                    <div class="text-center mb-8 text-4xl text-white font-extrabold drop-shadow-lg">Create an Account!</div>

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <x-label for="name" value="{{ __('Name') }}" class="text-white" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" class="text-white" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" class="text-white" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-white" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4 text-white">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ms-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-green-100 hover:text-white">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-green-100 hover:text-white">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="w-full justify-center text-center inline-flex items-center px-4 py-2 bg-[#2E7D65] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#246955] focus:bg-[#1F5A4A] active:bg-[#1F5A4A] focus:outline-none focus:ring-2 focus:ring-green-200 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>

                <div class="text-sm text-center text-green-100 mt-6">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-white font-bold hover:underline">Login</a>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
