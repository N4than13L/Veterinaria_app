<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnimalsController extends Controller
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
        $animal = Animal::orderBy('id', 'desc')->paginate(5);
        $species = Specie::orderBy('id', 'desc')->paginate(5);

        $user = Auth::user();

        return view('animals.index', [
            'animal' => $animal,
            'species' => $species,
            'user' => $user
        ]);
    }

    public function add()
    {
        $specie = Specie::all();
        $user = Auth::user();

        return view('animals.add', [
            'specie' => $specie,
            'user' => $user,
        ]);
    }

    public function save(Request $request)
    {
        $animal = new Animal();
        $user = Auth::user();
        $id = $user->id;

        $name = $request->input('name');
        $age = $request->input('age');
        $birth = $request->input('birth');
        $species = $request->input('species');

        $animal->name = $name;
        $animal->age = $age;
        $animal->birth = $birth;
        $animal->species_id = $species;
        $animal->users_id = $id;

        $animal->save();

        // var_dump($animal);
        // die();
        return redirect()->route('animals.index')->with(['message' => 'Mascota agregada con exito']);
    }

    public function edit($id)
    {
        $animal = Animal::find($id);
        $specie = Specie::all();
        $user = Auth::user();

        return view('animals.edit', [
            'animal' => $animal,
            'specie' => $specie,
            'user' => $user
        ]);
    }

    public function  update(Request $request, $id)
    {
        $animal = new Animal();
        $user = Auth::user();
        $users_id = $user->id;

        $name = $request->input('name');
        $age = $request->input('age');
        $birth = $request->input('birth');
        $species = $request->input('species');

        $animal->name = $name;
        $animal->age = $age;
        $animal->birth = $birth;
        $animal->species_id = $species;
        $animal->users_id = $id;

        // var_dump($animal);
        // die();

        if ($user && $users_id == $animal->users_id) {
            DB::table('animals')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'age' => $age,
                    'birth' => $birth,
                    'species_id' => $species,
                ]);
        }

        return redirect()->route('animals.index')->with(['message' => 'Mascota actualizada con exito']);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $users_id = $user->id;

        // $specie = Specie::find($id);
        $animal = Animal::find($id);

        if ($user && $users_id == $animal->users_id) {
            $animal->delete();
        }

        return redirect()->route('animals.index')->with(['message' => 'Mascota eliminada con exito']);
    }
}
