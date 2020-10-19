 <?php
   include_once("header.php");
  session_destroy();
        $_SESSION['User']=array();
        ?>
         <script>
                 location.href='index.php';
                 </script>
         