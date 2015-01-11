<?php
error_reporting(E_ERROR);
session_start();

    class engine {
        public $title;
        public $db;

        function __construct(){
            $this->db =  $this->db = new mysqli('HOSTNAME', 'USERNAME', 'PASSWORD', 'TABLE');
            $this->title = "QsWars"; //<---- WEBSITE NAME
        }

        /*
         * Cleans strings for database entry
         */
        public function clean($string){
            return mysqli_real_escape_string($this->db, strip_tags(trim($string)));
        }
        /*
         * Cleans ints for database entry
         */
        public function cleanint($string){
            return mysqli_real_escape_string($this->db, strip_tags(trim((int)$string)));
        }


        /*
         * Displays Error on page using bootstrap framework
         */
        public function displayerror($error){
            return '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }

        /*
         * Validate Existing session!
         */
        public function verifysession(){
            if(isset($_SESSION['email'],$_SESSION['datekey'],$_SESSION['privkey'])){
                if($_SESSION['datekey'] == md5(date("Y-M-D"))){
                    $email = $this->clean($_SESSION['email']);
                    $sql = mysqli_query($this->db, "SELECT privkey FROM members WHERE email='$email' LIMIT 1");
                    $count = mysqli_num_rows($sql);
                        if($count == 1){
                            $row = mysqli_fetch_assoc($sql);
                            $privkey = $row["privkey"];
                                if($privkey == $_SESSION['privkey']){
                                    return true;
                                }else{
                                    return false;
                                }
                        }else{
                            return false;
                        }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }


        public function getuserinfo($info){
            if($this->verifysession()){
                $email = $this->clean($_SESSION['email']);
                    $sql = mysqli_query($this->db, "SELECT * FROM members WHERE email='$email' LIMIT 1");
                $count = mysqli_num_rows($sql);
                    if($count == 1){
                            $row = mysqli_fetch_assoc($sql);
                               switch($info){
                                   case "id":
                                       return $row["id"];
                                   break;
                                   case "username":
                                       return $row["username"];
                                   break;
                                   case "email":
                                       return $row["email"];
                                   break;
                                   case "password":
                                       return $row["password"];
                                   break;
                                   case "privkey":
                                       return $row["privkey"];
                                   break;
                                   case "badges":
                                       return $row["badges"];
                                   break;
                                   case "gold":
                                       return $row["gold"];
                                   break;
                                   case "gems":
                                       return $row["gems"];
                                   break;
                                   case "defense":
                                       return $row["defense"];
                                   break;
                                   case "research":
                                       return $row["research"];
                                   break;
                                   case "tech":
                                       return $row["technology"];
                                   break;
                                   case "intel":
                                       return $row["intel"];
                                   break;
                               }

                    }else{
                        return false;
                    }
            } else {
                return false;
            }
        }









        /*
         *
         * MENU
         *
         */
        function displaymenu($int){
            ?>

                <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="width:100%;">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php echo $this->title; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
        <ul class="nav navbar-nav">
            <li <?php if($int == 1) {echo'class="active"'; } ?>><a href="./index.php">Home</a></li>
            <li <?php if($int == 2) {echo'class="active"'; } ?>><a href="./army.php">Army</a></li>
            <li <?php if($int == 3) {echo'class="active"'; } ?>><a href="./missions.php">Missions</a></li>
            <li <?php if($int == 5) {echo'class="active"'; } ?>><a href="./market.php">Black Market</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->

</nav>

            <?php

        }




    }





?>