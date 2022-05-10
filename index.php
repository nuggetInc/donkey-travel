<?php

declare(strict_types=1);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Donkey Travel</title>
</head>

<body>
    <?php

    $page = substr(trim($_SERVER["REDIRECT_URL"], "/"), strlen("/donkey-pages/"));
    require("pages/{$page}.php");

    ?>
</body>

</html>