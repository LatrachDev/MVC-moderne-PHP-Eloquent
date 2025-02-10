<?php

namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public static function conn()
    {
        $config = config('database');
        $driver = config('driver');
       
        
        if (!$config || !isset($driver)) 
        {
            throw new \Exception("Invalid database configuration.");
        }

        $capsule = new Capsule;
        // $capsule->addConnection( __DIR__ . require_once '../../config/config.php');

        $capsule->addConnection
        (
            [
                'driver'    => $_ENV['DB_DRIVER'],
                'host'      => $_ENV['DB_HOST'],
                'database'  => $_ENV['DB_NAME'],
                'username'  => $_ENV['DB_USER'],
                'password'  => $_ENV['DB_PASS'],
                'charset'   => $_ENV['DB_CHARSET'],
                'collation' => $_ENV['DB_COLLATION'],
                'prefix'    => '', 
            ]
        );
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}

function config($key)
{
    $config = require __DIR__ . '/../../config/config.php';
    return $config[$key] ?? null;
}