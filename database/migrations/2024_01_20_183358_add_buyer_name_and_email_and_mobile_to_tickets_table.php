<?php

use App\Models\Ticket;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('ticket_id')->after('user_id')->nullable();
            $table->string('first_name')->after('user_id')->nullable();
            $table->string('last_name')->after('user_id')->nullable();
            $table->string('mobile')->after('user_id')->nullable();
            $table->string('email')->after('user_id')->nullable();
        });

        Schema::table('tickets', function (Blueprint $table) {
            $tickets = Ticket::all();

            foreach($tickets as $ticket) {
                $ticket->ticket_id = $ticket->data->data->ticket_id;
                $ticket->email = $ticket->data->data->email;
                $ticket->mobile = $ticket->data->data->mobile;
                $ticket->first_name = $ticket->data->data->first_name;
                $ticket->last_name = $ticket->data->data->last_name;
                $ticket->save();
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('ticket_id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('mobile');
            $table->dropColumn('email');
        });
    }
};
