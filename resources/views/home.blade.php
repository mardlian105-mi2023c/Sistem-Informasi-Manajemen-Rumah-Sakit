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
                    <a href="#" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 md:py-4 md:text-lg md:px-10 transition duration-300">
                        Jadwalkan Konsultasi
                    </a>
                    <a href="#" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-800 bg-opacity-60 hover:bg-opacity-80 md:py-4 md:text-lg md:px-10 transition duration-300">
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
@endsection