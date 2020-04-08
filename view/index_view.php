 <h1>Guess my number</h1>
 <p>Guess a number between 1 and 100, you have 6 guesses </p>

<form method="post">
    <input type="text" name="guess">
    <input type="hidden" name="tries" value="<?= $tries ?>">
    <input type="hidden" name="number" value="<?= $number ?>">
    <input type="submit" name="<? makeGuess()?>" value="Make a guess">
    <input type="submit" name="doInit" value="Restart">
    <input type="submit" name="doCheat" value="Cheat">
</form>
