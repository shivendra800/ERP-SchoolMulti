<?php

namespace App\Console\Commands;

use Log;
use App\Models\Admin;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admins:statusUpate';

    /**
     * The console command description.
     *
     *
     * @var string
     */
    protected $description = 'Admin Status Update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
          $currentDate=Carbon::now()->format('Y-m-d');
        $alladmin = Admin::where('plan_status',1)->get();
        foreach($alladmin as $admin)
        {
          $adminDate= Carbon::parse($admin->plan_end_date);
          $month = $adminDate->diffInDays($currentDate);
          if($month>0){
            Admin::where('id',$admin->id)->update(['plan_status'=>0]);
          }
          \Log::info($month);

        }
    }
}
