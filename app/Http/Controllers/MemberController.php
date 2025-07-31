<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::with('profile'); // Load profile with each member

        // Pencarian berdasarkan nama atau email
        if ($request->has('search') && $request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%');
        }

        // Filter berdasarkan gender
        if ($request->has('gender') && $request->gender) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('gender', $request->gender);
            });
        }

        // Filter berdasarkan status pendidikan
        if ($request->has('status_pendidikan') && $request->status_pendidikan) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('status_pendidikan', $request->status_pendidikan);
            });
        }

        // Fetch the members with pagination
        $members = $query->paginate(10);

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone_number' => 'required|string',
            'address' => 'nullable|string',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
            'status_pendidikan' => 'nullable|string',
        ]);

        // Menyimpan data anggota
        $member = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        // Menyimpan data profile anggota yang baru
        $member->profile()->create([
            'address' => $request->address,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'status_pendidikan' => $request->status_pendidikan,
        ]);

        // Redirect ke halaman daftar anggota setelah berhasil menambah
        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit data anggota
    public function edit($id)
    {
        $member = Member::findOrFail($id); // Mencari anggota berdasarkan ID
        return view('members.edit', compact('member')); // Menampilkan form edit anggota
    }

    // Memperbarui data anggota
    public function update(Request $request, $id)
    {
        // Validasi data dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $id, // Validasi email agar unik
            'phone_number' => 'required|string',
        ]);

        // Menemukan anggota yang akan diperbarui
        $member = Member::findOrFail($id);

        // Memperbarui data anggota
        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        // Redirect ke halaman daftar anggota setelah berhasil update
        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    // Menghapus data anggota
    public function destroy($id)
    {
        // Menemukan anggota yang akan dihapus
        $member = Member::findOrFail($id);

        // Menghapus anggota
        $member->delete();

        // Redirect ke halaman daftar anggota setelah berhasil menghapus
        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $members = Member::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->paginate(10);

        return view('members.index', compact('members', 'search'));
    }
}
