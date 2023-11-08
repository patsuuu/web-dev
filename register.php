
<?php

@include 'conn.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   

   $select = " SELECT * FROM hub_tbl WHERE name = '$name' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO hub_tbl(name, password) VALUES('$name','$pass')";
         mysqli_query($conn, $insert);
         
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
      form {
        border-style: solid;
  border-width: medium;
  position: relative;
  height: 333px;
  width: 25%;
  bottom: 0px;
  padding:  30px  ;
  font-size: 17px;
  line-height: 1.3;
  background-color: lightblue;
  margin-left: auto; 
  margin-right: 190px;
  margin-bottom: 200px;
}
* {
  box-sizing: border-box;
}
body {
 background-color: #f79256;
}
body {
  margin: 0;
  font-family: Timesnewroman;
  font-size: 20px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  width: 100%;
  
  
}


#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

body {
 background-color: #f79256;
}
.logo {
  background: url("../graphics/dhaka logo.png");
  padding: 0px;
  margin: 0px;
  width: 150px;
  height: 0px;
  
}
#myBtn:hover {
  background: #ddd;
  color: black;
}
      </style>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>patsuhub</title>

   <!-- custom css file link  -->
  

</head>
<body>
<center>
      <h2>Patsuhub</a></h2>
</center>
<center><br><br> <br><br> <br><br> <br>
<script>
    window.history.forward();
    function noBack() { window.history.forward(); }
</script>
   <center><br><br><br><br>
<div class="form-container">

   <form action="" method="post">
      <h3>register hub</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <center>
      <input type="text" name="name" required placeholder="enter your name">
      <center><br>
      
      <center>
      <input type="password" name="password" required placeholder="enter your password">
      <center><br>
      <center>
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <center><br>
      <center>
      
      <center><br>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>you have an account? <a href="index.php">login now</a></p>
   </form>

</div>

   </center>
</body>
</html>