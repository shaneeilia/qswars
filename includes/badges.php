<?php


    class badges{

        private $eng;
            function __construct($engine){
                $this->eng = $engine;
            }

        function getbageinfo($bid,$info){
            $bid = $this->eng->cleanint($bid);
                $sql = mysqli_query($this->eng->db, "SELECT * FROM badges WHERE id='$bid' LIMIT 1");
            $count = mysqli_num_rows($sql);
                if($count == 1){
                    $row = mysqli_fetch_array($sql);
                        switch($info){
                            case "id":
                                return $row["id"];
                            break;
                            case "name":
                                return $row["name"];
                            break;
                            case "desc":
                                return $row["description"];
                            break;
                        }
                }else{
                    return 0;
                }
        }









    }




?>