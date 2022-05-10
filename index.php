<?php

declare(strict_types=1);

require_once("environment.php");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Donkey Travel</title>
</head>

<body>
    <?php

    $page = substr(trim($_SERVER["REDIRECT_URL"], "/"), strlen(ROOT_DIR));
    require("pages/{$page}.php");

    ?>
</body>

</html>