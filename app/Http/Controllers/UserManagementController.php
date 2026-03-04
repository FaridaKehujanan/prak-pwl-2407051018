<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = [
            ['nama' => 'Farida',
            'npm' => '2407051018',
            'jurusan' => 'Ilmu Komputer',
            'prodi' => 'D3 Manajemen Informatika'
            ],

            ['nama' => 'Yu Zhong',
            'npm' => '2407051010',
            'jurusan' => 'Ilmu Komputer',
            'prodi' => 'D3 Manajemen Informatika'
            ],

            ['nama' => 'Arataki Itto',
            'npm' => '2407051014',
            'jurusan' => 'Ilmu Komputer',
            'prodi' => 'D3 Manajemen Informatika'
            ],

            ['nama' => 'Caleb Xia YiZhou',
            'npm' => '2407051002',
            'jurusan' => 'Ilmu Komputer',
            'prodi' => 'D3 Manajemen Informatika'
            ],
        ];
        return view('user-management', compact('users'));
    }
}
