<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login.create') }}" novalidate>
        @csrf

        <!-- User -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full"
                            name="username"
                            :value="old('username')"
                            placeholder="{{__('User')}}"
                            autofocus autocomplete="username" />

            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="{{__('Password')}}" 
                            autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="w-full sm:w-auto justify-center bg-orange-200 text-orange-500">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
