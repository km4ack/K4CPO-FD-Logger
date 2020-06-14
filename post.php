<?php
include("include.php");
extract($_GET, EXTR_OVERWRITE);
extract($_POST, EXTR_OVERWRITE);
if (isset($type)){
    switch ($type){
        case "band":
            switch ($submitie){
                case "Update Band":
                    $mysqldb->mysqlquery("update " . DATABASE . ".band set band='" . $band . "' where id=$id");
                    break;
                case "Delete Band":
                    $mysqldb->mysqlquery("delete from  " . DATABASE . ".band where id=$id");
                    break;
                case "Add Band":
                    $mysqldb->mysqlquery("insert into " . DATABASE . ".band (id,band) values(" . $id . ",'" . $band . "')");
                    break;
            } // switch
            break;
        case "mode":
            switch ($submitie){
                case "Update Mode":
                    $mysqldb->mysqlquery("update " . DATABASE . ".mode set mode='" . $mode . "' where id=$id");
                    break;
                case "Delete Mode":
                    $mysqldb->mysqlquery("delete from  " . DATABASE . ".mode where id=$id");
                    break;
                case "Add Mode":
                    $mysqldb->mysqlquery("insert into " . DATABASE . ".mode (id,mode) values(" . $id . ",'" . $mode . "')");
                    break;
            } // switch
            break;
        case "record":
            switch ($submitie){
                case "Update Record":
                    $mysqldb->mysqlquery("update " . DATABASE . ".log set station='" . $station . "',mode='" . $mode . "',dt='" . $dt . "',`call`='" . $call . "',class='".$class."',section='" . $section . "',  band='" . $band . "' where id=$id");
                    break;
                case "Delete Record":
                    $mysqldb->mysqlquery("delete from  " . DATABASE . ".log where id=$id");
                    break;
                case "Add Record":
                    $mysqldb->mysqlquery("insert into " . DATABASE . ".log (station,band,mode,dt,`call`,class,section) values('" . $station . "','" . $band . "','" . $mode . "','" . $call . "','" . $class . "','" . $section . "')");
                    break;
            }
            break;
        case "settings":
            switch ($submitie){
                case "Update Setting":
                    $mysqldb->mysqlquery("update " . DATABASE . ".settings set year='" . $year . "', sat='" . $sat . "', sun='" . $sun . "' ");
                    break;
            }
        case "Update Settings":
            die();
            break;
    }
}
if($type == 'record'){
    header('Location: index.php');
}else{
    header('Location: setup.php');
}

?>