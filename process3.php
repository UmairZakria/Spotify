<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "spotify";

$connection = mysqli_connect($servername, $username, $password, $database);
if (isset($_POST['form_type'])) {

    if ($_POST['form_type'] === 'form1') {
        $selec = $_POST['selec'];
        echo "user delete";

        if (!$connection) {
        } else {
            $state = $connection->prepare("DELETE FROM `rigister` WHERE `id`= $selec");
            $state->execute();
        }
    } elseif ($_POST['form_type'] === 'form2') {
        $useremail = $_POST['useremail'];
        $userpassword = $_POST['userpass'];
        $username = $_POST['username'];
        $userdob = $_POST['userdob'];
        $usergender = $_POST['usergender'];

        $sql = "INSERT INTO `rigister`( `email`, `password`, `Name`, `dob`, `gender`) VALUES ('$useremail','$userpassword','$username','$userdob','$usergender')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header("Location: admin.php?adminname=admin&adminpass=admin&userstatus=true");

            echo "user rigistered";
        } else {
            header("Location: admin.php?adminname=admin&adminpass=admin&userstatus=false");

            // header("Location: admin.php");


        }
    } else if ($_POST['form_type'] === 'form3') {
        $foldername = $_POST['albumname'];

        if (!file_exists($foldername)) {
            $dir = "Albums/$foldername";
            mkdir($dir, 0755, true);
            header("Location: admin.php?adminname=admin&adminpass=admin&userstatus=album");
        } else {
            header("Location: admin.php?adminname=admin&adminpass=admin&userstatus=albumfalse");
        }
    } else if ($_POST['form_type'] === 'form4') {
        $album = $_POST['slecalbum'];   
        $discription = $_POST['discription'];
        $name = $_POST['name'];
        echo " $album $discription $name";

        $target_dir = "Albums/$album/";
        echo "$target_dir";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";


            $sql = "INSERT INTO `playlist`( `playname`, `playdiscription`, `image`,`album`) VALUES ('$name','$discription','$target_file','$album')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "<br> the record has been created";
                header("Location: admin.php?adminname=admin&adminpass=admin&userstatus=playlist");
            } else {
                echo "<br> result not";
                header("Location: admin.php?adminname=admin&adminpass=admin&userstatus=playlistfalse");
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else if ($_POST['form_type'] === "form5") {

        $useremail = $_POST['useremail'];
        $userpass = $_POST['userpass'];
        $st= "SELECT * FROM `rigister` WHERE email = ?";
        $state = $connection->prepare($st);
        $state->bind_param("s",$useremail);
        $state->execute();
        $result = $state->get_result();
        if ($result->num_rows > 0){
            $user = $result->fetch_assoc();
            $st1 = "UPDATE `rigister` SET `password`='$userpass' WHERE `email` = '$useremail'";
            $state2= $connection->prepare($st1);
            $state2->execute();
            $result = $state2->get_result();
            header("Location: reset.php?reset=true");


            

        }else{
            echo "no Email found";
        }
    }else if ($_POST['form_type'] === 'form6') {
        $selec = $_POST['selec'];
        echo "user delete";

        if (!$connection) {
            echo "not successfull";
        } else {
            $state = $connection->prepare("DELETE FROM `playlist` WHERE `id`= $selec");
            $state->execute();
            header("Location: admin.php?adminname=admin&adminpass=admin&userstatus=playlistdelete");

        }

     }
    
    else {
        echo "error not";
    }
}
