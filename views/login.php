<?php
session_start();
require_once(dirname(__FILE__). "/../core/security.php");

postLogin();
connect();


?>





  <form action="index.php?page=login" method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
   
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
    <input type="hidden" name="connexion" value="connect">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
