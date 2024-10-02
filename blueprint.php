<?php
// echo "Last modified: " . date("F d Y H:i:s.", filemtime($folder)) . "<br><br>";
$servername = "localhost";
$username = "root";
$password = "";
$database = "spotify";
$connection  = mysqli_connect($servername,$username,$password,$database);
$dir = 'Albums';
$folders = glob($dir . '/*', GLOB_ONLYDIR);
foreach ($folders as $folder) {
    $folderok = str_replace("Albums/", "", $folder);
    echo "$folderok <br>";

}
?>

<?php
    if ($connection){
        $sql = "SELECT * FROM `playlist` WHERE album =?";
        $state = $connection->prepare($sql);
        $state->bind_param("s",$folderok);
        $state->execute();
        $result = $state->get_result();
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                echo "" .$row["id"]." ".$row["playdiscription"]." ".$row["image"]. "<br>";
            }
        }
    }
    ?>