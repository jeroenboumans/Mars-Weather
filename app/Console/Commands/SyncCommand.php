<?php

namespace App\Console\Commands;

use App\Traits\SyncTrait;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SyncCommand extends Command
{
    use SyncTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncs all weather results from InSight with the micro service database';

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
        $this->syncWithRemote();
    }
}
