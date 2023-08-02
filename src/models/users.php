<?php


function getUsers()
{
    $users =[];
    $usersPath = dirname(__FILE__). '/../datas/users.csv';
    if(file_exists($usersPath)){
        $filePointer = fopen($usersPath, 'r');
        while($data = fgetcsv($filePointer, null, ";")) {
        //   $users[]=$data;
        $users[]=[
            "firstname" => $data[0],
            "lastname"=>$data[1],
            "email"=>$data[2],
            "password"=>$data[3]
        ];

    }
    fclose($filePointer);
    return $users;
}else {
    echo "Une erreur est survenue";
}

}
function createUser()
{
   
    
    if(isset($_POST["submit"])){
      if(isset($_POST["firstname"]) && $_POST["firstname"] !== ""){
        if(isset($_POST["lastname"]) && $_POST["lastname"] !== ""){
            if(isset($_POST["password"]) && $_POST["password"] !== ""){
                $user= search_user_by_email($_POST['email']);
                if($user===true){
                    echo 'User recognized';
                }else{
                    if(saveUser($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"])){
                        echo 'User saved successfully';
                    }else{
                        echo '<div class="alert alert-danger">Error saving user.</div>';
                    }

                    
                }
            }else{
                echo "<p>Please enter a password</p>";
            }

        }else {
            echo "<p>Please enter a lastname</p>";
        }
        
    
      }
      else{
        echo "<p>Please enter a firstname</p>";
      }
      }else{
        echo "ERROR";
    }
    
}
function search_user_by_email($email)
{
    $users = read_users();
    if (array_key_exists($email, $users)) {
        echo 'ok';
        return true;
    }
    echo 'PAS-OK';
    return false;
}


?>