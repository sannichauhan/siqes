<?php
    include('../config/connection.php');
	 unset($_SESSION['admin']['name']);
	 unset($_SESSION['admin']['email_id']);
     echo "<script>window.location.href='overseer.php'</script>";
?>