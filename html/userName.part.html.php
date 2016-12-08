<?php
require_once '../lib/checksession.lib.php';

$user = getUserSession();

?>
<div>Bonjour <span><?php echo $user["firstName"] ?></span> <span><?php echo $user["lastName"] ?></span></div>

