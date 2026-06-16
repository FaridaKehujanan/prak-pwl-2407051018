<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    
    protected $kelasModel;
    protected $userModel;

    public function __construct()
    {
        $this->kelasModel = new Kelas();
        $this->userModel = new UserModel();
    }

    
    public function index()
    {
        $users = $this->userModel->getUser();
        $kelas = $this->kelasModel->getKelas(); // ← tambahan
        return view('user-management', compact('users', 'kelas')); // ← tambahan
    }

    
    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        return view('create-user', compact('kelas'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $this->userModel->create([
            'name' => $request->input('name'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id')
        ]);

        return redirect()->route('user-management.index');
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $user = UserModel::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id')
        ]);

        return redirect()->route('user-management.index');
    }

    
    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->route('user-management.index');
    }
}