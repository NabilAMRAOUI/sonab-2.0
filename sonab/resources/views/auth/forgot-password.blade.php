<x-guest-layout>
    <div class="mb-4 text-sm text-black text-center py-10">
        {{ __('mot de passe oulié? Pas de soucis. Laissez nous votre addresse email et nous vous renverrons email avec un lien permettant de réinitailiser votre mot de passe.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"  />

    <form method="POST" action="{{ route('password.email') }}" class="flex flex-col justify-center items-center py-10">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
