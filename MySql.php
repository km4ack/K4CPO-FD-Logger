<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2016
 */

class mysqlDB {
    var $connection; //The MySQL database connection
    function mysqlDB()
    {
        $this->host = DATABASEHOST; // your host
        if (defined(DATABASE)) {
            $this->dbx = DATABASE; // your database
        } else {
            $this->dbx = ""; // your database
        }
        $this->user = DATABASEUSER; // your username
        $this->pass = DATABASEPASS; // your password
        $this->connection = mysqli_connect($this->host, $this->user, $this->pass);
        mysqli_select_db($this->connection,$this->dbx);
    }
    function mysqlquery($sql)
    {
        return mysqli_query($this->connection,$sql) or die("Invalid query#01:" . mysqli_error($this->connection) . "||$sql") ;
    }
    function mysqlnumrows($sql)
    {
        $result = mysqli_query($this->connection,$sql) or die("Invalid query#01:" . mysqli_error($this->connection) . "||$sql") ;
        if (!$result || (mysqli_num_rows($result) < 1)) {
            return 0;
        }
        return mysqli_num_rows($result);
    }

    function mysqlSelectRows($sql)
    {
        $result =mysqli_query($this->connection,$sql) or die("Invalid query#01:" . mysqli_error($this->connection)  . "||$sql") ;
        /* Error occurred, return given name by default */
        if (!$result || (mysqli_num_rows($result) < 1)) {
            return null;
        } while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $dbarray[] = $line;
        }
        return $dbarray;
    }
    function mysqlSelectRow($sql)
    {
        $result =mysqli_query($this->connection,$sql) or die("Invalid query#01:" . mysqli_error($this->connection) . "||$sql") ;
        /* Error occurred, return given name by default */
        if (!$result || (mysqli_num_rows($result) < 1)) {
            return null;
        }
        $line = mysqli_fetch_array($result, MYSQLI_ASSOC) or die("Invalid query#01:" . mysqli_error($this->connection) . "||$sql") ;
        return $line;
    }
}
// calls it to action
$mysqldb = new mysqlDB;


?>