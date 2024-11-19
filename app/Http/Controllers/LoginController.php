<?php

namespace App\Http\Controllers;

use App\Models\Login; // Use PascalCase for class names
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        // Optionally, you can seed the database only if it's empty
        $this->seedUsers();
    }

    private function seedUsers()
    {
        // Create the 'register' user if it does not exist
        if (!Login::where('username', 'register')->exists()) {
            Login::create([
                'username' => 'register',
                'password' => Hash::make('registerpass2'),
                'role' => 'register',
            ]);
        }

        // Create the 'dokter1' user if it does not exist
        if (!Login::where('username', 'dokter1')->exists()) {
            Login::create([
                'username' => 'dokter1',
                'password' => Hash::make('dokterpass1'),
                'role' => 'dokter',
            ]);
        }
        if (!Login::where('username', 'farmasi')->exists()) {
            Login::create([
                'username' => 'farmasi',
                'password' => Hash::make('farmasipass1'),
                'role' => 'farmasi',
            ]);
        }
        if (!Login::where('username', 'admin')->exists()) {
            Login::create([
                'username' => 'admin',
                'password' => Hash::make('admin1'),
                'role' => 'admin',
            ]);
        }
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Get credentials
        $credentials = $request->only('username', 'password');

        // Find the user by username
        $login = Login::where('username', $credentials['username'])->first();

        // Check if user exists and password is correct
        if ($login && Hash::check($credentials['password'], $login->password)) {
            // Redirect based on user role
            switch ($login->role) {
                case 'admin':
                    return redirect()->route('dashboard'); // Adjust route name accordingly
                case 'register':
                    return redirect()->route('regist'); // Adjust route name accordingly
                case 'dokter':
                    return redirect()->route('dokter.dokter'); // Adjust route name accordingly
                case 'farmasi':
                    return redirect()->route('farmasi.farmasi');
                default:
                    return redirect()->route('login')->withErrors(['username' => 'Role not recognized']);
            }
        } else {
            return back()->withErrors(['username' => 'Invalid username or password']);
        }
    }

    public function logout()
    {
        Auth::logout(); // Logout the user
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
