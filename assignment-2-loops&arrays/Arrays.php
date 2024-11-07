<?php

/* 
1. display the colors in the following way :
green

red 

white
*/
$color = array('white', 'green', 'red');
echo $color[1]."<br><br>";
echo $color[2]."<br><br>";
echo $color[0]."<br><br>";


// 2. displays the capital and country name from the above array $ceu. Sort the list by the capital of the country.
$ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", 
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", 
"Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", 
"Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", 
"Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", 
"United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius",
 "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", 
 "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;

asort($ceu);
foreach ($ceu as $country => $capital) {
    echo "The capital of $country is $capital <br>";
}


/*
3. Delete an element from the above PHP array. After deleting the element, integer keys must be normalized.
Sample Output :
array(5) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) } 
array(4) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(5) }
*/
$x = array(1, 2, 3, 4, 5);
var_dump($x);
unset($x[3]);
$x = array_values($x);
var_dump($x);

/*
4. get the first element of the above array.
Expected result : white
*/
$color = array(4 => 'white', 6 => 'green', 11=> 'red');
$first_color = reset($color);
echo $first_color;

/*
5. inserts a new item in an array in any position.
Expected Output :
Original array : 
1 2 3 4 5 
After inserting '$' the array is :
1 2 3 $ 4 5 
*/
$arr = [1, 2, 3, 4, 5];
array_splice($arr, 3, 0, "$");
print_r($arr);


// 6. sort the following associative array in :
$arr = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");

// a) ascending order sort by value
asort($arr);
var_dump($arr);

// b) ascending order sort by Key
ksort($arr);
var_dump($arr);

// c) descending order sorting by Value
arsort($arr);
var_dump($arr);

// d) descending order sorting by Key
krsort($arr);
var_dump($arr);


/*
7. merge (by index) the following two arrays.
Sample arrays :
$array1 = array(array(77, 87), array(23, 45));
$array2 = array("w3resource", "com");
Expected Output :
*/
$arr1 = array(array(77, 87), array(23, 45));
$arr2 = array("w3resource", "com");
$res = [];
foreach ($arr1 as $key => $value) {
    $res[] = array_merge([$arr2[$key]], $value);
}
print_r($res);


/*
8. change the following array's all values to upper or lower case.
Sample arrays :
$Color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');
Expected Output :
Values are in lower case.
Array ( [A] => blue [B] => green [c] => red ) 
Values are in upper case.
Array ( [A] => BLUE [B] => GREEN [c] => RED )
*/
$color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');
// to lower
foreach ($color as $key => $value) {
    $color[$key] = strtolower($value);
}
print_r($color);

//to upper
foreach ($color as $key => $value) {
    $color[$key] = strtoupper($value);
}
print_r($color);


/*
9 . get the shortest/longest string length from an array.
Sample arrays : ("abcd","abc","de","hjjj","g","wer")
Expected Output : The shortest array length is 1. The longest array length is 4
*/
$arr = array("abcd","abc","de","hjjj","g","wer");
$minLength = PHP_INT_MAX;
$maxLength = 0;
foreach($arr as $element) {
    if (strlen($element) < $minLength) {
        $minLength = strlen($element);
    }
    if (strlen($element) > $maxLength) {
        $maxLength = strlen($element);
    }
}
echo "the shortest array length is $minLength.";
echo "the longest array length is $maxLength.";


// 10 . Write a PHP script to trim all the elements in an array using array_walk function.
$arr = ["  Hello  ", "  World  ", "  PHP  "];
array_walk($arr, function ($element) {
    $element = trim($element);
});
print_r($arr);


/*
11 . Write a PHP program to remove duplicate values from an array 
which contains only strings or only integers.
*/
$arr = [1,2,3,3,4,4,5,5,5];
$res = [];
foreach ($arr as $value) {
    if (!in_array($value, $res)) {
        $res[] = $value;
    }
}
print_r($res);


// 12 . Write a PHP script to remove all white spaces in an array.
$arr = ["  Hello World  ", "  PHP  "];
array_walk($arr, function(&$element) {
    $element = preg_replace("/ /", "", $element);
});
print_r($arr);


/*
13 . Write a PHP script to combine (using one array for keys and 
another for its values) the following two arrays.
('x', 'y', 'y'), (10, 20, 30)
*/
$keys = ['x', 'y', 'z'];
$values = [10, 20, 30];
$res = [];
if (count($keys) === count($values)) {
    $res = array_combine($keys, $values);
}
print_r($res);


// 14 . How to check if an array is a subset of another in PHP?
$mainArray = [1, 2, 3, 4, 5];
$secondArray = [2, 5];
$isSubset = empty(array_diff($secondArray, $mainArray));
echo $isSubset ? "subset" : "not a subset";


// 15 . Write a PHP program to copy all elements from an array to another array.
$arr = [1, 2, 3, 4, 5];
$copyArr = [];
foreach ($arr as $value) {
    $copyArr[] = $value;
}
print_r($copyArr);


// 16 . Write a PHP program to merge two array to third array.
$arrOne = [1, 2, 3, 4, 5];
$arrTwo = [6, 7, 8, 9, 10];
$arrThree = [];
foreach ($arrOne as $value) {
    $arrThree[] = $value;
}
foreach ($arrTwo as $value) {
    $arrThree[] = $value;
}
print_r($arrThree);


// 17 :
$result = [];
$numbers = ["one", "two", "three", "four"];
$roman = ['I', 'II', 'III', 'IV'];
$arabic = [1, 2, 3, 4];
for ($i = 0; $i < count($numbers); $i++) {
    $result['Roman'][$numbers[$i]] = $roman[$i];
    $result['Arabic'][$numbers[$i]] = $arabic[$i];
}
print_r($result);


// 18 . combine three input fields into one input field :
$orgArr = [
    'desciplines' => [
        'program test',
        'program test 2',
    ],
    'program_descriptions' => [
        'program desc',
        'program desc 2',
    ],
    'fees' => [
        'fees 1',
        'fees 2',
    ],
];
$res = [];
for ($i = 0; $i < 2; $i++) {
    $res[] = [
        'name' => $orgArr['desciplines'][$i],
        'program_descriptions' => $orgArr['program_descriptions'][$i],
        'fees' => $orgArr['fees'][$i],
    ];
}
print_r($res);


// 19 :



// 20 . Signup and login using associative array
$users = [];
function signup($username, $password) {
    if (isset($users[$username])) {
        return "Username already exists!";
    }
    $users[$username] = $password;
    return "Signup successful! Welcome";
}
function login($username, $password) {
    if (!isset($users[$username])) {
        return "Invalid username or password.";
    }
    if ($password == $users[$username]) {
        return "Login successful! Welcome back, $username.";
    } else {
        return "Invalid username or password.";
    }
}