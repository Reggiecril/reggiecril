<?php
$conn   = mysqli_connect("localhost", "reggiecr_root", "Cloud19961008", "reggiecr_c3470912");
$info = json_decode(file_get_contents("php://input"));
if (count($info) > 0) {
	$firstname     = mysqli_real_escape_string($conn, $info->firstname);
    $lastname     = mysqli_real_escape_string($conn, $info->lastname);
    $email    = mysqli_real_escape_string($conn, $info->email);
    $age      = mysqli_real_escape_string($conn, $info->age);
    $btn_name = $info->btnName;
    if ($btn_name == "Insert") {
        $query = "INSERT INTO users(firstname,lastname, email, age) VALUES ('$firstname', '$lastname','$email', '$age')";
        if (mysqli_query($conn, $query)) {
            echo "Data Inserted Successfully...";
        } else {
            echo 'Failed';
        }
    }
    if ($btn_name == 'Update') {
        $id    = $info->id;
        $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', age = '$age' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo 'Data Updated Successfully...';
        } else {
            echo 'Failed';
        }
    }
}
?>