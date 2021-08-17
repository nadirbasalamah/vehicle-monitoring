<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('home/welcome');
    }

    public function register()
    {
        return view('home/register');
    }

    public function registerUser(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'role',
        ]);

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');

        $user->save();

        return redirect()->route('login');
    }

    public function loginUser(Request $request)
    {
        $data = $request->only([
            'email',
            'password',
        ]);

        $validator = Validator::make($data, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->get('email'))->firstOrFail();

        if (Hash::check($request->get('password'), $user->password)) {
            if ($user->role == 'admin') {
                return redirect()->route('admin_index');
            } else {
                return redirect()->route('agreement_index');
            }
        } else {
            echo ('wrong password');
        }
    }

    public function logout()
    {
        //TODO: implement logout
        return view('home/welcome');
    }
}
