<?php
/**
 * Index for guess Game kmom01
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

// Start session
session_name("jobj18");
session_start();

// if a session is not yet there, make one and create e new guess class in that session
if (!isset($_SESSION["guess"])) {
    $_SESSION["guess"] = new Guess();
}

// add session to variable guess...
$guess = $_SESSION["guess"];

$doInit = $_POST["doInit"] ?? null; // when clicked makeGuess() function
$doGuess = $_POST["doGuess"] ?? null; // when clicked makeGuess() function
$doCheat = $_POST["doCheat"] ?? null; // when click "Cheat", get the secret number.
$userGuess = $_POST["guess"] ?? null; // $userGuess contains guessed number by user

$number = $_POST["number"] ?? null; // get random rumber from guess class function
$tries = $_POST["tries"] ?? null; // get max guesses from guess class constructor


$_SESSION["number"] = $number; // Save random number in sessions.
$_SESSION["tries"] = $tries; // save start value in session, each time calles -1

// echo "tries: ";
// echo $_SESSION["tries"];
//
echo "number: ";
echo $_SESSION["number"];

?>

<h1>Guess my number</h1>
<p>Guess a number between 1 and 100, you have 6 guesses </p>
<form method="post">
   <input type="text" name="guess">
   <input type="hidden" name="number" value="<?= $guess->number() ?>">
   <input type="hidden" name="tries" value="<?= $guess->tries() ?>">

   <input type="submit" name="doGuess" value="Make a guess">
   <input type="submit" name="doCheat" value="Cheat">
   <input type="submit" name="doInit" value="Restart">
</form>

<?php

// if ($tries > 0) { // if user has more than 0 guesses left
if ($doGuess) : ?>
    <?php $result = $guess->makeGuess($userGuess); ?>
     <p>Your guess <?= $userGuess ?> is <b><?= $result ?></b></p>
     <p>Your have <b><?= $tries ?></b> guesses left!</p>
<?php endif; ?>

<!-- Get the Secret Random Number printed out on screen  -->
<?php if ($doCheat) : ?>
    <p>The number is <?= $number ?></p>
<?php endif;?>

<!-- Iniziate the game, get new guesses  -->
<?php if ($doInit) : ?>
    <?php session_destroy()?>
<?php endif;?>
