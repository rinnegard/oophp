<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Guess</title>
    </head>
    <body>
        <h1>Guess the number</h1>
        <p>You have <?= $_SESSION["game"]->tries() ?> tries remaining</p>
        <form  action="processing" method="post">
            <input type="number" name="guess" >
            <input type="submit" name="submit" value="Guess">
            <input type="submit" name="submit" value="Restart">
            <input type="submit" name="submit" value="Cheat">
        </form>
        <?php if (isset($_SESSION["status"])) : ?>
        <p><?= $_SESSION["status"] ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION["cheat"])) : ?>
        <p>The correct answer is: <?= $_SESSION["cheat"] ?></p>
        <?php endif; ?>
    </body>
</html>
