<?php 

// 1. PHP Script to Add All Integers Between 0 and 30
$sum = 0;
for ($i = 0; $i <= 30; $i++) {
    $sum += $i;
}
echo "The total sum is: $sum";


// 2. PHP Script to Count 't' Characters in the Text "techstudy"
$text = "techstudy";
$count = 0;
for ($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] == 't') {
        $count++;
    }
}
echo "Total 't' characters: $count";


// 3. PHP Script to Convert Lowercase String to Uppercase
$text = "techstudy";
$uppercaseText = "";
for ($i = 0; $i < strlen($text); $i++) {
    if (ord($text[$i]) >= 97 && ord($text[$i]) <= 122) {
        $uppercaseText .= chr(ord($text[$i]) - 32);
    } else {
        $uppercaseText .= $text[$i];
    }
}
echo $uppercaseText;


// 4. Extract the user name from the email ID:
$email = "user@email.com";
$username = "";

for ($i = 0; $i < strlen($email); $i++) {
    if ($email[$i] == '@') {
        break;
    }
    $username .= $email[$i];
}
echo "Username: $username";


// 5. Get the last three characters of a string:
$text = "techstudy";
$last_three = "";
for ($i = strlen($text) - 3; $i < strlen($text); $i++) {
    $last_three .= $text[$i];
}
echo "Last three characters: $last_three";


// 6. Replace the first ‘the’ with ‘best’:
$text = "the sun is bigger than the moon";
$len = strlen($text);
$word = "best";
$new_text = "";
for ($i = 0; $i <= $len - 3; $i++) {
    if ($i == 0 && substr($text, $i, 3) == "the") {
        $str = substr($text, $i + 3);
        $new_text = $word.$str;
        break;
    }
    elseif ($i == $len - 3 && substr($text, $i, 3) == "the") {
        $str = substr($text, 0 , $len - ($len - $i));
        $new_text = $str.$word;
        break;
    }
    elseif (substr($text, $i, 3) == "the") {
        $str1 = substr($text, 0, $len - ($len - $i));
        $str2 = substr($text, $i + 3);
        $new_text = $str1 . $word . $str2;
        break;
    }
}
echo $new_text;


// 7. Remove a part of a string from the beginning:
$text = "remove part from the beginning";
$removed_length = 7;
$new_text = "";
for ($i = $removed_length; $i < strlen($text); $i++) {
    $new_text .= $text[$i];
}
echo $new_text;


// 8. Remove comma(s) from the following numeric string:
$number = "1,234,567";
$new_number = "";
for ($i = 0; $i < strlen($number); $i++) {
    if ($number[$i] != ',') {
        $new_number .= $number[$i];
    }
}
echo $new_number;


// 9. Get the first word of a sentence:
$text = "get the first word";
$first_word = "";
for ($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] == " ") {
        break;
    }
    $first_word .= $text[$i];
}
echo $first_word;


// 10. Convert the given string into an array:
$text = "Burch Jr, Philip H., The American es";
$word = "";
$arr = [];
for($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] == " ") {
        $arr[] = $word;
        $word = "";
        continue;
    }
    elseif ($text[$i] == ',') {
        continue;
    }
    $word .= $text[$i];
}
$arr[] = $word;
var_dump($arr);


// 11. Print all alphabets from a to z using a while loop:$char = 'a';
$char = 'a';
while ($char != 'z') {
    echo $char . " ";
    $char++;
}
echo $char;


// 12. Find first and last digit of a number:
$number = 12345;
$number = (string)$number;
echo "first digit = " . $number[0] . "\nlast digit = " . $number[-1];


// 13. Find sum of first and last digit of a number:
$number = 12345;
$number = (string)$number;
echo "sum = " . $number[0] + $number[-1];


// 14. Swap first and last digits of a number:
$number = 12345;
$number = (string)$number;
echo $number[-1] . substr($number, 1, strlen($number)- 2) . $number[0];


// 15. Check whether a number is palindrome or not:
$number = 12321;
$number = (string)$number;
$left = 0;
$right = strlen($number) - 1;
$palindrome = true;
while ($left != $right) {
    if ($number[$left] != $number[$right]) {
        $palindrome = false;
        break;
    }
    $left++;
    $right--;
}
echo $palindrome ? "yes" : "no";


// 16. Convert Octal to Binary number system:
$octal = "10"; 
$decimal = 0;
$binary = ""; 
$length = strlen($octal);
for ($i = 0; $i < $length; $i++) {
    $decimal += (int)($octal[$i]) * (8 ** ($length - $i - 1));
}
while ($decimal > 0) {
    $binary = ($decimal % 2) . $binary;
    $decimal = (int)($decimal / 2);
}
echo "Binary: " . $binary;