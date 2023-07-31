<?php
require_once(dirname(__FILE__).'/../src/models/users.php');
function postLogin()
{
    if(isset($_POST["email"]) && isset($_POST["password"])){
       echo $_POST["email"];
       echo $_POST["password"];
       echo $_POST["connexion"];

    }
}

function search_user($email, $password)
{
    $users = getUsers();

    if(is_array($users)){
        // echo 'OK';
        foreach($users as $userKey ){
            // var_dump($userKey['email']);
           if($userKey['email'] === $email && password_verify($password, $userKey['password'])){
            echo "Vous êtes bien identifié";
             return true;
             
           }
       
        }

        return true;
    }else{
        echo "NON NON NON!";
        return false;
    }

}
function connect()
{
    session_start();
    if(isset($_POST['connexion']) && $_POST['connexion']==='connect'){
        session_destroy();
        if(isset($_POST['email']) && isset($_POST['password'])){
            if (search_user($_POST['email'], $_POST['password'] === true)) {
                 session_start();
                $_SESSION['user'] = true;
                var_dump($_SESSION['user']);
                 header('location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . '/index.php?page=members');

            }elseif(isset($_SESSION['user'])&& $_SESSION['email']===true){
                header('location: http://' . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . '/index.php?page=about');
            }else {
                session_destroy();
            }

         
        
        }

    
    
}
}
?>