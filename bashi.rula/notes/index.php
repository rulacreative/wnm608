

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>



<?php
    // Output text
    echo "<div>Hello World</div>";
    echo "<div>Goodbye World</div>";

    // Variables
    $a = 5;

    echo $a;




    // String Interpolation (using double vs single quotes)
    echo "<div>I have $a things</div>";   // Works — variable inside double quotes
    echo '<div>I have $a things</div>';   // Shows $a as text, not number




    // Numbers
    $b = 15;       // Integer
    $b = 0.576;    // Float
    $b = 10;       // Reassign variable

    // String
    $name = "Yerguy2";

    // Boolean
    $isOn = true;




    // Math
    // PEMDAS — parentheses, exponents, multiplication, division, addition, subtraction (This mean the order it would work- to make the addition work before the moltiplication we add parantheses)
    echo (5 - 4) * 2;





    // Concatenation (joining text)

    echo "<div>b + a = c</div>";
    echo "<div>$b + $a = " . ($a + $b) . "</div>";


?>





<hr>
<div>This is my name </div>

<div>

<?php

    $firstname = "Rula";
    $lastname = "Bashi"; 
    $fullname = "$firstname $lastname";
 

    echo $fullname;

?>

<hr> 
<?php


    // superglobal
    // ?name=Lolo 
    echo "<a href='?name=Lolo'>visit</a><br>";
    echo "<div>My name is {$_GET['name']} </div>";



    // ?name=Lolo&type=textarea
    echo "<a href='?name=Lolo&type=textarea'></a>";
    echo "<{$_GET['type']}>My name is {$_GET['name']}</{$_GET['type']}>";
?>
 
 
<hr>
<?php
    // Array 

    $colors = array ("red","green","blue");

    echo $colors[0];


    echo "
    <br>$colors[0]
    <br>$colors[1]
    <br>$colors[2]


    ";

    echo count ($colors);

?>


<div style="color:<?= $colors[1] ?>">
    This color is green 
</div>


<hr>
<?php
    // Associative Array 
    $colorsAssociative = [
        "red"=> "#f00",
        "green"=> "#0f0",
        "blue"=> "#00f"
    ];

    echo $colorsAssociative ['green'];
?>



<hr>
<?php

    // Casting

    $c = "$a";
    $d = $c * 1;

    // Convert associative array to object
    $colorsObject = (object)$colorsAssociative;

    // echo $colorsObject; // would give “Object” (as we can’t echo objects directly)

    echo "<hr>";

    // Array Index Notation
    echo $colors[0]."<br>";  // prints first color (e.g. red)
    echo $colorsAssociative['red']."<br>";  // prints #f00
    echo $colorsAssociative[$colors[0]]."<br>"; // this is to look up “red” key from $colorsAssociative

    // Object Property Notation
    echo $colorsObject->red."<br>"; // to print value of property “red” in object

    echo $colorsObject->{$colors[0]}."<br>"; // this uses variable property name (value of $colors[0])


?>

<hr>

<?php

print_r($colors);
echo "<hr>";

print_r($colorsAssociative);
echo "<hr>";

echo "<pre>", print_r($colorsObject), "</pre>";


// Function
function print_p($v) {
    echo "<pre>", print_r($v), "</pre>";
}

print_p($_GET);

?> 


 
</body>
</html>