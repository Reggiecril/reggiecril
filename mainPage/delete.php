<?php
$conn   = mysqli_connect("localhost", "reggiecr_root", "Cloud19961008", "reggiecr_c3470912");
$data    = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
    $id    = $data->id;
    $query = "DELETE FROM users WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo 'Data Deleted Successfully...';
    } else {
        echo 'Failed';
    }
}
?>