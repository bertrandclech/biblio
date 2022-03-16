<?php

// Autoload
spl_autoload_register(function ($className) {
    require_once  'classes' . DIRECTORY_SEPARATOR . $className . '.class.php';
});
