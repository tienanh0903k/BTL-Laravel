<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function registerSave(Request $request) {
    // try {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user instance and save it to the database
        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 2
        ]);

        //dd("123");
        return redirect()->route('login');
    // } catch(\Throwable $e) {
    //     dd($e);
    //     return back()->with('error', 'Something went wrong');
    // }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            //dd($user);
            $request->session()->put('username', $user->fullname);
            $request->session()->put('id', $user->id);
            if ($user->role_id == 1) {
                return redirect()->route('products');
            } elseif ($user->role_id == 2) {
                return redirect()->route('home');
            }
        }
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }


    public function store(Request $request)
    {
        //
    }
}
