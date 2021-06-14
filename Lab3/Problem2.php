<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem 2</title>
</head>
<body>
    <?php
        $marks=90;
        if($marks>=90){ 
            echo"Your Grade is A+";
        }
        else if($marks>=80 and $marks<90){
            echo"Your Grade is A";
        }
        else if($marks>=70 and $marks<80){
            echo"Your Grade is B";
        }
        else if($marks>=60 and $marks<70){
            echo"Your Grade is C";
        }
        else{
            echo"Your Grade is F";
        }
    ?>
</body>
</html>