<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Sample;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sample';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create table';

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
        $user = Sample::create([
            'party' => 'republican',
            'votes' => '0'
        ]);
    }
}
