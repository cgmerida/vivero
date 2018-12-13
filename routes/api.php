<?php

use Illuminate\Http\Request;
use App\Plant;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('users', function () {
    return datatables(App\User::latest('updated_at')->get())
        ->addColumn('actions', 'users.partials.actions')
        ->rawColumns(['actions'])
        ->toJson();
});

Route::get('roles', function () {
    return datatables(Caffeinated\Shinobi\Models\Role::all())
        ->addColumn('actions', 'roles.partials.actions')
        ->rawColumns(['actions'])
        ->toJson();
});

Route::get('plants', function () {
    return datatables(App/Plant::all())
        ->addColumn('actions', 'plants.partials.actions')
        ->rawColumns(['actions'])
        ->toJson();
});