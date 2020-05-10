<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init the game and redirect to play the game
 */
$app->router->get("guess/init", function () use ($app) {
    // Init the session for the gamestart
    $game = new Viri\Guess\Guess();
    session_unset();
    $_SESSION["game"] = $game;
    return $app->response->redirect("guess/play");
});



/**
 * Play the game
 */
$app->router->get("guess/play", function () use ($app) {
    $title = "Play the game";
    $data = [
        "who" => "Mumintrollet",
    ];

    $app->page->add("guess/play", $data);
    $app->page->add("guess/debug", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Play the game
 */
$app->router->post("guess/processing", function () use ($app) {
    $title = "Play the game";
    if ($_POST["submit"] === "Guess") {
        try {
            $_SESSION["status"] = $_SESSION["game"]->makeGuess($_POST["guess"]);
        } catch ( Viri\Guess\GuessException $e) {
            $_SESSION["status"] = "Guess out of bounds";
        }
    } elseif ($_POST["submit"] === "Restart") {
        session_unset();
        $game = new Viri\Guess\Guess();
        $_SESSION["game"] = $game;
    } elseif ($_POST["submit"] === "Cheat") {
        $_SESSION["cheat"] = $_SESSION["game"]->number();
    }
    return $app->response->redirect("guess/play");
});
