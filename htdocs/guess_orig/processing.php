<?php

/**
 * Destroy the session.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");
session_name("viri19");
session_start();
if ($_POST["submit"] === "Guess") {
    try {
        $_SESSION["status"] = $_SESSION["game"]->makeGuess($_POST["guess"]);
    } catch (GuessException $e) {
        $_SESSION["status"] = "Guess out of bounds";
    }
} elseif ($_POST["submit"] === "Restart") {
    session_unset();
    $game = new Guess();
    $_SESSION["game"] = $game;
} elseif ($_POST["submit"] === "Cheat") {
    $_SESSION["cheat"] = $_SESSION["game"]->number();
}

var_dump($_POST);

var_dump($_SESSION["status"]);

header("Location: index.php");
