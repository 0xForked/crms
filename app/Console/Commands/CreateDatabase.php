<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schema';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MySql database schema';

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
        try {
            $name = config("database.connections.mysql.database");
            $charset = config("database.connections.mysql.charset",'utf8mb4');
            $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

            $query = "CREATE DATABASE IF NOT EXISTS $name CHARACTER SET $charset COLLATE $collation;";
            $action = DB::statement($query);

            if (!$action) {
                $this->error("Failed add new schema $name on database");
                return;
            }

            $this->info("Schema $name is exist on database");
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
