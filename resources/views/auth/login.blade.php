<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Hero -->
    <div class="relative overflow-hidden">
      <div class="mx-auto max-w-screen-md py-12 px-4 sm:px-6 md:max-w-screen-xl md:py-20 lg:py-32 md:px-8">
        <div class="md:pe-8 md:w-1/2 xl:pe-0 xl:w-5/12">
          <!-- Title -->
          <h1
            class="text-3xl text-gray-800 font-bold md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight dark:text-gray-200">
            Smart Printing System <span class="text-blue-600 dark:text-blue-500 lg:text-4xl">Solutions</span>
          </h1>
          <p class="mt-3 text-base text-gray-500">
            Built to help users ease their printing journey without the need for any manual process.
          </p>
          <!-- End Title -->

          <!-- Form -->
          <form>
            <!-- Email Label -->
            <div class="mt-2">
              <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium dark:text-white"><span
                  class="sr-only">Email
                  address</span></x-input-label>
              <x-text-input id="email"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="Email address" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password Label -->
            <div class="mt-2">
              <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium dark:text-white"><span
                  class="sr-only">Password</span></x-input-label>
              <x-text-input id="password"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="Password" type="password" name="password" required autocomplete="new-password"
                style="width: 100%;" />
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
              <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                  class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
              </label>
            </div>

            <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
                </a>
              @endif

              <x-primary-button class="ms-3">
                {{ __('Log in') }}
              </x-primary-button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
      <div
        class="hidden md:block md:absolute md:top-0 md:start-1/2 md:end-0 h-full bg-[url('https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1981&q=80')] bg-no-repeat bg-center bg-cover">
      </div>
    </div>






  </form>
</x-guest-layout>
