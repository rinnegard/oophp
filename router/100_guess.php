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
