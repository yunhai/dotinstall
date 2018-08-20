<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;
use App\Models\Console\User as UserModel;

class UserDiamondEndAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleaner:user_diamond_ends_at';

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
    public function __construct(UserModel $user_model)
    {
        parent::__construct();
        $this->user_model = $user_model;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->user_model->cleanDiamondByEndsAt();
    }
}
