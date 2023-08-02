<?php
require_once(dirname(__FILE__)."/../src/models/users.php");
require_once(dirname(__FILE__)."/../core/security.php");



createUser();
?>
<h2>Create new user</h2>

<form action="index.php?page=create" method="POST">
<div class="mb-3">
    
        
      <label for="firstname" class="form-label">Firstname</label>
      <input type="text" class="form-control" id="firstname" name="firstname" >

    </div>
    
    <div class="mb-3">
    
        
      <label for="lastname" class="form-label">Lastname</label>
      <input type="text" class="form-control" id="lastname" name="lastname" >

    </div>

<div class="mb-3">
    
        
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

    </div>
     
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password">
      
    </div>
    
    <input type="submit" name="submit" value="Create" class="btn btn-primary">
  
  </form>

