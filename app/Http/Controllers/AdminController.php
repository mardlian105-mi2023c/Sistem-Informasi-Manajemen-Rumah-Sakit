<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\JadwalDokter;
use App\Models\RawatInap;
use App\Models\User;
use App\Models\Message;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request)
    {
        $dokterCount = Dokter::count();
        $pasienCount = Pasien::count();
        $jadwalCount = JadwalDokter::count();
        $rawatInapCount = RawatInap::whereNull('tanggal_keluar')->count();

        $users = User::where('id', '!=', Auth::id())->get();
        $selectedUser = $request->query('user');
        $messages = [];

        if ($selectedUser) {
            $messages = Message::where(function ($query) use ($selectedUser) {
                $query->where('sender_id', Auth::id())
                    ->where('receiver_id', $selectedUser);
            })->orWhere(function ($query) use ($selectedUser) {
                $query->where('sender_id', $selectedUser)
                    ->where('receiver_id', Auth::id());
            })->orderBy('created_at')->get();
        }

        return view('admin', compact(
            'dokterCount',
            'pasienCount',
            'jadwalCount',
            'rawatInapCount',
            'users',
            'messages',
            'selectedUser'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('admin', ['user' => $request->receiver_id]);
    }
}