<?php  
    require "../../models/users/profile_setting.php";


    session_start();
    $_SESSION["newUsername"] = $_POST["username"];
    $_SESSION["currentpassword"] = $_POST["currentpassword"];
    $_SESSION["newpassword"] = $_POST["newpassword"];
    $_SESSION["confirmpassword"] = $_POST["confirmpassword"];
    $password=$_SESSION['password'];
    $currentpassword=$_SESSION["currentpassword"]; ///
//     $hashedcurrentpassword=password_hash($currentpassword, PASSWORD_DEFAULT, array('cost' => 9));
//     $_SESSION["currentpassword"] =$hashedcurrentpassword;
//     var_dump($password);
//    var_dump($hashedcurrentpassword);
    $_SESSION["errors"] = [];
// validating username

    if (! isset($_SESSION['newUsername']) || $_SESSION["newUsername"] == "")
    {
        $_SESSION['errors']["invalidUserName"] = "Please Enter Your Username";
    }


 //compare newpass with current
// if ($password !== $hashedcurrentpassword);
// {
//     $_SESSION['errors']["itswrongPassword"] = "it is not your Password";
// }

    // validate password
if ($_SESSION["newpassword"] !== $_SESSION["confirmpassword"])
{
    $_SESSION['errors']["dontMatch"] = "Passwords don't Match";
}

if(isset($_SESSION['newpassword']))
{
    $password = $_SESSION['newpassword'];
 
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
 
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $_SESSION['errors']["invalidPassword"] = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
    } 

}else{
    $_SESSION['errors']['emptyUsername'] = "please insert username";
}
if (count($_SESSION['errors']) == 0){

 $updatedata = new updatedata($_SESSION["newUsername"], $_SESSION['password'],$_SESSION['id']);

    $updatedata->updatedata();
    header("Location:/friends/views/users/profile_setting.php");}else{
        header("Location:/friends/views/users/profile_setting.php");
    }
?>