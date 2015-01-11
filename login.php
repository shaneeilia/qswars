<?php
include './includes/engine.php';
$engine = new engine();

$email = $engine->clean($_POST['email']);
$password = $engine->clean($_POST['password']);

if(isset($_SESSION['email'])) {
    if ($engine->verifysession()) {
        header('Location: ./index.php');
        die();
    } else {
        session_destroy();
        header('Location: ./login.php');
        die();
    }
}



    if(isset($_POST['email'],$_POST['password'])){
        if(!empty($_POST['email']) && !empty($_POST['password'])){

            $sql = mysqli_query($engine->db, "SELECT * FROM members WHERE email='$email' LIMIT 1");
            $count = mysqli_num_rows($sql);
                if($count == 1){
                    $row = mysqli_fetch_assoc($sql);
                        $dbpassword = $row["password"];
                        if(password_verify($password, $dbpassword)){
                            $_SESSION['datekey'] = md5(date("Y-M-D"));
                            $_SESSION['email'] = $email;
                            $privkey = $engine->clean(md5(md5($email).md5(rand(0,5000))));
                            $_SESSION['privkey'] = $privkey;
                            $sql = mysqli_query($engine->db, "UPDATE members SET privkey='$privkey' WHERE email='$email' LIMIT 1");
                            header('Location: ./index.php');
                            die();
                        }else{
                            $error = "Invalid Email or Password";
                        }
                }else{
                    $error = "Invalid Email or Password";
                }



        }else{
            $error = "Please don't leave fields blank!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include './includes/head.php';
    ?>
</head>
<body>
<?php $engine->displaymenu(0); ?>
<br/>
<br/>
<br/>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
            <?php
                if($error != ""){
                    echo $engine->displayerror($error);
                }
            ?>
           <form action="./login.php" method="post" style="width:50%;">
               <div class="input-group">
                   <div class="input-group-addon">
                       Email Address
                   </div>
                   <input type="text" name="email" required class="form-control" placeholder="Email Address"><br/>
               </div>
               <br/>
               <div class="input-group">
                   <div class="input-group-addon">
                       Password
                   </div>
                   <input type="password" name="password" required class="form-control" placeholder="Password"><br/>
               </div>
               <br/>
               <button type="submit" class="btn btn-success">Login</button>
           </form>
        </div>
    </div>
</div>




</body>
</html>