<?php
const SERVER='localhost';
const DBNAME= 'instagram';
const DBUSER='root';
const DBPASSWORD='12345';
const DBCHARSET='UTF8';
const DBTYPE='mysql';

try {
    $connection = new PDO(
        DBTYPE . ':host=' . SERVER . ';dbname=' . DBNAME . ';charset=' . DBCHARSET,
        DBUSER,
        DBPASSWORD,
        [
            PDO::ATTR_PERSISTENT            => true,
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND    =>  "SET NAMES 'UTF8'"

        ]
    );
} catch ( PDOException $e ) {
    echo 'ERROR!';
    print_r( $e );
}
?>