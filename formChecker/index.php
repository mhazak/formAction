<?php

//what we will do with input text (uppercase or just capitals)
$answer = $_POST["action"];

//taking input text
$text = $_POST['input'];

//couting of chars without white spaces
$numbOfChars = preg_replace("/[^A-Za-z]/","",$text);

//editing the text to upper case or capitals
if($answer == "charUppCase") echo strtoupper($_POST["input"]);
if($answer == "wordUppCase") echo ucwords($_POST['input']);

//result of ...
echo "\nNumber of words: " . str_word_count($text);
echo "\nNumber of chars used: " . strlen($numbOfChars)."\n";

//taking all the words used in input to the array, every word is separated when white space is spotted
$words  = explode(' ', $text);

//this was making trouble for counting the smallest word, so it is solution.
array_pop($words);

//creating map
$pokus = array_map('strlen', $words);

//finding the number of max and min length of word
$short = min($pokus);
$long = max($pokus);


$longestWord = "";
$longestWordLength = 0;

$minWordLength = $long;
$kratke = "";

//loop is going through whole array and looking for max word
foreach ($words as $word) {
    if (strlen($word) > $longestWordLength) {
        $longestWordLength = strlen($word);
        $longestWord = $word;
    }

    //looking for min word
    if (strlen($word) < $minWordLength) {
        $minWordLength = strlen($word);
        $kratke = $word;
    }
}

// output
echo "The shortest word used: " . $kratke . "\n";
echo "The longest word used: " . $longestWord . "\n";

?>

