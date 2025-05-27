@extends('layouts.app')

@section('content')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

    <div class="hero-gradient text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    Pelayanan Kesehatan Terbaik untuk Anda
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-xl text-blue-100">
                    Memberikan perawatan kesehatan berkualitas dengan tim dokter profesional dan fasilitas modern.
                </p>
                <div class="mt-10 flex justify-center space-x-4">
                    <a href="{{ route('chat.index') }}" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 md:py-4 md:text-lg md:px-10 transition duration-300">
                        Jadwalkan Konsultasi
                    </a>
                    <a href="{{ route('about') }}" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-800 bg-opacity-60 hover:bg-opacity-80 md:py-4 md:text-lg md:px-10 transition duration-300">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Mengapa Memilih Kami?
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Berbagai keunggulan yang membuat kami berbeda dari yang lain.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8 h-full card-hover transition duration-300">
                            <div class="-mt-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                    <i class="fas fa-user-md text-xl"></i>
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 text-center">Dokter Profesional</h3>
                                <p class="mt-2 text-base text-gray-500 text-center">
                                    Tim dokter spesialis berpengalaman dan kompeten di bidangnya masing-masing.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8 h-full card-hover transition duration-300">
                            <div class="-mt-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                    <i class="fas fa-procedures text-xl"></i>
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 text-center">Fasilitas Modern</h3>
                                <p class="mt-2 text-base text-gray-500 text-center">
                                    Peralatan medis terkini untuk diagnosis dan perawatan yang akurat.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8 h-full card-hover transition duration-300">
                            <div class="-mt-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white mx-auto">
                                    <i class="fas fa-heart text-xl"></i>
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 text-center">Pelayanan Ramah</h3>
                                <p class="mt-2 text-base text-gray-500 text-center">
                                    Staf kami siap melayani dengan ramah dan penuh perhatian.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Testimonial Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-3">Apa Kata Mereka?</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Dengarkan pengalaman langsung dari pelanggan kami</p>
        </div>
    
        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($testimonis as $testimoni)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-400 to-indigo-500 flex items-center justify-center text-white font-bold text-xl mr-4">
                            {{ substr($testimoni->user->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">{{ $testimoni->user->name }}</h4>
                            <p class="text-xs text-gray-500">{{ $testimoni->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="relative">
                        <svg class="absolute -top-4 -left-4 w-8 h-8 text-gray-200" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"/>
                        </svg>
                        <p class="text-gray-700 italic pl-8 mb-6">"{{ $testimoni->content }}"</p>
                        <svg class="absolute -bottom-4 -right-4 w-8 h-8 text-gray-200" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M22.648 28c4.896-3.456 8.352-9.12 8.352-15.36 0-5.088-3.072-8.064-6.624-8.064-3.36 0-5.856 2.688-5.856 5.856 0 3.168 2.208 5.472 5.088 5.472.576 0 1.344-.096 1.536-.192-.48 3.264-3.552 7.104-6.624 9.024L22.648 28zm-16.512 0c4.8-3.456 8.256-9.12 8.256-15.36 0-5.088-3.072-8.064-6.624-8.064-3.264 0-5.856 2.688-5.856 5.856 0 3.168 2.304 5.472 5.184 5.472.576 0 1.248-.096 1.44-.192-.48-3.264-3.456-7.104-6.528-9.024L6.136 28z"/>
                        </svg>
                    </div>
                    <div class="flex mt-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
            @empty
            <div class="md:col-span-2 lg:col-span-3 text-center py-12">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-gray-700 mb-2">Belum ada testimoni</h3>
                <p class="text-gray-500">Jadilah yang pertama memberikan testimoni</p>
            </div>
            @endforelse
        </div>
    
        <!-- Testimonial Form -->
        @auth
        <div class="max-w-2xl mx-auto mt-16 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8 shadow-inner">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Bagikan Pengalaman Anda</h3>
                <p class="text-gray-600">Kami sangat menghargai setiap masukan dari Anda</p>
            </div>
            
            @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
            @endif
    
            <form action="{{ route('testimoni.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Testimoni Anda</label>
                    <textarea name="content" id="content" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" placeholder="Ceritakan pengalaman Anda menggunakan layanan kami..."></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-2">Rating:</span>
                        <div class="flex">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden" {{ $i == 5 ? 'checked' : '' }}>
                                <label for="star{{ $i }}" class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors duration-200">★</label>
                            @endfor
                        </div>
                    </div>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-blue-600 text-white font-medium rounded-lg hover:from-indigo-600 hover:to-blue-700 transition-all duration-300 shadow-lg flex items-center">
                        Kirim Testimoni
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        @endauth
    </div>
@endsection