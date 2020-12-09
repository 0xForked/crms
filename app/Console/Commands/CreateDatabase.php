<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;
use PDOException;

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
     * The PDO connection state
     *
     * @var PDO
     */
    private $pdo_connection;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->pdo_connection = $this->getPDOConnection();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $database = env('DB_DATABASE', "assitev2_db");

        try {
            $query = $this->pdo_connection->exec(sprintf(
                'CREATE DATABASE IF NOT EXISTS %s CHARACTER SET %s COLLATE %s;',
                $database,
                env('DB_CHARSET'),
                env('DB_COLLATION')
            ));

            if (!$query) {
                $this->info(sprintf('Database %s is Exist', $database));
                return;
            }

            $this->info(sprintf('Successfully created %s database', $database));
        } catch (PDOException $exception) {
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }
    
    /**
     * The PDO Connection
     *
     * @return PDO
     */
    private function getPDOConnection(): PDO {
        return new PDO(
            sprintf(
                'mysql:host=%s;port=%d;',
                env('DB_HOST'),
                env('DB_PORT')
            ),
            env('DB_USERNAME'),
            env('DB_PASSWORD')
        );
    }
}
