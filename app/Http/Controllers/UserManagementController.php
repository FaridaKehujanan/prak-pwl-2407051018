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

    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = UserModel::join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->select('user.*', 'kelas.nama_kelas as nama_kelas')
            ->when($search, function($query) use ($search) {
                $query->where('user.name', 'like', '%'.$search.'%')
                      ->orWhere('user.npm', 'like', '%'.$search.'%')
                      ->orWhere('kelas.nama_kelas', 'like', '%'.$search.'%');
            })
            ->paginate(5);

        $kelas = $this->kelasModel->getKelas();
        return view('user-management', compact('users', 'kelas', 'search'));
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

        return redirect()->route('user-management.index')
            ->with('success', 'Data user berhasil ditambahkan!');
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

        return redirect()->route('user-management.index')
            ->with('success', 'Data user berhasil diupdate!');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->route('user-management.index')
            ->with('success', 'Data user berhasil dihapus!');
    }
}