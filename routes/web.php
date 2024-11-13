<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Add_employeeController;
// use App\Http\Controllers\DemoController;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', function(){
        return view('employees/add_employee');
    });

});

// Route to add an employee (POST method)
Route::post('/add_employee', [Add_employeeController::class, 'add'])->name('add.employee');

// Route to show employees (GET method)
Route::get('/show_employee', [Add_employeeController::class, 'show'])->name('show.employee');

// Route to delete an employee (GET method)
Route::get('/delete_employee/{id}', [Add_employeeController::class, 'delete'])->name('delete.employee');

// Route to edit an employee (GET method)
Route::get('/edit_employee/{id}', [Add_employeeController::class, 'edit'])->name('edit.employee');

// Route to update an employee (GET method)
Route::put('/update_employee/{id}', [Add_employeeController::class, 'update'])->name('update.employee');



// Route::get('test', function(){
//     return "view('test')";
// });

// Route::view('test_route', 'test');

// // get route
// Route::get('/demo/{name}/{id?}', function($name, $id = NULL){
//     $data = compact('name','id');
//     print_r($data);
// });

// // post route
// Route::any('/test', function(){
//     echo "<h1>This is an any method</h1>";
// });

