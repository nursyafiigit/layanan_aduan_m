<?php

// app/Http/Controllers/MemberController.php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index(Request $request)
    {
        $limit = $request->input('limit', 5);

        $members = $limit === 'all' ? Member::all() : Member::take($limit)->get();

        return view('members.index', compact('members', 'limit'));
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
        ]);

        // Menyimpan data anggota
        Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
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

        $members = Member::where('name', 'LIKE', '%' . $search . '%')->paginate(10);

        return view('members.index', compact('members', 'search'));
    }
}
