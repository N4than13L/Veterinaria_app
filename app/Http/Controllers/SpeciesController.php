<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SpeciesController extends Controller
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
        $specie = Specie::orderBy('id', 'desc')->paginate(5);

        return view('species.index', [
            'specie' => $specie
        ]);
    }

    public function add()
    {
        return view('species.add');
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $specie = new Specie();

        $name = $request->input('name');
        $type = $request->input('type');

        $specie->name = $name;
        $specie->type = $type;
        $specie->users_id = $id;

        var_dump($specie);
        die();

        return redirect()->route('species.index')->with(['message' => 'Especie agregada con exito']);
    }

    public function edit($id)
    {
        $specie = Specie::find($id);

        return view('species.edit', [
            'specie' => $specie
        ]);
    }


    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $users_id = $user->id;
        $specie = new Specie();

        $name = $request->input('name');
        $type = $request->input('type');

        $specie->name = $name;
        $specie->type = $type;
        $specie->users_id = $users_id;

        // var_dump($specie);
        // die();

        if ($users_id == $specie->users_id) {
            DB::table('species')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'type' => $type,
                    'users_id' => $users_id
                ]);
        }

        return redirect()->route('species.index')->with(['message' => 'Especie actualizada con exito']);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $users_id = $user->id;

        $specie = Specie::find($id);

        if ($users_id == $specie->users_id) {
            $specie->delete();
        }

        return redirect()->route('species.index')->with(['message' => 'Especie eliminada con exito']);
    }
}
