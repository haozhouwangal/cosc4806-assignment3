<?php
session_start();
class login extends Controller {
    public function index() {
        $this->view('login/form');
    }

    public function submit() {
        $user = $this->model('User');
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $user->authenticate();

        if ($user->is_authenticated) {
            $_SESSION['auth'] = true;
            header('location: /home');
        } else {
            echo "login failed.";
        }
    }

    public function create() {
        $user = $this->model('User');
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        if ($user->register()) {
            echo "Account created.";
        } else {
            echo "Registration failed.";
        }
    }
}
