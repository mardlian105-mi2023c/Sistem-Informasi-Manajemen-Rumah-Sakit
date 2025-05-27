<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('RS SEHAT MEDIKA', 'RS SEHAT MEDIKA-SURABAYA') }}</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .chat-icon {
            transition: all 0.3s ease;
        }
        .chat-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">
    <!-- Navigation -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <main class="">
        <div class="">
            @yield('content')
        </div>
    </main>
    <x-footer></x-footer>

    <div class="fixed bottom-6 right-6 z-50">
        <a href="{{ route('chat.index') }}" class="chat-icon bg-blue-600 text-white w-14 h-14 rounded-full shadow-lg hover:shadow-xl flex items-center justify-center">
            <i class="fas fa-comment-dots text-2xl"></i>
        </a>
    </div>
</body>
</html>