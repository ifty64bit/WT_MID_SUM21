<?php
$hasError = false;
$name = "";
$name_err = "";
$username = "";
$username_err = "";
$password = "";
$password2 = "";
$email = "";
$ph_number = "";
$ph_code="";
$gender = "";
$street = "";
$city = "";
$state = "";
$zip = "";
$hearAbout = [];
$bio = "";
$password_err = "";
$password2_err = "";
$email_err = "";
$ph_number_err = "";
$gender_err = "";
$address = "";
$address_err = "";
$street_err = "";
$city_err = "";
$state_err = "";
$zip_err = "";
$birth_day_err = "";
$birth_day = "";
$birth_month = "";
$birth_month_err = "";
$birth_year = "";
$birth_year_err = "";
$hearAbout_err = "";
$bio_err= "";

function hearCheck($arg)
{
    global $hearAbout;
    foreach($hearAbout as $h)
    {
        if($arg==$h){
            return true;
        }
    }
    return false;
}

if($_SERVER["REQUEST_METHOD"]=='POST')
{
    if(empty($_POST["name"]))
	{
		$hasError = true;
		$name_err = "Name Field required";
	}
    else{
        $name=$_POST["name"];
    }
            
    if(empty($_POST["username"]))
    {
        $hasError = true;
		$username_err = "Username Field required";
    }
    elseif(strlen($_POST["username"])<=6)
    {
        $hasError = true;
        $username_err="Username must Be Greater then 6 char";
    }
    elseif(strpos($_POST["username"]," ")>0)
    {   
        $hasError = true;
        $username_err="Username Can Not Contain Space";
    }
    else{
        $username=$_POST["username"];
    }

    if(empty($_POST["password"]))
    {
        $hasError = true;
        $password_err = "This Field required";
    }
    elseif(strlen($_POST["password"]>=6))
    {
        $hasError = true;
        $password_err = "Password Must Be Greater Then 6 char";
    }
    elseif(!(strpos($_POST["password"],"#")>0) and !(strpos($_POST["password"],"?")>0) and !ctype_upper($_POST["password"]) and !ctype_lower($_POST["password"]))
    {
        $hasError = true;
        $password_err = "Password Fild Require Special Char";
    }
    else{
        $password=$_POST["password"];
    }

    if($password != $_POST["password2"])
    {
        $hasError = true;
        $password2_err="Password Dose Not Match";
    }
    else{
        $password2=$_POST["password2"];
    }

    if(empty($_POST["email"])){
        $hasError = true;
        $email_err="This Field is Required";
    }
    elseif(!(strpos($_POST["email"],"@")>0) and !(strpos($_POST["email"],".")>0))
    {
        $hasError = true;
        $email_err = "Email is not Valid";
    }
    else{
        $email=$_POST["email"];
    }

    if(empty($_POST["ph_number"]))
    {
        $hasError = true;
        $ph_number_err="This Field Is Requird";
    }
    elseif(!is_numeric($_POST["ph_number"]))
    {
        $hasError = true;
        $ph_number_err="Enter Numeric Value";
    }
    else{
        $ph_number=$_POST["ph_number"];
    }

    if(empty($_POST["street"]))
    {
        $hasError = true;
        $street_err="This Field Is Requird";
    }
    else{
        $street=$_POST["street"];
    }

    if(empty($_POST["city"]))
    {
        $hasError = true;
        $city_err="This Field Is Requird";
    }
    else{
        $city=$_POST["city"];
    }

    if(empty($_POST["zip"]))
    {
        $hasError = true;
        $zip_err="This Field Is Requird";
    }
    else{
        $zip=$_POST["zip"];
    }

    if(empty($_POST["state"]))
    {
        $hasError = true;
        $state_err="This Field Is Requird";
    }
    else{
        $state=$_POST["state"];
    }
    
    if(empty($_POST["day"]) or $_POST["day"]=="day")
    {
        $hasError = true;
        $birth_day_err="This Field Is Requird";
    }
    else{
        $birth_day=$_POST["day"];
    }

    if(empty($_POST["month"]) or $_POST["month"]=="month")
    {
        $hasError = true;
        $birth_month_err="This Field Is Requird";
    }
    else{
        $birth_month=$_POST["month"];
    }

    if(empty($_POST["year"]) or $_POST["year"]=="year")
    {
        $hasError = true;
        $birth_year_err="This Field Is Requird";
    }
    else{
        $birth_year=$_POST["year"];
    }

    if(!isset($_POST["gender"]))
	{
		$hasError = true;
		$err_gender = "Gender required";
	}
	else
	{
		$gender = $_POST["gender"];
	}

    if(!isset($_POST["hearAbout"]))
	{
		$hasError = true;
		$hearAbout_err = "This part is required";
	}
	else
	{
		$hearAbout = $_POST["hearAbout"];
	}

    if(!isset($_POST["bio"]))
	{
		$hasError = true;
		$bio_err = "Bio required";
	}
	else
	{
		$bio = htmlspecialchars($_POST["bio"]);
	}

    if(empty($_POST["ph_code"])){
        $hasError=true;   
        $ph_number_err="This Field Is Required";
    }
    else{
        $ph_code=$_POST["ph_code"];
    }

    if(!$hasError)
    {
        echo $name."<br>";
        echo $username."<br>";
        echo $password."<br>";
        echo $email."<br>";
        echo $ph_code,$ph_number."<br>";
        echo $street."<br>";
        echo $city."<br>";
        echo $state."<br>";
        echo $zip."<br>";
        echo $birth_day,$birth_month,$birth_year."<br>";
        echo $gender."<br>";
        global $hearAbout;
        foreach($hearAbout as $h)
        {
            echo $h."<br>";
        }
        echo $bio."<br>";
    }
            
}
?>

