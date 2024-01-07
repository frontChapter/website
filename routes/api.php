<?php

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/orders/create/webhook', function (Request $request) {
    $order = [];
    $order['data'] = $request->all();

    $data = $request->all('data')['data'];

    $user = User::whereEmail($data['email'])
        ->first();

    if(!is_null($user)) {
        $order['user_id'] = $user->id;
    }

    $order['price'] = $data['price'];

    $order['ticket_title'] = $data['ticket']['data']['title'];
    $order['ticket_price'] = $data['ticket']['data']['price'];
    $order['ticket_description'] = $data['ticket']['data']['description'];

    $order['order_id'] = $data['order']['data']['id'];
    $order['order_price'] = $data['order']['data']['price'];

    if(isset($data['discount'])){
        $order['discount_code'] = $data['discount']['data']['code'];
        $order['discount_percentage'] = $data['discount']['data']['percentage'];
        $order['discount_price'] = $data['discount']['data']['price'];
    }

    Ticket::create($order);
});
