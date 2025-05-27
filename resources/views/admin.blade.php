@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <!-- Dokter -->
            <a href="{{ route('dokter.index') }}" class="bg-white p-4 rounded-lg shadow hover:bg-blue-50 transition">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div>
                        <h2 class="font-medium text-gray-800">Dokter</h2>
                        <p class="text-sm text-gray-500">{{ $dokterCount ?? 0 }} total</p>
                    </div>
                </div>
            </a>

            <!-- Pasien -->
            <a href="{{ route('pasien.index') }}" class="bg-white p-4 rounded-lg shadow hover:bg-green-50 transition">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-green-100 text-green-600 rounded-lg">
                        <i class="fas fa-user-injured"></i>
                    </div>
                    <div>
                        <h2 class="font-medium text-gray-800">Pasien</h2>
                        <p class="text-sm text-gray-500">{{ $pasienCount ?? 0 }} terdaftar</p>
                    </div>
                </div>
            </a>

            <!-- Jadwal Dokter -->
            <a href="{{ route('jadwal.index') }}" class="bg-white p-4 rounded-lg shadow hover:bg-yellow-50 transition">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-yellow-100 text-yellow-600 rounded-lg">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <h2 class="font-medium text-gray-800">Jadwal Dokter</h2>
                        <p class="text-sm text-gray-500">{{ $jadwalCount ?? 0 }} jadwal</p>
                    </div>
                </div>
            </a>

            <!-- Rawat Inap -->
            <a href="{{ route('rawatinap.index') }}" class="bg-white p-4 rounded-lg shadow hover:bg-purple-50 transition">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-purple-100 text-purple-600 rounded-lg">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <div>
                        <h2 class="font-medium text-gray-800">Rawat Inap</h2>
                        <p class="text-sm text-gray-500">{{ $rawatInapCount ?? 0 }} pasien</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="flex h-screen bg-gray-100">
            <!-- Sidebar Kontak -->
            <div class="w-1/3 bg-white p-6 border-r shadow-md overflow-y-auto">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">📇 Pesan Masuk</h2>
        
                @foreach($users as $user)
                    <a href="{{ route('admin', ['user' => $user->id]) }}"
                       class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-100 transition 
                              {{ $selectedUser == $user->id ? 'bg-blue-200 font-semibold text-blue-800' : 'text-gray-700' }}">
                        <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>{{ $user->name }}</div>
                    </a>
                @endforeach
            </div>
        
            <!-- Chat Section -->
            <div class="w-2/3 p-6 flex flex-col bg-gray-50">
                @if($selectedUser)
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Isi Pesan</h2>
        
                    <!-- Message History -->
                    <div class="flex-1 overflow-y-auto space-y-3 p-4 border rounded bg-white shadow mb-4">
                        @foreach($messages as $message)
                            <div class="{{ $message->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                                <div class="inline-block px-4 py-2 rounded-lg 
                                    {{ $message->sender_id == auth()->id() 
                                        ? 'bg-blue-500 text-white' 
                                        : 'bg-gray-200 text-gray-800' }}">
                                    <p>{{ $message->message }}</p>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $message->created_at->format('H:i') }}
                                </p>
                            </div>
                        @endforeach
                    </div>
        
                    <!-- Send Message Form -->
                    <form action="{{ route('admin') }}" method="POST" class="flex flex-col gap-3">
                        @csrf
                        <input type="hidden" name="receiver_id" value="{{ $selectedUser }}">
        
                        <textarea name="message" class="w-full border border-gray-300 p-3 rounded resize-none" 
                                  rows="3" placeholder="✏️ Tulis pesan..."></textarea>
        
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded shadow w-fit self-end">
                            Kirim
                        </button>
                    </form>
                @else
                    <div class="text-center text-gray-600 flex-1 flex items-center justify-center">
                        <p class="text-lg">👈 Pilih kontak di sebelah kiri untuk mulai chat.</p>
                    </div>
                @endif
            </div>
        </div>        
    </div>
</div>
@endsection