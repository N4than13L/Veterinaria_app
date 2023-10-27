<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use App\Models\Vaccine;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller
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
        $treatment = Treatment::orderBy('id', 'desc')->paginate(5);

        $user = Auth::user();

        return view('treatment.index', [
            'treatment' => $treatment,
            'user' => $user
        ]);
    }

    public function add()
    {
        $animal = Animal::all();
        $vaccine = Vaccine::all();
        $user = Auth::user();

        return view('treatment.add', [
            'animal' => $animal,
            'vaccine' => $vaccine,
            'user' => $user
        ]);
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $treatment = new Treatment();

        $name = $request->input('name');
        $obs = $request->input('obs');
        $amount = $request->input('amount');
        $animal = $request->input('animal');
        $vaccine = $request->input('vaccine');

        $treatment->name = $name;
        $treatment->observations = $obs;
        $treatment->amount = $amount;
        $treatment->animals_id = $animal;
        $treatment->vaccines_id = $vaccine;
        $treatment->users_id = $user_id;

        $treatment->save();

        return redirect()->route('treatment.index')->with(['message' => 'historial agregado  con exito']);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $animal = Animal::all();
        $vaccine = Vaccine::all();
        $treatment = Treatment::find($id);

        return view('treatment.edit', [
            'animal' => $animal,
            'vaccine' => $vaccine,
            'treatment' => $treatment,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $treatment = new Treatment();

        $name = $request->input('name');
        $obs = $request->input('obs');
        $amount = $request->input('amount');
        $animal = $request->input('animal');
        $vaccine = $request->input('vaccine');

        $treatment->name = $name;
        $treatment->observations = $obs;
        $treatment->amount = $amount;
        $treatment->animals_id = $animal;
        $treatment->vaccines_id = $vaccine;
        $treatment->users_id = $user_id;

        // var_dump($treatment);
        // die();

        if ($user_id == $treatment->users_id) {
            DB::table('treatments')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'observations' => $obs,
                    'amount' => $amount,
                    'animals_id' => $animal,
                    'vaccines_id' =>  $vaccine
                ]);
        }

        return redirect()->route('treatment.index')->with(['message' => 'Tratamiento actualizado con exito']);
    }


    public function delete($id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $animal = Animal::all();
        $vaccine = Vaccine::all();
        $treatment = Treatment::find($id);

        if ($user && $user_id == $treatment->id) {
            $treatment->delete();
        }

        return redirect()->route('treatment.index')->with(['message' => 'historial agregado  con exito']);
    }
}
