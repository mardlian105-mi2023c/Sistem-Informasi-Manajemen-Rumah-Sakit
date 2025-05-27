<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100">
        <div class="w-full max-w-md px-6 py-12 bg-white rounded-2xl shadow-xl">
            <!-- Header with Logo -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <i class="fas fa-heartbeat text-4xl text-blue-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">RS Sehat Medika</h1>
                <p class="mt-2 text-gray-600">Silakan masuk ke akun Anda</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 p-4 bg-blue-50 text-blue-700 rounded-lg" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Input -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700 mb-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <x-text-input id="email" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                      type="email" 
                                      name="email" 
                                      :value="old('email')" 
                                      required 
                                      autofocus 
                                      placeholder="email@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password Input -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700 mb-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <x-text-input id="password" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Log in') }}
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-500">
                <p>© {{ date('Y') }} RS Sehat Medika. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    
    <style>
        /* Smooth transitions */
        input, button {
            transition: all 0.3s ease;
        }
        
        /* Focus styles */
        input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        
        /* Hover effect for button */
        button:hover {
            transform: translateY(-1px);
        }
    </style>
</x-guest-layout>