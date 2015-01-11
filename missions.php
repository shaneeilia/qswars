<?php
include './includes/engine.php';
$engine = new engine();
include './includes/badges.php';
$bclass = new badges($engine);
if($engine->verifysession()){



    $do = $engine->clean($_GET['do']);
        if(isset($_GET['do'])){
            if(!empty($_GET['do'])){

            }else{
                $error = "Invalid Mission";
            }
        }




}else{
    session_destroy();
    header('Location: ./login.php');
    die();
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include './includes/head.php';
    ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.tools').tooltip();
        });
    </script>
</head>
<body>
<?php $engine->displaymenu(3); ?>
<br/>
<br/>
<br/>
<div class="container">
    <div class="jumbotron">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Welcome <?php echo ucfirst($engine->getuserinfo("username")); ?></h3>
            </div>
</div>
        <?php
            if($error != ""){
                echo $engine->displayerror("$error");
            }

        ?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Instant Missions</div>
            <div class="panel-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php
                    $sql = mysqli_query($engine->db, "SELECT * FROM missions WHERE time='0'");
                    $count = mysqli_num_rows($sql);
                    if($count > 0){
                        while($row = mysqli_fetch_array($sql)) {
                            $mid = $row["id"];
                            $mname = $row["name"];
                            $mdesc = $row["desc"];
                            $intel = $row["intel"];
                            $time = $row["time"];
                            $gold = $row["gold"];
                            $gems = $row["gems"];
                            $research = $row["research"];

                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading<?php echo $mid; ?>">
                                    <h4 class="panel-title">
                                        <?php echo $mname; ?>
                                        <div class="pull-right">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse<?php echo $mid; ?>" aria-expanded="false"
                                               aria-controls="collapse<?php echo $mid; ?>"><i
                                                    class="glyphicon glyphicon-minus"></i></a>
                                        </div>
                                    </h4>
                                </div>
                                <div id="collapse<?php echo $mid; ?>" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="heading<?php echo $mid; ?>">
                                    <div class="panel-body">
                                        <?php echo nl2br($mdesc); ?>
                                        <br/>
                                        <br/>
                                        <a class="btn btn-success btn-sm"
                                           href="./missions.php?do=<?php echo $mid; ?>"><i
                                                class="glyphicon glyphicon-chevron-right"></i> Start Mission</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }else{
                        echo $engine->displayerror("No missions Available");
                    }
                ?>


                    </div>
            </div>
        </div>

    </div>

        <div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">Time Missions</div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
</div>
</div>


        </div>
    </div>





</body>
</html>