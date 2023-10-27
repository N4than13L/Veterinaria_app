<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VaccineController extends Controller
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

    public function index()
    {
        $vaccine = Vaccine::orderBy('id', 'desc')->paginate(5);
        $user = Auth::user();

        return view('vaccine.index', [
            'vaccine' => $vaccine,
            'user' => $user
        ]);
    }

    public function add()
    {
        $user = Auth::user();

        return view('vaccine.add', [
            'user' => $user
        ]);
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $vaccine = new Vaccine();

        $name = $request->input('name');
        $type = $request->input('type');
        $effects = $request->input('effects');

        $vaccine->name = $name;
        $vaccine->type = $type;
        $vaccine->effects = $effects;
        $vaccine->users_id = $id;

        // var_dump($vaccine);
        // die();

        $vaccine->save();

        return redirect()->route('vaccine.index')->with(['message' => 'Datos actualizados con exito']);
    }

    public function edit($id)
    {
        $vaccine = Vaccine::find($id);
        $user = Auth::user();

        return view('vaccine.edit', [
            'vaccine' => $vaccine,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {

        $vaccine = new Vaccine();

        $user = Auth::user();
        $users_id = $user->id;

        $name = $request->input('name');
        $type = $request->input('type');
        $effects = $request->input('effects');

        $vaccine->name = $name;
        $vaccine->type = $type;
        $vaccine->effects = $effects;
        $vaccine->users_id = $users_id;

        // var_dump($vaccine);
        // die();

        if ($users_id == $vaccine->users_id) {
            DB::table('vaccines')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'type' => $type,
                    'effects' => $effects,
                ]);
        }
        return redirect()->route('vaccine.index')->with(['message' => 'Vacuna acualizada con exito']);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $vaccine = Vaccine::find($id);

        if ($user->id == $vaccine->id) {
            $vaccine->delete();
        }

        return redirect()->route('vaccine.index')->with(['message' => 'vacuna eliminada con exito']);
    }
}
