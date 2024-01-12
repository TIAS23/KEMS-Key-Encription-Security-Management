<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\CompanyData;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('company')->get();
        return view('admin.engineer.users', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        $company_data = CompanyData::all();

        return view('admin.engineer.register', compact('users', 'company_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_id' => 'required|exists:company_data,id',
            'role' => 'required|in:engineer,mitra',
        ]);

        try {
            $users = User::create([
                'users_id' => Helper::IDGenerator(User::class, 'users_id', 5, 'USR'),
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'company_id' => $request->input('company_id'),
                'role' => $request->role
            ]);

            if (!$users) {
                return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create user']);
            }

            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $users = User::findOrFail($id);
            return view('admin.users.show', compact('users'));
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    }
}
