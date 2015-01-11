<?php
include './includes/engine.php';
$engine = new engine();
include './includes/badges.php';
$bclass = new badges($engine);
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
<?php $engine->displaymenu(2); ?>
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
                    <h3 class="panel-title">Your Badges</h3>
                </div>
                <div class="panel-body">
                    <?php
                        $badges = $engine->getuserinfo("badges");

                            if($badges != ""){
                                $badgearray = explode(",", $badges);
                                    foreach($badgearray as $badge){
                                        echo '<span class="tools" data-toggle="tooltip" data-placement="top" title="'.$bclass->getbageinfo($badge, "name").'"><img src="./images/03_MEDAL/medal_'.$badge.'.png" width="50px" height="50px"></span> &nbsp;';
                                    }
                            }else{
                                echo $engine->displayerror("You have no badges");
                            }

                    ?>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <h3 class="panel-title">Your Army Stats</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Resource</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Gold <img src="./images/gold.png" width="20px" height="20px"></td>
                            <td><?php echo number_format($engine->getuserinfo("gold")); ?></td>
                        </tr>
                        <tr>
                            <td>Gems <img src="./images/gem.png" width="20px" height="20px"></td>
                            <td><?php echo $engine->getuserinfo("gems");?> </td>
                        </tr>
                        </tbody>
                    </table>
                   <table class="table table-bordered">
                       <thead>
                            <tr>
                                <th>Stat</th>
                                <th>Level</th>
                                <th>Train</th>
                            </tr>
                       </thead>
                       <tbody>
                        <tr>
                            <td>Research Level</td>
                            <td><?php echo $engine->getuserinfo("research"); ?></td>
                            <td><button class="btn btn-success btn-sm">Train</button></td>
                        </tr>
                        <tr>
                            <td>Defense Level</td>
                            <td><?php echo $engine->getuserinfo("defense"); ?></td>
                            <td><button class="btn btn-success btn-sm">Train</button></td>
                        </tr>
                        <tr>
                            <td>Technology Level</td>
                            <td><?php echo $engine->getuserinfo("tech"); ?></td>
                            <td><button class="btn btn-success btn-sm">Train</button></td>
                        </tr>
                        <tr>
                            <td>Intel Level</td>
                            <td><?php echo $engine->getuserinfo("intel"); ?></td>
                            <td><button class="btn btn-success btn-sm">Train</button></td>
                        </tr>
                       </tbody>
                       </table>
                    <hr>




                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Weapons</h3>
                    </div>
                    <div class="panel-body">
                            <img src="./images/01_GUN/gun_ak74.png" width="100px" height="50px" class="img-thumbnail">
                            <img src="./images/01_GUN/gun_aims_pm_md90.png" width="100px" height="50px" class="img-thumbnail">
                            <img src="./images/01_GUN/gun_fn_fal_paratrooper.png" width="100px" height="50px" class="img-thumbnail">
                            <img src="./images/01_GUN/gun_hk_g36k.png" width="100px" height="50px" class="img-thumbnail">



                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Equipment</h3>
                    </div>
                    <div class="panel-body">
                        <img src="./images/02_ITEM/item_m16_frag.png" width="100px" height="50px" class="img-thumbnail">
                        <img src="./images/02_ITEM/item_morphine.png" width="100px" height="50px" class="img-thumbnail">
                        <img src="./images/02_ITEM/item_emergency_kit_02.png" width="100px" height="50px" class="img-thumbnail">


                        </div>
                    </div>



                </div>
        </div>



    </div>
        </div>



    </div>
</div>




</body>
</html>