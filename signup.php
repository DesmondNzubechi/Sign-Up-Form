<?php 
require_once 'database.php';

$firstNameErr = $lastNameErr = $pError = $emailExis = $usernameExist = $inputsErr = $dateErr = $usernameErr = $emailErr = $passwordErr = $rpasswordErr = '';
$firstN = $lastN  = $userN = $emailN = $passwordN = $rpasswordN = '';


if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $date = $_POST['date'];

    $protectPword = password_hash($password, PASSWORD_DEFAULT);
    


    $firstN = $firstname;
    $lastN = $lastname;
    $userN = $username;
    $emailN = $email;
    $passwordN = $password;
    $rpasswordN = $rpassword;
    $emailN = $email;

if (empty($firstname) && empty($lastname) && empty($username) && empty($email) && empty($rpassword) && empty($password) && empty($email) && !filter_var($email, FILTER_SANITIZE_EMAIL) ) {
   
    $inputsErr = 'Kindly fill the input fields';
} elseif(empty($firstname)){
$firstNameErr = 'Enter First Name';
}elseif(empty($lastname)){
    $lastNameErr = 'Enter Last Name';
}elseif(empty($username)){
    $usernameErr = 'Enter Username';
}elseif(empty($email)){
    $emailErr = 'Enter Email';
}elseif(empty($password)){
    $passwordErr = 'Enter Password';
}elseif(empty($rpassword)){
    $rpasswordErr = 'Kindly Confirm Password';
}elseif($password !== $rpassword){
    $pError = 'Password Does Not Match';
}elseif(!filter_var($email, FILTER_SANITIZE_EMAIL)){
    $emailErr = 'Invalid Email';
} elseif(empty($date)) {
    $dateErr = 'Enter date of birth';
} else {
  $sql;
    if ($conn) {
        # code...
        $sql = "SELECT * FROM `users` WHERE username='$username'";
       $result = mysqli_query($conn, $sql);
   if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
       $usernameExist = 'Username Already exist';

    } else {
      $sql = "INSERT INTO `users`(username, useremail, firstname, lastname, userpassword, birthday)
      VALUES('$username', '$email', '$firstname', '$lastname', '$protectPword', '$date')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        header('Location: /OOP_PHP/index.php');
      } else {
       die(mysqli_error($conn));
      }
      
    }
    
   } 
   

    }

}


} 


?>


<?php include_once('header.php') ?>
<div class='flex justify-center'>

<form  class="shadow-2xl bg-[#fff]  rounded-xl py-[20px] px-[20px] my-[50px]" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

<h1 class="text-[23px] text-slate-900  uppercase font-[700] text-center my-[10px]">Sign Up Here</h1>
<pan class=' text-[red] text-[20px] font-[500] '><?php echo $inputsErr  ?></span>
<div >
<input type="text" value='<?php echo $firstN ; ?>' class='border border-sky-500 text-slate-900 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px]' name="firstname" placeholder='First Name' id="">
<br><pan class=' text-[red] text-[20px] font-[500] '><?php echo $firstNameErr  ?></span>
</div>

<div >
<input type="text" value='<?php echo $lastN ; ?>' class='border text-slate-900  border-sky-500 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px]' name="lastname" placeholder='Last Name' id="">
<br><pan><?php echo $lastNameErr  ?></span>
</div>

<div >
<input type="text" value='<?php echo $userN ; ?>' class='border border-sky-500 text-slate-900 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px]' name="username" placeholder='Username' id="">
<br><pan class=' text-[red] text-[20px] font-[500] '><?php echo $usernameErr  ?></span>
<pan class=" text-[red] text-[20px] font-[500] "><?php echo $usernameExist  ?></span>

</div>


<div>
<input type="email" value='<?php echo $emailN ; ?>' class='border text-slate-900 border-sky-500 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px]' name="email" placeholder='Email address' id="">
<br><pan class=" text-[red] text-[20px] font-[500] "><?php echo $emailErr  ?></span>
<pan class=" text-[red] text-[20px] font-[500] "><?php echo $emailExis  ?></span>

</div>


<div>
<input type="date" value='<?php echo $dateN ; ?>' class='border text-slate-900 border-sky-500 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px] w-full' name="date" placeholder='Date of Birth' id="">
<br><pan class=" text-[red] text-[20px] font-[500] "><?php echo $dateErr  ?></span>
</div>

<div>
<input type="password" value='<?php echo $passwordN ; ?>' class='border text-slate-900 border-sky-500 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px]' name="password" placeholder='Password' id="">
<br><pan class=' text-[red] text-[20px] font-[500] '><?php echo $passwordErr  ?></span>
<pan class=' text-[red] text-[20px] font-[500] '><?php echo $pError  ?></span>
</div>

<div>
<input type="password" value='<?php echo $rpasswordN ; ?>' class='border text-slate-900 border-sky-500 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px]' name="rpassword" placeholder='Repeat Password' id="">
<br><pan class=' text-[red] text-[20px] font-[500] '><?php echo $rpasswordErr  ?></span>
<pan class=' text-[red] text-[20px] font-[500] '><?php echo $pError  ?></span>

</div>

<input type="submit" name="submit" class='bg-sky-500 w-full  text-[#fff] text-center focus:border-gray-700 border text-center my-[10px] text-[25px] outline-none rounded-[5px] p-[5px]' value="Sign Up">
</form>
</div>
<?php include_once('footer.php') ?>




