<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\Treatment;
use App\Models\Client;
use Spipu\Html2Pdf\Html2Pdf;


class BillController extends Controller
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
        $user = Auth::user();

        $bill = Bill::orderBy('id', 'desc')->paginate(5);

        return view('bill.index', [
            'user' => $user,
            'bill' => $bill,

        ]);
    }

    public function add()
    {
        $user = Auth::user();
        $treatment = Treatment::all();
        $client = Client::all();

        return view('bill.add', [
            'user' => $user,
            'treatment' => $treatment,
            'client' => $client
        ]);
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $bill = new Bill();

        $attendedby = $request->input('attendedby');
        $client = $request->input('client');
        $treatment = $request->input('treatment');

        $bill->attendedby = $attendedby;
        $bill->client_id = $client;
        $bill->treatment_id = $treatment;
        $bill->users_id = $user_id;

        $bill->save();

        return redirect()->route('bill.index')->with(['message' => 'factura agreagada con exito']);
    }


    public function edit($id)
    {
        $user = Auth::user();
        $client = Client::all();
        $treatment = Treatment::all();
        $bill = Bill::find($id);

        return view('bill.edit', [
            'client' => $client,
            'user' => $user,
            'bill' => $bill,
            'treatment' => $treatment
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $bill = Bill::find($id);

        $attendedby = $request->input('attendedby');
        $client = $request->input('client');
        $treatment = $request->input('treatment');

        $bill->attendedby = $attendedby;
        $bill->client_id = $client;
        $bill->treatment_id = $treatment;

        // var_dump($bill);
        // die();

        if ($user_id == $bill->users_id) {
            DB::table('bills')
                ->where('id', $id)
                ->update([
                    'attendedby' => $attendedby,
                    'client_id' => $client,
                    'treatment_id' => $treatment
                ]);
        }

        return redirect()->route('bill.index')->with(['message' => 'factura actualizada con exito']);
    }



    public function delete($id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $bill = Bill::find($id);

        if ($user && $user_id == $bill->users_id) {
            $bill->delete();
        }

        return redirect()->route('bill.index')->with(['message' => 'factura eliminada con exito']);
    }


    public function viewpdf($id)
    {
        $user = Auth::user();
        // $user_id = $user->id;
        $bill = Bill::find($id);

        $client = Client::all();

        return view('bill.viewpdf', [
            'user' => $user,
            'client' => $client,
            'bill' => $bill
        ]);
    }

    public function printpdf($id)
    {
        $user = Auth::user();

        $html2pdf = new Html2Pdf();

        $bill = Bill::find($id);


        $ITBIS = $bill->treatment->amount * 0.18;

        $total = $ITBIS + $bill->treatment->amount;

        $html = "<h2>Veterinaria los codornices</h2>";

        $html .= `<h4 class='text-center'>Atendido por: </h4>` .
            $bill->attendedby .
            '<h3>Cliente:</h3> ' .

            $bill->client->name  . ' ' . $bill->client->surname .
            "<h3>tratamiento: </h3> " .
            $bill->treatment->name .

            "<h3>Monto:</h3>" . " RD$ " .
            $bill->treatment->amount .

            " <h3>ITBIS: </h3> " . "RD$ " .  $ITBIS .

            "<br/> <h4>Total a pagar: </h4> " .

            " RD$ " . $total .
            " <p><strong>'Gracias por preferirnos'</strong></p>";

        $html2pdf->writeHTML($html);
        $html2pdf->output("factura.pdf");
    }
}
