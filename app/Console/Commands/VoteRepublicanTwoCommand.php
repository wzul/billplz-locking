<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Sample;

class VoteRepublicanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:vote_republican';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vote Republican';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // ApplicationRecord.transaction do
        //     republican = Sample.where(party: :republican).lock
        //     republican.update votes: republican.votes + 1
        // end

        // pessimistic locking.
        DB::beginTransaction();
            $republican = Sample::where('party', 'republican')->lockForUpdate()->first();
            sleep(5);
            Sample::where('party', 'republican')->update([
                'votes' => $republican->votes + 1
            ]);
        DB::commit(); 
    }
}
