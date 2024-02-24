<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\TicketPurchased;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {}

    public function registers()
    {
        $tickets = Ticket::select('tickets.email', 'tickets.first_name', 'tickets.last_name', 'tickets.user_id', 'users.username')
            ->leftJoin('users', 'user_id', 'users.id')
            ->groupBy('email', 'first_name', 'last_name', 'email', 'user_id', 'users.username')
            ->inRandomOrder()
            ->get()
            ->setHidden(['user', 'user_id', 'email', 'first_name', 'last_name']);

        return ResponseBuilder::success($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeWebHook(Request $request)
    {
        $order = [];
        $order['data'] = $request->all();

        $data = $request->all('data')['data'];

        $user = User::whereEmail($data['email'])
            ->first();

        if (!is_null($user)) {
            $order['user_id'] = $user->id;
        }

        $order['code'] = $this->codeGenerator();
        $order['email'] = $data['email'];
        $order['mobile'] = $data['mobile'];
        $order['first_name'] = $data['first_name'];
        $order['last_name'] = $data['last_name'];
        $order['ticket_id'] = $data['ticket_id'];

        $order['price'] = $data['price'];

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

        ResponseBuilder::success();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    private function codeGenerator(): string
    {
        $code = str()->random('6');

        if(Ticket::whereCode($code)->count() > 0) {
            $code = $this->codeGenerator();
        }

        return $code;
    }
}
