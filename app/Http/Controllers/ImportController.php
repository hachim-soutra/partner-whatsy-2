<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Client;
use App\Models\Group;
use App\Models\Order;
use App\Services\ExternalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    public function getImport($id)
    {
        return view('import', compact('id'));
    }

    public function parseImport(Request $request, $id, ExternalService $externalService)
    {

        // $request->validate([
        //     "csv_file" => "required|mimes:csv"
        // ]);
        $order = collect($externalService->getOrder($id)->json()['data']);

        Excel::import(new ClientsImport($order, $externalService), $request->file("csv_file"));

        return redirect()->back();
    }
}
