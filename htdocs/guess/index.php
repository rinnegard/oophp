<?php

/**
 * Destroy the session.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");
session_name("viri19");
session_start();

if (!isset($_SESSION["game"])) {
    $game = new Guess();
    $_SESSION["game"] = $game;
}



require(__DIR__ . "/view/index.php");
