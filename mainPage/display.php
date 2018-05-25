<?php
$conn   = mysqli_connect("localhost", "reggiecr_root", "Cloud19961008", "reggiecr_c3470912");
$output = array();
$query  = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?> 