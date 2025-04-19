<?php

namespace App\Console\Commands;

use App\Helpers\RepositoryHelper;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessExpiredSubscriptions extends Command
{   
    public function __construct( private RepositoryHelper $repositoryHelper)
    {
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-expired-subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark expired subscriptions as inactive';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {

         $count = $this->repositoryHelper->markSubscriptionAsInactive();
         
         Log::info("Processed {$count} expired subscriptions");
         $this->info("{$count} Expired subscriptions have been processed successfully");


        }catch(Exception $e){

            Log::error('Error processing expired subscriptions: '. $e->getMessage());
            $this->error('An error occured while processing expired subscriptions');

        }
    }
}
