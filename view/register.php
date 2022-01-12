<!DOCTYPE html>
<html>
<head>
  <title>SIGN UP</title>
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="styleregister.css">
 <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</head>


 <!-- <link rel="stylesheet" type="text/css" href="styleregister.css"> -->
<!-- <title>Sign Up</title> -->
<form action="action_page.php">
    <div class="container">
        <h1>SIGN UP</h1>
            <p>Please fill in this form to create an account</p>
            <hr>

            <label for="email"><b>Email</b>
</label>
<input type="text" placeholder="Enter Email" name="email" id="email" required>
<label for="password"><b>Password</b>
</label>
<input type="password" placeholder="Enter Password" name="psw" id="psw" required>
<label for="psw-repeat">
    <b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
</div>

<div class="container signin">
    <p>Already have an account?<a href="login.php">Sign In</a>.</p>
</div>
</form>



<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>


