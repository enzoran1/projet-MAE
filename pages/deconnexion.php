<?php 
include '../inc/inc_top.php';

function redirect()
{ 
    header('Location: ../index.php');
}

session_destroy();
echo 'Vous êtes déconnecté';
ob_clean();
ob_start();
?>

<script> setTimeout(function() { <?php header('Location: ../index.php')?> }, 3000); </script>
<?php ob_end_flush();

