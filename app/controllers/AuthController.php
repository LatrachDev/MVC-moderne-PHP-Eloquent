<?php
    namespace App\Controllers;
session_start();
    use App\Core\Controller;
    use App\Models\User;
    class AuthController extends Controller
    {

        public function logout()
        {
            session_destroy();

            header('Location: /login');
            exit;
        }

        public function login()
        {
            if (!isset($_SESSION['user_id'])) 
            {
                $this->view('auth/login', ['title' => 'Login']);
            }
            else
            {
                header('Location: /home');
                exit;   
            }
        }

        public function signup()
        {
            $this->view('auth/signup', ['title' => 'Signup']);
        }

        public function home()
        {
            if (isset($_SESSION['user_id'])) 
            {
                $user = User::find($_SESSION['user_id']);
                if ($user) 
                {
                    $this->view('layouts/home', [
                        'title' => 'Home',
                        'user' => $user
                    ]);
                } 
                else
                {
                    session_destroy();
                    header('Location: /login');
                    exit;
                }
            }
            else
            {
                header('Location: /login');
                exit;   
            }
        }

        public function handleSignup()
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            $errors = [];
            if (empty($name)) 
            {
                $errors['name'] = 'Name is required.';
            }
            if (empty($email)) 
            {
                $errors['email'] = 'Email is required.';
            } 
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $errors['email'] = 'Invalid email format.';
            }
            if (empty($password)) {
                $errors['password'] = 'Password is required.';
            } 
            elseif (strlen($password) < 8) 
            {
                $errors['password'] = 'Password must be at least 8 characters long.';
            }
            if ($password !== $confirmPassword) 
            {
                $errors['confirm_password'] = 'Passwords do not match.';
            }


            if (!empty($errors)) 
            {
                $this->view('auth/signup', 
                [
                        'title'     => 'Sign Up', 
                        'errors'    => $errors,
                        'name'      => $name,
                        'email'     => $email,
                    ]);
                    return;
            }

            User::create
            (
                [
                    'name'      => $name,
                    'email'     => $email,
                    'password'  => password_hash($password, PASSWORD_BCRYPT),
                ]
            );

            header('Location: /login');
            exit;
        }

        public function handleLogin()
        {

          
            if (!isset($_SESSION['user_id'])) 
            {
                
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $errors = [];
    
                if (empty($email)) {
                    $errors['email'] = 'Email is required';
                }
    
                if (empty($password)) {
                    $errors['password'] = 'Password is required';
                }
    
                if (!empty($errors)) {
                    return $this->view('auth/login', [
                        'errors' => $errors,
                        'email' => $email
                    ]);
                }
    
                $user = User::where('email', $email)->first();
    
                if ($user && password_verify($password, $user->password)) {
                    session_start();
                    $_SESSION['user_id'] = $user->id;
    
                    header('Location: /home');
                    exit;
                }
    
                $this->view('auth/login', [
                    'error' => 'Invalid email or password',
                    'email' => $email
                ]);
            }
            else
            {
                header('Location: /home');
                exit;   
            }


        }
    }

