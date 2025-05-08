<?php

namespace App\Http\Controllers;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class PenggunaController extends Controller
{
    use PasswordValidationRules;
    public function index(Request $request)
    {
        $user_all = User::all();
        $activemenu = 'pengguna';

        $search = $request->input('search');
        $category = $request->input('category', 'all'); 

        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($category !== 'all') {
            $query->where('role', $category);
        }

        $user = $query->paginate(10);

        $user->appends(['search' => $search, 'category' => $category]);

        return view('pengguna.index', [
            'activemenu' => $activemenu,
            'user_all' => $user_all,
            'user' => $user,
            'category' => $category, 
            'search' => $search,     
        ]);
    }
    public function create(){
        $activemenu = 'pengguna';
        return view('pengguna.create',['activemenu' => $activemenu]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $activemenu = 'pengguna';
        return view('pengguna.edit', [
            'activemenu' => $activemenu,
            'user' => $user
        ]);
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required', Rule::in(['admin', 'mahasiswa', 'dosen_pembimbing'])],
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
            ]);

            return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'Terjadi kesalahan saat membuat pengguna: ' . $e->getMessage()
            ]);
        }
    }
    public function show($id)
    {
        $activemenu = 'pengguna';
        $user = User::findOrFail($id);
        return view('pengguna.show', [
            'activemenu' => $activemenu,
            'user' => $user,
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'role' => ['required', Rule::in(['admin', 'mahasiswa', 'dosen_pembimbing'])],
            ]);

            $updateData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => $validated['role'],
            ];


            if (!empty($validated['password'])) {
                $updateData['password'] = Hash::make($validated['password']);
            }

            $user = User::findOrFail($id);
            $user->update($updateData);
            
            return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'Terjadi kesalahan saat mengupdate pengguna: ' . $e->getMessage()
            ]);
        }
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
