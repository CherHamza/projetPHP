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
            "Email"=>$data[2]
        ];

    }
    // fclose($filePointer);
return $users;
}else {
    echo "Une erreur est survenue";
}

}
?>