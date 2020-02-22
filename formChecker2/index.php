<?php
// getting all informations into new variables
$mail = $_POST['em'];
$dateOfBirth = $_POST['datum'];
$rc = $_POST['rc'];
$firstName = $_POST['meno'];
$surName =  $_POST['priezvisko'];

//splitting our name and surname into one string with dot in between
$nameAndSurname = $firstName . "." . $surName;

//length of characters that we will be checking
$numbOfChars = strlen($firstName)+strlen($surName) + 1;

//cutting whole mail just for part, that we want to check - mail.surname
$shortMail = substr($mail, 0, $numbOfChars);

//control and output
if($shortMail == $nameAndSurname)
    echo "Mail is correct!\n";
else echo "Mail is not correct\n";


//getting informations about date of birth into separated variables year-month-day
$month = date("m",strtotime($dateOfBirth));
$day = date("d", strtotime($dateOfBirth));
$year = date("y", strtotime($dateOfBirth));

//getting out informations from RC, which is always in format yy-mm-dd, so we will split to more variables by two letters
$rcYear = substr($rc, 0, 2);
$rcMonth = substr($rc, 2, 2);
$rcDay = substr($rc, 4, 2);

// womens RC got number of month +50, so we will add it
$womenRcMonth = $rcMonth + 50;

//control and output
if($year == $rcYear && ($month == $rcMonth || $month == $womenRcMonth) && $day == $rcDay) echo "RC is OK";
else echo "RC/Date of birthday are wrong!";


?>

