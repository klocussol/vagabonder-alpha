<?php

//ini_set('display_errors',1); 
//error_reporting(E_ALL);
//ini_set('html_errors',1);

$name = "Kyoko";
$age = 19;
$textualAge = "";
$plural = "";
$ageArray = str_split($age);
$baseNumbers = [
	1 => "one", 
	2 => "two", 
	3 => "three", 
	4 => "four",
	5 => "five",
	6 => "six",
	7 => "seven",
	8 => "eight",
	9 => "nine",
	10 => "ten",
	11 => "eleven",
	12 => "twelve",
	13 => "thirteen",
	14 => "fourteen",
	15 => "fifteen"
];

$multipleOfTen = [
	2 => "twenty",
	3 => "thirty",
	4 => "fourty",
	5 => "fifty",
	6 => "sixty",
	7 => "seventy",
	8 => "eighty",
	9 => "ninety",
];

if ($age != 1) {
	$plural = "s";
}

if ($age > 0 && $age < 16 ) {
	$textualAge = $baseNumbers[$age];
} else if ($age >= 16 && $age <= 19) {
	$textualAge = $baseNumbers[$ageArray[1]]."teen";
} else if ($age > 19 && $age < 100) {
	$textualAge = $multipleOfTen[$ageArray[0]]." ".$baseNumbers[$ageArray[1]];
}

echo "Happy Birthday $name, you are $textualAge year".$plural." old!";
