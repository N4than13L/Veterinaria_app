<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
        $client = Client::orderBy('id', 'desc')->paginate(5);
        $animal = Animal::all();
        $user = Auth::user();

        return view('client.index', [
            'client' => $client,
            'animal' => $animal,
            'user' => $user
        ]);
    }

    public function add()
    {
        $client = Client::orderBy('id', 'desc')->paginate(5);
        $animal = Animal::all();
        $user = Auth::user();

        return view('client.add', [
            'client' => $client,
            'animal' => $animal,
            'user' => $user
        ]);
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $client = new Client();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $animal = $request->input('animal');

        $client->name = $name;
        $client->surname = $surname;
        $client->phone = $phone;
        $client->address = $address;
        $client->animals_id = $animal;
        $client->users_id = $user_id;

        $client->save();

        return redirect()->route('client.index')->with(['message' => 'Cliente con exito']);
    }

    public function edit($id)
    {
        $client = Client::find($id);
        $animal = Animal::all();
        $user = Auth::user();

        return view('client.edit', [
            'client' => $client,
            'animal' => $animal,
            'user' => $user
        ]);
    }

    public function  update(Request $request, $id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $client = new Client();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $animal = $request->input('animal');

        $client->name = $name;
        $client->surname = $surname;
        $client->phone = $phone;
        $client->address = $address;
        $client->animals_id = $animal;
        $client->users_id = $user_id;

        if ($user_id == $client->users_id) {
            DB::table('clients')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'surname' => $surname,
                    'phone' => $phone,
                    'address' => $address,
                    'animals_id' => $animal
                ]);
        }

        return redirect()->route('client.index')->with(['message' => 'Cliente con exito']);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $client = Client::find($id);


        if ($user && $user_id == $client->users_id) {
            $client->delete();
        }

        return redirect()->route('client.index')->with(['message' => 'Cliente con exito']);
    }
}
