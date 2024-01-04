<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CompanyData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    public function showRegistrationForm()
    {
        $company_data = CompanyData::all(); // Fetch company data for dropdown
        return view('register', compact('company_data'));
    }
    
    function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'engineer'){
                return redirect('admin/engineer');
            }elseif (Auth::user()->role == 'mitra'){
                return redirect('admin/mitra');
            }
        }else{
            return redirect('')->withErrors('Username dan password anda tidak sesuai!');
        }
    }

    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'company_id' => 'required|exists:company_data,id',
        'role' => 'required|in:engineer,mitra',
    ], [
        'name.required' => 'Nama wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal 8 karakter',
        'password.confirmed' => 'Konfirmasi password tidak cocok',
        'company_id' => $request->input('company_id'),
        'role.required' => 'Role wajib diisi',
        'role.in' => 'Role yang dipilih tidak valid',
    ]);

    $user = User::create([
        'users_id' => Helper::IDGenerator(User::class, 'users_id', 5, 'USR'),
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'company_id' => $request->input('company_id'),
        'role' => $request->role

    ]);

    // Log in the user after registration
    Auth::login($user);

    // Redirect the user based on their role
    if ($user->role == 'engineer') {
        return redirect('admin/engineer');
    } elseif ($user->role == 'mitra') {
        return redirect('admin/mitra');
    }
}

    function logout (){
        Auth::logout();
        return redirect('/');
    }
    
}
