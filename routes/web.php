<?php

use App\Models\Client;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/import/{id}', [App\Http\Controllers\ImportController::class, 'getImport'])->name('import');
Route::post('/import_process', [App\Http\Controllers\ImportController::class, 'processImport'])->name('import_process');


Route::get('/import-file/{name}', function ($name) {
    set_time_limit(-1);
    $count = 0;
    if (($open = fopen(public_path() . "/Archive/$name", "r")) !== FALSE) {
        while (($data = fgetcsv($open, 0, ",")) !== FALSE) {
            echo $data[0];
            $count++;
            echo "<br/>";
            echo "count $count";
            Client::insert([
                "uid" => $data[0],
                "name" => $data[2],
                "phone" => $data[1]
            ]);
            echo "<br/>";
        }

        fclose($open);
    }
});
