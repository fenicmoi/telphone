<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'phatthalun_telphone';


/*
$dbHost = 'localhost';
$dbUser = 'phatthalun_dol'; // phatthalun
$dbPass = 'nSSYV5cJ'; // Phatthalun#2019
$dbName = 'phatthalun_telphone';
*/

$dbConn = new mysqli($dbHost, $dbUser, $dbPass);
if ($dbConn->connect_error) {
        die("Connection failed: " . $dbConn->connect_error);
}

$dbConn->query("set names utf8");

if (!$dbConn->select_db($dbName)) {
        die("Database selection failed: " . $dbConn->error);
}

function dbQuery($sql)
{
        global $dbConn;
        $result = $dbConn->query($sql);
        if ($result === false) {
                die("Query failed: " . $dbConn->error . "<br>SQL: " . $sql);
        }
        return $result;
}

function dbQueryPrepared($sql, $params = [], $types = "")
{
        global $dbConn;
        $stmt = $dbConn->prepare($sql);
        if (!$stmt) {
                die("Prepare failed: " . $dbConn->error);
        }

        if (!empty($params)) {
                if (empty($types)) {
                        // Automatically determine types if not provided
                        foreach ($params as $param) {
                                if (is_int($param))
                                        $types .= "i";
                                elseif (is_double($param))
                                        $types .= "d";
                                elseif (is_string($param))
                                        $types .= "s";
                                else
                                        $types .= "b";
                        }
                }
                $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        // For non-SELECT queries, return affected rows or true
        if ($result === false) {
                if ($stmt->errno) {
                        die("Execute failed: " . $stmt->error);
                }
                return true;
        }

        return $result;
}

function dbAffectedRows()  //ส่งจำนวนแถวก่อนดำเนินการ
{
        //global $dbConn;

        //return mysql_affected_rows($dbConn);
        return mysqli_affected_rows($dbConn);
}

function dbFetchArray($result)
{
        if ($result === false || $result === true) {
                // This happens if a query failed or was a non-SELECT query
                // but the caller expected a result set.
                $debug = debug_backtrace();
                $caller = $debug[0]['file'] . " on line " . $debug[0]['line'];
                die("dbFetchArray expects mysqli_result, got " . gettype($result) . ". Called from " . $caller);
        }
        return mysqli_fetch_array($result);
}

function dbFetchAssoc($result)
{
        //return mysql_fetch_assoc($result);
        global $dbConn;
        return mysqli_fetch_assoc($result);
}

function dbFetchRow($result)
{
        //return mysqli_fetch_row($result);
        global $dbConn;
        return mysqli_fetch_row($result);
}

function dbFreeResult($result)
{
        //return mysql_free_result($result);
        global $dbConn;
        return mysqli_free_result($result);
}

function dbNumRows($result)
{
        //return mysql_num_rows($result);
        // global $dbConn;
        return mysqli_num_rows($result);
}

function dbSelect($dbName)
{
        return mysqli_select_db($dbName);
}

function dbInsertId()
{
        global $dbConn;
        return mysqli_insert_id($dbConn);

}
?>