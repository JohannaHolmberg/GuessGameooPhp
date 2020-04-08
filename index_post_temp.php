<?php
/**
 * Index for guess Game kmom01
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

// Start session
session_name("jobj18");
session_start();
//session_destroy();


// Alla värden som lagras i den inbyggda och globala arrayen $_SESSION kan minnas mellan sidanrop.

// if a session is not yet there, make one and create e new guess class in that session
if (!isset($_SESSION["guess"])) {
    $_SESSION["guess"] = new Guess();
}

// add session to variable guess...
$guess = $_SESSION["guess"];

// echo "<pre>";
// var_dump($guess);

// understand above - - - - - - - - - - - - - - - - - - - - - - - -

echo"tries:";
var_dump($guess->tries());


// $number     = $_POST["number"] ?? null;
// $tries      = $_POST["tries"] ?? null;
// $guess      = $_POST["guess"] ?? null;
// $doInit     = $_POST["doInit"] ?? null;

// when clicking the button "Guess", you check the gueesed against the secret number
// $doGuess the variable contains the guessed number by the user
$doGuess = $_POST["doGuess"] ?? null;
// var_dump($doGuess);
// when clicking the button "Cheat", you get the secret number.
$doCheat = $_POST["doCheat"] ?? null;


// $_SESSION["tries"] = $tries;

// $_SESSION["tries"] -= 1;
//
// $number = $guess->number();
//
// create function tries in guess.php
// $tries = $guess->tries();




?>

<h1>Guess my number</h1>
<p>Guess a number between 1 and 100, you have 6 guesses </p>

<form method="post">
   <input type="text" name="guess">
   <input type="hidden" name="number" value="<?= $number ?>">
   <input type="hidden" name="tries" value="<?= $tries ?>">
   <input type="submit" name="doGuess" value="Make a guess">
   <input type="submit" name="doInit" value="Restart">
   <input type="submit" name="doCheat" value="Cheat">
</form>


<?php
// echo "<pre>";
// var_dump($doGuess);
// var_dump($_POST);
if ($doGuess) : ?>
    <?php $result = $guess->makeGuess($doGuess); ?>
     <p>Your guess is <b><?= $result ?></b></p>
<?php endif; ?>

<?php if ($doCheat) : ?>
    <p>The number is <?= $guess->number() ?></p>
<?php endif; ?>

<?php
    // echo"tries:";
    // var_dump($guess->tries());
?>
<!-- //require __DIR__ . "/view/index_view.php";?> -->
