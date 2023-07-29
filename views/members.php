<?php
require_once(dirname(__FILE__) . "/../src/models/users.php");
$showUsers = getUsers();

?>
<h1>Members</h1>
<div class="row">
<div class="col">
<?php
 echo '<table class="table">';
 echo "\n" . ' <tr>';
 echo "\n" . '   <th><a href="">Prénom</a></th>';
 echo "\n" . '   <th><a href="#">Nom</a></th>';
 echo "\n" . '   <th><a href="#">Email</a></th>';
 echo "\n" . ' </tr>';
 foreach ($showUsers as $key => $user) {
    echo "\n" . ' <tr>';
    foreach ($user as $value) {
      echo "\n" . '   <td>' . $value . '</td>';
    }
    echo "\n" . ' </tr>';
  }
  echo '</table>';

// foreach($showUsers as $showUser ){
//     echo "<p>".ucfirst("$showUser[0]")." ".ucfirst("$showUser[1]"). "</p>";
// }
?>

</div>
</div>
