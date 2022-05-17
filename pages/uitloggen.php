<?php

unset($_SESSION["customerID"]);

header("Location: " . ROOT_DIR);
exit;
