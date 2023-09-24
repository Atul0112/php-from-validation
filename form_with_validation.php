<html>

<head>
    <style>
    .mand {
        color: #D30000
    }

    ;
    </style>
</head>

<body>

    <?php

$nameError = $emailError = "";
$name  = $email = $message = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["name"])){
        $nameError = "Name is mandatory";
    }else{
        $name = test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
                $nameError = "Only letters are allowed";
        }
    }

    if(empty($_POST["email"])){
        $emailError = "email is mandatory";
    }else{
        $email = test_input($_POST["email"]);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailError = "invalid email format";
        }
   }

   if(empty($_POST["message"])){
    $message = "";
   }else{
    $message = test_input($_POST["message"]);
   }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   }

?>



    <h2><u>PHP FORM WITH VALIDATION</u></h2>

    <p class="mand">* is mandatory</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        Name : <input type="text" name="name">
        <span class="mand">*<?php echo $nameError;?></span><br><br>

        Email : <input type="email" name="email">
        <span class="mand">* <?php echo $emailError;?></span><br><br>

        Message : <textarea name="message" cols="30" rows="10"></textarea><br><br>

        <input type="Submit">

    </form>

    <?php

echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $message;

?>

</body>

</html>