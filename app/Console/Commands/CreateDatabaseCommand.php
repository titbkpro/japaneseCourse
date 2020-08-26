<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class CreateDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $query = 'CREATE DATABASE IF NOT EXISTS `japanese-course`;';
        DB::statement($query);
        $this->info(__('command.create_db.success'));
    }
}