<!DOCTYPE html>
<head>
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend><h1>Club Member Registration</h1></legend>
            <table align="center">
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name ?>" id="name">
                    </td>
                    <td>
                        <?php echo $name_err ?>
                    </td>
                </tr>
                <tr>
                <td>
                        Username:
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username ?>" id="username">
                    </td>
                    <td>
                        <?php echo $username_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" id="password" value="<?php echo $password ?>">
                    </td>
                    <td>
                    <?php echo $password_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Confirm Password:
                    </td>
                    <td>
                        <input type="password" name="password2" id="password2" value="<?php echo $password2 ?>">
                    </td>
                    <td>
                        <?php echo $password2_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo $email ?>">
                    </td>
                    <td>
                        <?php echo $email_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Phone:
                    </td>
                    <td>
                        <input type="text" name="ph_code" id="ph_code" placeholder="Code" value="<?php echo $ph_code ?>"> - 
                        <input type="text" name="ph_number" id="ph_number" placeholder="Number" value="<?php echo $ph_number ?>">
                    </td>
                    <td>
                        <?php echo $ph_number_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Address:
                    </td>
                    <td>
                        <input type="text" name="street" id="street" placeholder="Street Address" value="<?php echo $street ?>">
                    </td>
                    <td>
                        <?php echo $street_err ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <input type="text" name="city" id="city" placeholder="City" value="<?php echo $city ?>"> - <input type="text" name="state" id="state" placeholder="State" value="<?php echo $state ?>">
                    </td>
                    <td>
                        <?php echo $city_err ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="zip" id="zip" placeholder="Postal/Zip Code" value="<?php echo $zip ?>">
                    </td>
                    <td>
                        <?php echo $zip_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Birth Date:
                    </td>
                    <td>
                        <select name="day">
                            <option value="Day" selected disabled>Day</option>
                            <?php for($i=1;$i<=31;$i++)
                            {
                                echo "<option value=$i ".(($birth_day==$i)?'selected':"")." >$i</option>";
                            } 
                            ?>
                        </select>
                        <select name="month">
                            <option value="Month" selected disabled>Month</option>
                            <?php for($i=1;$i<=12;$i++)
                            {
                                echo "<option value=$i ".(($birth_month==$i)?'selected':"").">$i</option>";
                            } 
                            ?>
                        </select>
                        <select name="year">
                            <option value="Year" selected disabled>Year</option>
                            <?php for($i=1950;$i<=2015;$i++)
                            {
                                echo "<option value=$i ".(($birth_year==$i)?'selected':"")." >$i</option>";
                            } 
                            ?>
                        </select>
                    </td>
                    <td>
                    <?php echo $birth_day_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender
                    </td>
                    <td>
                        <input type="radio" name="gender" value="male" <?php if($gender=='male') echo "checked"; ?>>
                        <label>Male</label>
                        <input type="radio" name="gender" value="female" <?php if($gender=='female') echo "checked"; ?>>
                        <label>Frmale</label>
                    </td>
                    <td>
                        <?php echo $gender_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Where did you hear about us?
                    </td>
                    <td>
                        <input type="checkbox" name="hearAbout[]" id="frnd" value="friend" <?php if(hearCheck("friend")) echo "checked"?>>
                        <label for="frnd">A Friend or Colleague</label> <br>
                        <input type="checkbox" name="hearAbout[]" id="google" value="Google" <?php if(hearCheck("Google")) echo "checked"?>>
                        <label for="google">Google</label> <br>
                        <input type="checkbox" name="hearAbout[]" id="blog" value="blog_post" <?php if(hearCheck("blof_post")) echo "checked"?>>
                        <label for="blog">Blog Post</label> <br>
                        <input type="checkbox" name="hearAbout[]" id="news" value="news" <?php if(hearCheck("news")) echo "checked"?>>
                        <label for="news">News Article</label>
                    </td>
                    <td>
                        <?php echo $hearAbout_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Bio
                    </td>
                    <td>
                        <textarea name="bio"><?php echo $bio ?></textarea>    
                    </td>
                    <td>
                        <?php echo $bio_err ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <input type="submit" value="Submit">
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>