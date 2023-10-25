<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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
}
