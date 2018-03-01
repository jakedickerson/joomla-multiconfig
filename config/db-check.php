<?php
// Require path to configuration.php
require($path);
$db = new JConfig();

// Create connection
if ($db->dbtype == 'mysqli') {
    $conn = new mysqli($db->host, $db->user, $db->password);

    // Check connection
    if ($conn->connect_error) {
        $db->error = $conn->connect_error;
    } elseif (!mysqli_select_db($conn, $db->db)) {
        $db->error = 'Database not available';
    }
    //TODO: Not tested on mysql connection
} elseif ($db->type == 'mysql') {
    $conn = mysql_connect($db->host, $db->user, $db->password);
    if ($conn->connect_error) {
        $db->error = $conn->connect_error;
    } elseif (!mysql_select_db($conn, $db->db)) {
        $db->error = 'Database not available';
    }
}
?>