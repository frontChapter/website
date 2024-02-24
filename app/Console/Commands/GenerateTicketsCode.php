<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;

class GenerateTicketsCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:tickets-code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fill the code column in tickets table with random string if column was null';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Ticket::whereNull('code')->get() as $ticket) {
            try {
                $ticket->code = str()->random('6');
                $ticket->save();
            } catch (\Throwable $th) {
                $this->error('duplicate code, try again.');
            }
        }

        $this->warn('created.');
    }
}
