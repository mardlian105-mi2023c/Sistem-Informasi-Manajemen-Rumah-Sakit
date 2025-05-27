@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="flex flex-col md:flex-row h-[80vh]">
            <!-- Contacts Sidebar -->
            <div class="w-full md:w-1/3 border-r bg-gray-50">
                <div class="p-4 border-b bg-gradient-to-r from-blue-500 to-indigo-600">
                    <h2 class="text-xl font-bold text-white">Kontak</h2>
                </div>
                <div class="overflow-y-auto h-full">
                    @foreach($users as $user)
                        <a href="{{ route('chat.index', ['user' => $user->id]) }}" 
                           class="flex items-center p-3 border-b hover:bg-gray-100 transition-colors duration-200 {{ $selectedUser == $user->id ? 'bg-blue-50' : '' }}">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold mr-3">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $user->name }}</p>
                                <p class="text-xs text-gray-500">Terakhir online: {{ now()->format('H:i') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Chat Area -->
            <div class="flex-1 flex flex-col">
                @if($selectedUser)
                    @php $currentUser = $users->firstWhere('id', $selectedUser) @endphp
                    <div class="p-4 border-b bg-gradient-to-r from-blue-50 to-indigo-50 flex items-center">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold mr-3">
                            {{ substr($currentUser->name, 0, 1) }}
                        </div>
                        <div>
                            <h2 class="font-bold text-gray-800">{{ $currentUser->name }}</h2>
                            <p class="text-xs text-gray-500">Online</p>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="flex-1 p-4 overflow-y-auto bg-[url('https://web.whatsapp.com/img/bg-chat-tile-light_a4be512e7195b6b733d9110b408f075d.png')] bg-opacity-10">
                        <div class="space-y-3">
                            @foreach($messages as $msg)
                                @if($msg->sender_id == auth()->id())
                                    <!-- Sent Message (Right) -->
                                    <div class="flex justify-end">
                                        <div class="max-w-xs md:max-w-md lg:max-w-lg bg-indigo-500 text-white rounded-xl rounded-tr-none px-4 py-2 shadow">
                                            <p class="text-sm">{{ $msg->message }}</p>
                                            <p class="text-xs text-indigo-200 text-right mt-1">{{ $msg->created_at->format('H:i') }}</p>
                                        </div>
                                    </div>
                                @else
                                    <!-- Received Message (Left) -->
                                    <div class="flex items-start">
                                        <div class="max-w-xs md:max-w-md lg:max-w-lg bg-white border rounded-xl rounded-tl-none px-4 py-2 shadow">
                                            <p class="text-xs font-medium text-gray-500">{{ $msg->sender->name }}</p>
                                            <p class="text-sm text-gray-800 mt-1">{{ $msg->message }}</p>
                                            <p class="text-xs text-gray-500 text-right mt-1">{{ $msg->created_at->format('H:i') }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Message Input -->
                    <div class="p-4 border-t bg-white">
                        <form action="{{ route('chat.store') }}" method="POST" class="flex gap-2">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $selectedUser }}">
                            <input type="text" name="message" 
                                   class="flex-1 border border-gray-300 rounded-full py-3 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" 
                                   placeholder="Tulis pesan...">
                            <button class="w-12 h-12 rounded-full bg-indigo-600 text-white hover:bg-indigo-700 transition-colors duration-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex-1 flex flex-col items-center justify-center bg-gray-50">
                        <div class="w-24 h-24 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">Pilih Kontak</h3>
                        <p class="text-gray-500 text-center max-w-md px-4">Pilih kontak dari daftar untuk memulai percakapan</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection