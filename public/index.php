<?php

use App\Core\Database;

    require_once __DIR__ . '/../vendor/autoload.php'; 

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();


    require_once __DIR__ . '/../app/core/Database.php';
    Database::conn();

    use Core\Route;
    use Core\Router;
    use App\Controllers\Front\HomeController;
    use App\Controllers\AuthController;

    $router = new Router();
    Route::setRouter($router);

    Route::get('/', [HomeController::class, 'index']);
    Route::post('/signup', [AuthController::class, 'handleSignup']);
    Route::get('/signup', [AuthController::class, 'signup']);
    Route::post('/login', [AuthController::class, 'handleLogin']);
    Route::get('/login', [AuthController::class, 'login']);
    
    Route::get('/home', [AuthController::class, 'home']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
