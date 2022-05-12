<?php

unset($_SESSION["user"]);

header("Location: " . ROOT_DIR);
exit;
