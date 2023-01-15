<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //menggunakan model User
use Illuminate\Support\Facades\Session; //menggunakan session

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request) //variable request menampung isi inputan yang ada dalam form register lalu di kirim ke method store
    {
        $ValidatedData = $request->validate([
            'name' => 'required|max:255|min:3', //penulisan sama saja bisa menggunakan array atau cara ini
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], //unique:users merupakan validasi untuk mengecek apakah username sudah ada di database atau belum
            'email' => 'required|email:dns|unique:users',
            'email_verified_at' => '',
            'password' => 'required|min:5|max:255'
        ]);
        $ValidatedData['password'] = bcrypt($ValidatedData['password']); //menggunakan method bcrypt untuk mengenkripsi password

        User::create($ValidatedData); //menggunakan method created untuk membuat data baru di database user
        // session()->flash('success', 'Register Success');

        return redirect('/login')->with('success', 'Register Success');
    }
}
