<?php

require_once("./class/Database.php");

class User extends Database
{
        public function login()
        {
                $username = $_GET['username'];
                $connection = $this->connect()->prepare("SELECT * FROM user WHERE username_user = :username");
                $connection->bindValue(':username', $username);
                $connection->execute();
                $user = $connection->fetch();
                if ($user && password_verify($_GET['password'], $user['password_user'])) {
                        $_SESSION['name_user'] = $username;
                        echo $_SESSION['name_user'];
                        
                        header('Location: ./index.php');
                } else {
                        echo 'Invalid username or password';
                        echo $_SESSION['name_user'];
                        
                }
        }

        public function register()
        {
                $username = $_GET['username'];
                $password = $_GET['password'];
                $email = $_GET['email'];
                $firstname = $_GET['firstname'];
                $lastname = $_GET['lastname'];
                $connection = $this->connect()->prepare("SELECT * FROM user WHERE username_user = :username");
                $connection->bindValue(':username', $username);
                $connection->execute();
                $exist = $connection->fetch();
                if ($exist != false) {
                        echo "desolé cet identifiant existe déja";
                } else {
                        $insert = $this->connect()->prepare("INSERT into user (username_user, password_user, email_user, first_name_user, last_name_user) VALUE (:username, :password, :email, :first_name, :last_name)");
                        $insert->bindValue(':username', $username);
                        $insert->bindValue(':password', password_hash($password,  PASSWORD_DEFAULT));
                        $insert->bindValue(':email', $email);
                        $insert->bindValue(':first_name', $firstname);
                        $insert->bindValue(':last_name', $lastname);
                        $insert->execute();
                        $_SESSION['name_user'] = $username;
                        header("Location:./index.php");
                }
        }

        public function logout()
        {
                session_destroy();
                header('Location: ./index.php');
        }

       
}
