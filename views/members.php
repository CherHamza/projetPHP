<?php
// session_start();


require_once(dirname(__FILE__) . "/../src/models/users.php");
// require_once(dirname(__FILE__). "/deleteUser.php");
$showUsers = getUsers();

// Fonction de comparaison pour trier par nom 
function sortUsers(&$showUsers, $sort, $order)
{
  $cmp = function ($a, $b) use ($sort, $order) {
    if ($order === 'desc') return strcmp($b[$sort], $a[$sort]);
     else return strcmp($a[$sort], $b[$sort]);
  };
  // permet un tri sur un tableau multidimensionnel
  usort($showUsers, $cmp);
}
//sercurité faille xls
if (isset($_GET["sort"]) && isset($_GET["order"])){
  sortUsers($showUsers, $_GET['sort'], $_GET['order']);
}
//function to sort table of users by asc and desc
function getSortOrder()
{
  $sorts = [
    "firstname" => "desc",
    "lastname" => "desc",
    "email"=> "desc"
  ];

  // on teste si on peut récupérer les clés sort et order depuis la querystring
  if (isset($_GET["sort"])) {
    if (isset($_GET["order"])) {
      $sorts[$_GET["sort"]] = $_GET["order"] === "desc" ? "asc" : "desc";
    }
  }
  return $sorts;
}
function remove_line_user(&$users, $index)
{
  $file_path = dirname(__FILE__) . '/../src/datas/users.csv';
  if (file_exists($file_path)) {
    
    $file_pointer = fopen($file_path, 'w');
    foreach($users as $i => $user) {

        // var_dump('$i' . $i);
       
        // var_dump('$user' . $user['email']);
      if($index != $user["email"]) {
        fwrite($file_pointer, $user["firstname"].';'.$user["lastname"].';'.$user["email"].';'.$user["password"]. PHP_EOL);
      }
      else unset($users);
    }
    fclose($file_pointer);
}
}
if(isset($_SESSION['user']) && $_SESSION['user'] && isset($_GET["delete"])){

//var_dump($plats);

remove_line_user($showUsers, $_GET["delete"]);
header('location: http://' . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . '/index.php?page=members');

}
?>


<h1>Members</h1>
  <div class="row">
    <div class="col">
    
    <?php
    if(isset($_SESSION['user']) && $_SESSION['user']){

   

    $sorts = getSortOrder();

        echo '<table class="table">';
        echo "\n" . ' <tr>';
        echo "\n" . '   <th><a href="/index.php?page=members&sort=firstname&order='. $sorts['firstname'] . '">Prénom</a></th>';
        echo "\n" . '   <th><a href="/index.php?page=members&sort=lastname&order='. $sorts['lastname'] . '">Nom</a></th>';
        echo "\n" . '   <th><a href="/index.php?page=members&sort=email&order='. $sorts['email'] . '">Email</a></th>';
        echo "\n" . ' </tr>';
    

   foreach ($showUsers as $user) {
                echo '
                <tr>   
                    <td>' . $user['firstname'] . '</td>
                    <td>' . $user['lastname'] . '</td>
                    <td>' . $user['email'] . '</td>
                    <td><a href="/index.php?page=members&delete=' . $user['email'] . ' "class="btn btn-danger"> Delete  </a></td>
                </tr>
                ';
            }
       
        echo '</table>';

    
      } else{

        echo '
            <div class="alert alert-danger mt-5" role="alert">
                <p class="text-center ">Vous n\'êtes pas connecté</p>
            </div>
            ';

      }
    // foreach($showUsers as $showUser ){
    //     echo "<p>".ucfirst("$showUser[0]")." ".ucfirst("$showUser[1]"). "</p>";
    // }
    ?>
    </div>
  </div>
