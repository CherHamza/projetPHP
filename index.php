<!DOCTYPE html>
<html lang="fr">

<?php
   require_once(dirname(__FILE__) . '/views/includes/head.php');
    ?>
<body>

    <?php
   require_once(dirname(__FILE__). '/views/includes/header.php');
   ?>

<main class="container">
    <?php
    require_once(dirname(__FILE__). '/core/router.php');
    ?>

</main>
<?php
require_once(dirname(__FILE__). '/views/includes/footer.php');
?>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>