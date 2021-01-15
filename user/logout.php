<?php
SESSION_START();
SESSION_DESTROY();
header("location: /GANNA/user/home.php?logout=true");
exit;
?>


