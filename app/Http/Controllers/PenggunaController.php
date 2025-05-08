<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class PenggunaController extends Controller
{
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
    public function store(array $input){
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required', Rule::in(['admin', 'mahasiswa', 'dosen_pembimbing'])],
        ])->validate();
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
        ]);
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }
    public function show(User $user)
    {
        $activemenu = 'pengguna';
        return view('pengguna.show', [
            'activemenu' => $activemenu,
            'user' => $user,
        ]);
    }
    public function edit(User $user){
        $activemenu = 'pengguna';
        return view('pengguna.edit', [
            'activemenu' => $activemenu,
            'user' => $user,
        ]);
    }
    public function update(User $user, array $input){
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required', Rule::in(['admin', 'mahasiswa', 'dosen_pembimbing'])],
        ])->validate();
        $user->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
        ]);
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diupdate');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}