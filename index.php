<?php
    include './includes/engine.php';
    $engine = new engine();

        if($engine->verifysession()){

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
    <?php $engine->displaymenu(1); ?>
<br/>
<br/>
<br/>
    <div class="container">
        <div class="jumbotron">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Welcome <?php echo ucfirst($engine->getuserinfo("username")); ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mission History</h3>
                            </div>
                            <div class="panel-body">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><font color="black">Land Seizure</font></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                40% Complete
                                            </div>
                                        </div>
                                        Description: Seize land from the Bandits in iraq<br/>
                                        Status: In Progress<br/>
                                        Reward: 5,000 GOLD
                                        <hR>

                                    </div>
                                </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><font color="black">Weapons Cache Raid</font></h3>
                            </div>
                            <div class="panel-body">
                                Description: Weapons Cache Raid<br/>
                                Status: Completed<br/>
                                Reward: 500 Gold & Med Kit
                            </div>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title"><font color="black">Land Seizure</font></h3>
                            </div>
                            <div class="panel-body">
                                Description: Seize land from the Bandits in iraq<br/>
                                Status: Failed<br/>
                                Reward: 10,000 GOLD, 5x Med Kits, 2 Gems, +1 Intelligence
                            </div>
                        </div>

                                </div>
                    </div>

                </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Black Market History</h3>
                            </div>
                            <div class="panel-body">
                                <div class="well"> <img src="./images/01_GUN/gun_fn_fal_paratrooper.png" width="100px" height="50px" class="img-thumbnail"> SOLD For 50,000 GOLD</div>
                                <div class="well"> <img src="./images/02_ITEM/item_smoke.png" width="50px" height="50px" class="img-thumbnail"> SOLD For 5,000 GOLD</div>
                                </div>
                            </div>


                        </div>

            </div>

        </div>
        </div>
    </div>




</body>
</html>