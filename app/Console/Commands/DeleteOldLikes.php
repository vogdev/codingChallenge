<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Like;
use Carbon\Carbon;

class DeleteOldLikes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleteoldlikes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // this code finds expired dislikes and deletes them
        $likes = Like::where('expiration_date','<',Carbon::now())->where('like', false)->delete();
    }
}
