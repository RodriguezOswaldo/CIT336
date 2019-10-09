<?php
//some variables
$net = 0;
$title ="PHP Variables";
$flag = TRUE;
$amount = 99.99;
$pets = array(Dog,Cat, Fish, Mouse);
$userName = "TheMan";
// the dot (.) is the concatenation operator.
echo "The user name is: ". $theMan; 
//This example does the exact same thing
echo "The user name is: $theMan";


//More examples
$city = 'London';
$subtotal = 124550;
$salesTax = $subtotal * .06; //The results of

//Objects
$link = new PDO($dsn, $userName, $password);

//Arrays
$addres = ['1245 Maple Avenue', 'Springfield', 'IL'];

$emailAddres = 'myname@email.com';
echo gettype($emailAddress);

//Literals
$fullName = 'Kula Robertson';

//Interpolation
$fullanem = "Kyla Robertson";
?>


<?php
//More Arrays
//Indexed Array
$cars = array("Volvo", "BMW", "Toyota");
echo "I like $cars[0], $cars[1], $cars[2]";
//Get the length on an array
echo count($cars);

//Loop through the Array
$names = array("Lucas", "Lyon", "Mister", "Goody");
$arrlength = count($names);

for($x = 0; $x < $arrlength; $x++){
    echo $cars[$x];
    echo "<br>";
}

//Associative Arrays
$age = array("Peter"=>"35", "Ben"=>"37", "JOse"=>"40");
echo "Peter age is: " .$age['Peter'];


//Loop associative arrays
foreach ($age as $x => $x_value){
    echo "Key=" .$x . ", Value=". $x_value;
    echo "<br>";
}

//SORT ARRAYS
$colors = array("red", "green", "blue", "yellow");
sort($colors);
esort($colors);
rsort($colors);

?>

<?php
//if Statements
$a = 10;
$b = $a++;
if($a > $b){
    echo "a is bigger than b";
} else {
    echo "a is not greater than b";
}

if($a < $b){
    echo "a is lesser thab b";
    $b = $a;
}

if($a > $b){
    echo "a is bigger than b";
}elseif($a == $b){
    echo "a is equal to b";
}else{
    echo "a is smaller than b";
}


//Switch
$i = 2;
switch($i){
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    }

switch($i){
    case "apple":
        echo "i is apple";
        break;
    case "bar":
        echo "i is bar";
        break;
    case "cake":
        echo "i is cake";
        break;
}

switch($lemonade){
    case 'pink':
    case 'regular':
    case 'cherry':
        echo 'Good choice';
    break;
    default;
        echo 'Please make a new Selection';
    break;
}

?>