<?php
/*session_start();
session_destroy();

header("Location: login.php");
exit;

echo "<script>
alert('Anda berhasil logout');
window.location='login.php';
</script>";
?>*/


session_start();
session_destroy();

setcookie("username", "", time() - 3600, "/");

header("Location: login.php?logout=1");
exit;
?>