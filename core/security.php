<?php
require_once(dirname(__FILE__).'/../src/models/users.php');
// function postLogin()
// {
//     if(isset($_POST["email"]) && isset($_POST["password"])){
//        echo $_POST["email"];
//        echo $_POST["password"];
//        echo $_POST["connexion"];

//     }
// }

function connect(){


session_start();
// Soit l'utilisateur vient de renseigner le formulaire et on vérifie que le couple login/mdp est
if (isset($_POST['connexion']) && $_POST['connexion'] === 'connect') {
    session_destroy();
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (search_user($_POST['email'], $_POST['password']) === true) {
            session_start();
            $_SESSION['user'] = [
                'connect'=> true,
                'email' =>  $_POST['email'],
            ];

            header('location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . '/index.php?page=home');
        } else {
            echo '
            <div class="alert alert-danger mt-5" role="alert">
                <p class="text-center ">Utilisateur Inconnu</p>
            </div>
            ';
        }
    }
} 
// else {
//     session_destroy();
 }

function search_user($email, $pwd)
{
$users = read_users();
if (is_array($users) && array_key_exists($email, $users) &&  password_verify($pwd, $users[$email])) {
    return true;
}
return false;
}
function read_users()
{
    // $result = [];
    if ($fp = fopen(dirname(__FILE__) . '/../src/datas/users.csv', 'r')) {
        while ($user = fgetcsv($fp, null, ';')) {

            $result[$user[2] ]= $user[3];
        }
        fclose($fp);
        return $result;
    } else {
        echo 'Erreur pendant l\'ouverture du fichier<br>';
    }
}
function saveUser($firstname, $lastname, $email, $pwd)
{
    if ($fp = fopen(dirname(__FILE__) . '/../src/datas/users.csv', 'a')) {
        if (fputcsv($fp, [$firstname, $lastname, $email, password_hash($pwd, PASSWORD_DEFAULT)], ';')) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}


?>