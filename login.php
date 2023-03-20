
<?php 

$passwordErr = $emailErr = '';

require_once 'database.php';

if (isset($_POST['submit'])) {
    # code...
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
       $emailErr = 'Please enter email';
    } elseif(filter_var($email, FILTER_SANITIZE_EMAIL)) {
        $emailErr = 'Invalid Email';
    } elseif(empty($password)) {
        $passwordErr = 'Please Input Password';
    } else {
        $sql = "SELECT FROM `users` WHERE username='$email' and userpassword='$password'";
        $result = mysqli_query($conn, $sql);
      if ($result) {
        # code...
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            # code...
            header('Location: /OOP_PHP/index.php');
        } else{
            $passwordErr = 'Make Sure Your Password Is Correct';
            $emailErr = 'Make Sure Your Email Is Correct ';
            }
      }
    }
    



}

?>


<?php include_once('header.php') ?>
<div class='flex justify-center'>

<form  class="shadow-2xl bg-[#fff] rounded-xl py-[20px] px-[20px] my-[50px]" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

<h1 class="text-[23px] uppercase font-[700] text-center my-[10px]">Login Here</h1>

<div class='w-full'>
<input type="email" class='border w-full border-sky-500 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px]' name="email" placeholder='Email Address' id="">
<br><pan class=" text-[red] text-[20px] font-[500] "><?php echo $emailErr  ?></span>
</div>
<div>
<div class='w-full'>
<input type="password" class='border w-full border-sky-500 text-center my-[10px] text-[20px] outline-none rounded-[5px] p-[5px]' name="password" placeholder='Password' id="">
<br><pan class=' text-[red] text-[20px] font-[500] '><?php echo $passwordErr  ?></span>
</div>
<div class='w-full'>
<input type="submit" class='bg-sky-500 w-full    text-[#fff] text-center focus:border-gray-700 border text-center my-[10px] text-[25px] outline-none rounded-[5px] p-[5px]' value="Login">

</div>
</form>
</div>
<?php include_once('footer.php') ?>





