<?php




session_start();
session_destroy();

echo"<script>
alert('Te has desconectado')
window.location.href='index.php'
</script>";





?>