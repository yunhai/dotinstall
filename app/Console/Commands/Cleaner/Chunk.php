<?php

namespace App\Console\Commands\Cleaner;

use Illuminate\Console\Command;

class Chunk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleaner:chunk';

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
        $break_time = time() - 14400;
        $dir = storage_path() . '/app/chunks/';
        $files = array_diff(scandir($dir), ['..', '.']);
        foreach ($files as $file) {
            $location = $dir . $file;
            if (is_dir($location)) {
                continue;
            }
            $timestamp = filemtime($location);

            if ($timestamp <= $break_time) {
                unlink($location);
            }
        }
    }
}
