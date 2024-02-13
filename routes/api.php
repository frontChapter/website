<?php

use App\Events\TicketPurchased;
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

Route::prefix('/v1')
    ->group(function () {
        // Route::prefix('/users')->group(function () {
        //     Route::middleware('auth:sanctum')->get('/', function (Request $request) {
        //         return $request->user();
        //     });
        // });

        Route::prefix('/tickets')->group(function () {
            Route::get('/registers', [App\Http\Controllers\Api\V1\TicketsController::class, 'registers']);
            Route::post('/webhook', [App\Http\Controllers\Api\V1\TicketsController::class, 'storeWebHook']);
        });

        Route::prefix('/sites')->group(function () {
            Route::post('/', [App\Http\Controllers\Api\V1\SitesController::class, 'store']);
        });

        Route::prefix('/users')->group(function () {
            Route::get('/', function () {
                return User::get('*');
            });
        });
    });

Route::post('/tickets/webhook', function (Request $request) {
    $order = [];
    $order['data'] = $request->all();

    $data = $request->all('data')['data'];

    $user = User::whereEmail($data['email'])
        ->first();

    if (!is_null($user)) {
        $order['user_id'] = $user->id;
    }

    $order['price'] = $data['price'];

    $order['email'] = $data['email'];
    $order['mobile'] = $data['mobile'];
    $order['first_name'] = $data['first_name'];
    $order['last_name'] = $data['last_name'];
    $order['ticket_id'] = $data['ticket_id'];

    $order['ticket_title'] = $data['ticket']['data']['title'];
    $order['ticket_price'] = $data['ticket']['data']['price'];
    $order['ticket_description'] = $data['ticket']['data']['description'];

    $order['order_id'] = $data['order']['data']['id'];
    $order['order_price'] = $data['order']['data']['price'];

    if (isset($data['discount'])) {
        $order['discount_code'] = $data['discount']['data']['code'];
        $order['discount_percentage'] = $data['discount']['data']['percentage'];
        $order['discount_price'] = $data['discount']['data']['price'];
    }

    $ticket = Ticket::create($order);

    TicketPurchased::dispatch($ticket);
});
