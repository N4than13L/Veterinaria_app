<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings()
    {
        $user = Auth::user();

        return view('user.settings', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user_auth  = Auth()->user();
        $user_id = $user_auth->id;

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');

        DB::table('users')
            ->where('id', $user_id)
            ->update([
                'name' => $name,
                'surname' => $surname,
                'email' => $email
            ]);

        return redirect()->route('settings')->with(['message' => 'Datos actualizados con exito']);
    }

    public function change()
    {
        $user = Auth::user();
        return view('user.changepassword', [
            'user' => $user
        ]);
    }

    public function change_password(Request $request, $id)
    {

        $user = new User();

        $password = $request->input('password');
        $password_confirm  = $request->input('password_confirmation');

        $user->password = $password_confirm;

        if ($password == $password_confirm) {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'password' => Hash::make($password_confirm),
                ]);
        }

        return redirect()->route('settings')->with(['message' => 'Contraseña actualizada con exito']);
    }
}
