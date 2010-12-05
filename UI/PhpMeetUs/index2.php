<?php
//*********************FUNCTIONS*********************************************
define('NL', "\n");
define('TB', '  ');

function connectToMySql() {
    $username = 'root'; //""
    $password = 'root'; //""
    $hostname = 'localhost'; // "127.0.0.1"
    $dbh = mysql_connect($hostname, $username, $password)
            or die("Unable to connect to MySQL");
    print "Connected to MySQL<br>";
    $result = mysql_list_dbs($dbh);
    echo '<ul>' . NL;
// Output the list
    echo '<ul>' . NL;
    return $dbh;
}

function selectDatabase($dbh) {
    $selected = mysql_select_db("test", $dbh)
            or die("Could not select first_testas;ldksa");
    return $selected;
}

function insertData($tableName,$data) {
$showtablequery = " INSERT INTO $tableName VALUES $data ";
mysql_query($showtablequery);
echo "Adding data";
}

function closeSqlConnections($dbh){
    mysql_close($dbh);
}

//***************TEST-FUNCTIONS***********************************************
//connect to mysql
$dbh = connectToMySql();

//select database
$selected = selectDatabase($dbh);

//insert data doesn't matter
$tableName="facebook";
$data="('2010-01-11')";
insertData($tableName,$data);

//close connection
closeSqlConnections($dbh);

?>