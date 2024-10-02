<?php

if (isset($_GET['adminname'])) {
    $adminname = $_GET['adminname'];
    $adminpass = $_GET['adminpass'];
    if (isset($_GET['userstatus'])) {
        $userstatus = $_GET['userstatus'];
    } else {
        $userstatus = "";
    }
    if ($adminname == "admin" && $adminpass == "admin") {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Spotify-Admin-Panel</title>
            <link rel="shortcut icon" href="favico.png" type="image/x-icon">
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    font-family: sans-serif;
                }

                .box {
                    width: 100%;
                    height: calc(100vh - 80px);
                    background-color: black;
                    color: white;
                    padding: 30px;
                    box-sizing: border-box;

                }

                nav {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    height: 80px;
                    width: 100%;
                    background-color: gray;
                    box-sizing: border-box;
                    padding: 0px 30px;


                }

                table {
                    width: 100%;

                }

                tr {
                    text-align: center;
                    /* padding: 10px; */
                    height: 60px;
                    background-color: rgb(84, 139, 114);
                }

                .editor {
                    width: 100%;
                    /* float: right; */
                    /* border: 2px solid red; */
                    height: 60px;
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                    padding: 0px 10px;
                    box-sizing: border-box;
                }

                .editor input {
                    width: 90px;
                    height: 50px;
                    background-color: red;
                    border: none;
                    border-radius: 5px;
                    color: white;
                    font-size: 17px;
                }

                .editor2 {
                    width: 100%;
                    /* float: right; */
                    /* border: 2px solid red; */
                    height: 90px;
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                    flex-wrap: nowrap;
                    padding: 0px 10px;
                    box-sizing: border-box;
                }

                .editor2 form {
                    /* border: 2px solid red;    */
                    width: 100%;
                    display: flex;
                    align-items: center;
                    height: 100%;
                    gap: 5px;

                }

                .editor2 form input {
                    width: 100%;
                    height: 50px;
                    padding: 5px;
                    border-radius: 5px;
                    box-sizing: border-box;
                }

                .addbtn {
                    width: 90px;
                    height: 50px;
                    background-color: gray;
                    border: none;
                    border-radius: 5px;
                    color: white;
                    font-size: 17px;
                    /* margin-right: 20px; */
                }
            </style>
        </head>

        <body>
            <nav>
                <p style="color:white; gap:10px; align-items:center; display :flex;">
                    <svg role="img" fill="white" width="40" height="40" viewBox="0 0 24 24" aria-label="Spotify" aria-hidden="false" height="100%" data-encore-id="logoSpotify" class="Svg-sc-6c3c1v-0 jlGQTA">
                        <title>Spotify</title>
                        <path d="M13.427.01C6.805-.253 1.224 4.902.961 11.524.698 18.147 5.853 23.728 12.476 23.99c6.622.263 12.203-4.892 12.466-11.514S20.049.272 13.427.01m5.066 17.579a.717.717 0 0 1-.977.268 14.4 14.4 0 0 0-5.138-1.747 14.4 14.4 0 0 0-5.42.263.717.717 0 0 1-.338-1.392c1.95-.474 3.955-.571 5.958-.29 2.003.282 3.903.928 5.647 1.92a.717.717 0 0 1 .268.978m1.577-3.15a.93.93 0 0 1-1.262.376 17.7 17.7 0 0 0-5.972-1.96 17.7 17.7 0 0 0-6.281.238.93.93 0 0 1-1.11-.71.93.93 0 0 1 .71-1.11 19.5 19.5 0 0 1 6.94-.262 19.5 19.5 0 0 1 6.599 2.165c.452.245.62.81.376 1.263m1.748-3.551a1.147 1.147 0 0 1-1.546.488 21.4 21.4 0 0 0-6.918-2.208 21.4 21.4 0 0 0-7.259.215 1.146 1.146 0 0 1-.456-2.246 23.7 23.7 0 0 1 8.034-.24 23.7 23.7 0 0 1 7.657 2.445c.561.292.78.984.488 1.546m13.612-.036-.832-.247c-1.67-.495-2.14-.681-2.14-1.353 0-.637.708-1.327 2.264-1.327 1.539 0 2.839.752 3.51 1.31.116.096.24.052.24-.098V6.935c0-.097-.027-.15-.098-.203-.83-.62-2.272-1.07-3.723-1.07-2.953 0-4.722 1.68-4.722 3.59 0 2.157 1.371 2.91 3.626 3.546l.973.274c1.689.478 1.998.902 1.998 1.556 0 1.097-.831 1.433-2.07 1.433-1.556 0-3.457-.911-4.35-2.025-.08-.098-.177-.053-.177.062v2.423c0 .097.01.141.08.22.743.814 2.52 1.53 4.59 1.53 2.546 0 4.456-1.485 4.456-3.784 0-1.787-1.052-2.865-3.625-3.635m10.107-1.76c-1.68 0-2.653 1.026-3.219 2.052V9.376c0-.08-.044-.124-.124-.124h-2.22c-.079 0-.123.044-.123.124V20.72c0 .08.044.124.124.124h2.22c.079 0 .123-.044.123-.124v-4.536c.566 1.025 1.521 2.034 3.237 2.034 2.264 0 3.89-1.955 3.89-4.581s-1.644-4.545-3.908-4.545m-.654 6.986c-1.185 0-2.211-1.167-2.618-2.458.407-1.362 1.344-2.405 2.618-2.405 1.211 0 2.051.92 2.051 2.423s-.84 2.44-2.051 2.44m40.633-6.826h-2.264c-.08 0-.115.017-.15.097l-2.282 5.483-2.29-5.483c-.035-.08-.07-.097-.15-.097h-3.661v-.584c0-.955.645-1.397 1.476-1.397.496 0 1.035.256 1.415.486.089.053.15-.008.115-.088l-.796-1.901a.26.26 0 0 0-.124-.133c-.389-.203-1.025-.38-1.644-.38-1.875 0-2.954 1.432-2.954 3.254v.743h-1.503c-.08 0-.124.044-.124.124v1.768c0 .08.044.124.124.124h1.503v6.668c0 .08.044.123.124.123h2.264c.08 0 .124-.044.124-.123v-6.668h1.936l2.812 6.11-1.512 3.325c-.044.098.009.142.097.142h2.414c.08 0 .116-.018.15-.097l4.997-11.355c.035-.08-.009-.141-.097-.141M54.964 9.04c-2.865 0-4.837 2.025-4.837 4.616 0 2.573 1.971 4.616 4.837 4.616 2.856 0 4.846-2.043 4.846-4.616 0-2.591-1.99-4.616-4.846-4.616m.008 7.065c-1.37 0-2.343-1.043-2.343-2.45 0-1.405.973-2.449 2.343-2.449 1.362 0 2.335 1.043 2.335 2.45 0 1.406-.973 2.45-2.335 2.45m33.541-6.334a1.24 1.24 0 0 0-.483-.471 1.4 1.4 0 0 0-.693-.17q-.384 0-.693.17a1.24 1.24 0 0 0-.484.471q-.174.302-.174.681 0 .375.174.677.175.3.484.471t.693.17.693-.17.483-.471.175-.676q0-.38-.175-.682m-.211 1.247a1 1 0 0 1-.394.39 1.15 1.15 0 0 1-.571.14 1.16 1.16 0 0 1-.576-.14 1 1 0 0 1-.391-.39 1.14 1.14 0 0 1-.14-.566q0-.316.14-.562t.391-.388.576-.14q.32 0 .57.14.253.141.395.39t.142.565q0 .312-.142.56m-19.835-5.78c-.85 0-1.468.6-1.468 1.396s.619 1.397 1.468 1.397c.866 0 1.485-.6 1.485-1.397 0-.796-.619-1.397-1.485-1.397m19.329 5.19a.31.31 0 0 0 .134-.262q0-.168-.132-.266-.132-.099-.381-.099h-.588v1.229h.284v-.489h.154l.374.489h.35l-.41-.518a.5.5 0 0 0 .215-.084m-.424-.109h-.26v-.3h.27q.12 0 .184.036a.12.12 0 0 1 .065.116.12.12 0 0 1-.067.111.4.4 0 0 1-.192.037M69.607 9.252h-2.263c-.08 0-.124.044-.124.124v8.56c0 .08.044.123.124.123h2.263c.08 0 .124-.044.124-.123v-8.56c0-.08-.044-.124-.124-.124m-3.333 6.605a2.1 2.1 0 0 1-1.053.257c-.725 0-1.185-.425-1.185-1.362v-3.484h2.211c.08 0 .124-.044.124-.124V9.376c0-.08-.044-.124-.124-.124h-2.21V6.944c0-.097-.063-.15-.15-.08l-3.954 3.113c-.053.044-.07.088-.07.16v1.007c0 .08.044.124.123.124h1.539v3.855c0 2.087 1.203 3.06 2.918 3.06.743 0 1.46-.194 1.884-.442.062-.035.07-.07.07-.133v-1.68c0-.088-.044-.115-.123-.07" transform="translate(-0.95,0)"></path>
                    </svg>
                    Spotify-Admin-Panel
                </p>
                <a href="adminlogin.php">Logout</a>

            </nav>
            <div class="box">
                <h1>Rigistered User:</h1>
                <script>
                    window.onload = function() {
                        setTimeout(function() {
                            document.getElementById('error').style.display = 'none';
                        }, 5000);
                    }

                    function chkseid() {
                        let selec = document.getElementById('selec')
                        if (selec) {

                            if (!selec.checked) {
                                document.getElementById('error').style.display = "flex";
                                console.log("dont worry" + selec)
                                setTimeout(function() {
                                    document.getElementById('error').style.display = 'none';
                                }, 6000);
                                return false
                            } else if (selec.checked) {
                                console.log("true")
                                return true
                            } else {
                                return false
                            }


                        } else {
                            console.log('error')
                            return false

                        }

                    }

                    function useradd() {
                        document.getElementById('useradd').style.display = "none"

                        document.getElementById('useradding').style.display = "flex"
                    }
                </script>

                <form action="process3.php" onsubmit="return chkseid()" method="post">
                    <input type="hidden" name="form_type" value="form1">
                    <?php
                    if ($userstatus) {

                        if ($userstatus == "false") {
                    ?>
                            <div class="" style=" color: rgb(243, 114, 127);display: flex;align-items: flex-start;justify-content: flex-start; flex-direction:row; margin:10px 0px;" id="error">
                                <svg data-encore-id="icon" style=" width:20px; height: 20px;  " fill="rgb(243, 114, 127)" role="img" aria-label="Error:" aria-hidden="true" class="Svg-sc-ytk21e-0 kisTW IconExclamationCircleForText-sc-1lnefk5-0 ryVAU" viewBox="0 0 16 16">
                                    <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"></path>
                                    <path d="M7.25 9V4h1.5v5h-1.5zm0 3.026v-1.5h1.5v1.5h-1.5z"></path>
                                </svg>
                                <span style="margin-left: 10px;">User does not add try another one</span>

                            </div>
                        <?php
                        } elseif ($userstatus == "true") {
                        ?>
                            <div class="" style=" color: rgb(243, 114, 127);display: flex;align-items: flex-start;justify-content: flex-start; flex-direction:row; margin:10px 0px;" id="error">
                                <svg data-encore-id="icon" style=" width:20px; height: 20px;  " fill="rgb(243, 114, 127)" role="img" aria-label="Error:" aria-hidden="true" class="Svg-sc-ytk21e-0 kisTW IconExclamationCircleForText-sc-1lnefk5-0 ryVAU" viewBox="0 0 16 16">
                                    <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"></path>
                                    <path d="M7.25 9V4h1.5v5h-1.5zm0 3.026v-1.5h1.5v1.5h-1.5z"></path>
                                </svg>
                                <span style="margin-left: 10px;">Congrats User added successfully</span>

                            </div>
                        <?php
                        } elseif ($userstatus == "album") {
                        ?>
                            <div class="" style=" color: rgb(243, 114, 127);display: flex;align-items: flex-start;justify-content: flex-start; flex-direction:row; margin:10px 0px;" id="error">
                                <svg data-encore-id="icon" style=" width:20px; height: 20px;  " fill="rgb(243, 114, 127)" role="img" aria-label="Error:" aria-hidden="true" class="Svg-sc-ytk21e-0 kisTW IconExclamationCircleForText-sc-1lnefk5-0 ryVAU" viewBox="0 0 16 16">
                                    <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"></path>
                                    <path d="M7.25 9V4h1.5v5h-1.5zm0 3.026v-1.5h1.5v1.5h-1.5z"></path>
                                </svg>
                                <span style="margin-left: 10px;">Album added successfully <br> but empty</span>

                            </div>
                        <?php
                        } elseif ($userstatus == "albumfalse") {
                        ?>
                            <div class="" style=" color: rgb(243, 114, 127);display: flex;align-items: flex-start;justify-content: flex-start; flex-direction:row; margin:10px 0px;" id="error">
                                <svg data-encore-id="icon" style=" width:20px; height: 20px;  " fill="rgb(243, 114, 127)" role="img" aria-label="Error:" aria-hidden="true" class="Svg-sc-ytk21e-0 kisTW IconExclamationCircleForText-sc-1lnefk5-0 ryVAU" viewBox="0 0 16 16">
                                    <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"></path>
                                    <path d="M7.25 9V4h1.5v5h-1.5zm0 3.026v-1.5h1.5v1.5h-1.5z"></path>
                                </svg>
                                <span style="margin-left: 10px;">Album already exsist </span>

                            </div>
                        <?php
                        } elseif ($userstatus == "playlist") {
                        ?>
                            <div class="" style=" color: rgb(243, 114, 127);display: flex;align-items: flex-start;justify-content: flex-start; flex-direction:row; margin:10px 0px;" id="error">
                                <svg data-encore-id="icon" style=" width:20px; height: 20px;  " fill="rgb(243, 114, 127)" role="img" aria-label="Error:" aria-hidden="true" class="Svg-sc-ytk21e-0 kisTW IconExclamationCircleForText-sc-1lnefk5-0 ryVAU" viewBox="0 0 16 16">
                                    <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"></path>
                                    <path d="M7.25 9V4h1.5v5h-1.5zm0 3.026v-1.5h1.5v1.5h-1.5z"></path>
                                </svg>
                                <span style="margin-left: 10px;">Playlist added successfully <br> but empty</span>

                            </div>
                        <?php
                        } elseif ($userstatus == "playlistfalse") {
                        ?>
                            <div class="" style=" color: rgb(243, 114, 127);display: flex;align-items: flex-start;justify-content: flex-start; flex-direction:row; margin:10px 0px;" id="error">
                                <svg data-encore-id="icon" style=" width:20px; height: 20px;  " fill="rgb(243, 114, 127)" role="img" aria-label="Error:" aria-hidden="true" class="Svg-sc-ytk21e-0 kisTW IconExclamationCircleForText-sc-1lnefk5-0 ryVAU" viewBox="0 0 16 16">
                                    <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"></path>
                                    <path d="M7.25 9V4h1.5v5h-1.5zm0 3.026v-1.5h1.5v1.5h-1.5z"></path>
                                </svg>
                                <span style="margin-left: 10px;">Playlist not added due to error.</span>

                            </div>
                    <?php
                        }elseif ($userstatus == "playlistdelete") {
                            ?>
                                <div class="" style=" color: rgb(243, 114, 127);display: flex;align-items: flex-start;justify-content: flex-start; flex-direction:row; margin:10px 0px;" id="error">
                                    <svg data-encore-id="icon" style=" width:20px; height: 20px;  " fill="rgb(243, 114, 127)" role="img" aria-label="Error:" aria-hidden="true" class="Svg-sc-ytk21e-0 kisTW IconExclamationCircleForText-sc-1lnefk5-0 ryVAU" viewBox="0 0 16 16">
                                        <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"></path>
                                        <path d="M7.25 9V4h1.5v5h-1.5zm0 3.026v-1.5h1.5v1.5h-1.5z"></path>
                                    </svg>
                                    <span style="margin-left: 10px;">Playlist Deleted.</span>
    
                                </div>
                        <?php
                            }
                    }
                    ?>

                    <div class="" style=" color: rgb(243, 114, 127);display: none;align-items: flex-start;justify-content: flex-start; flex-direction:row; margin:10px 0px;" id="error">
                        <svg data-encore-id="icon" style=" width:20px; height: 20px;  " fill="rgb(243, 114, 127)" role="img" aria-label="Error:" aria-hidden="true" class="Svg-sc-ytk21e-0 kisTW IconExclamationCircleForText-sc-1lnefk5-0 ryVAU" viewBox="0 0 16 16">
                            <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"></path>
                            <path d="M7.25 9V4h1.5v5h-1.5zm0 3.026v-1.5h1.5v1.5h-1.5z"></path>
                        </svg>
                        <span style="margin-left: 10px;">Please Select any id</span>

                    </div>
                    <table>
                        <tr>
                            <th>id</th>
                            <th>Select</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Gender</th>
                        </tr>
                        <?php


                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "spotify";

                        $connection = mysqli_connect($servername, $username, $password, $database);
                        if (!$connection) {
                            die('Sorry we fail to connect: ' . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `rigister`";
                            $result = $connection->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>

                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><input type="checkbox" name="selec" id="selec" value="<?php echo $row["id"] ?>"> </td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php echo $row["Name"] ?></td>
                                        <td><?php echo $row["password"] ?></td>
                                        <td><?php echo $row["gender"] ?></td>
                                    </tr>

                        <?php


                                }
                            }
                        }
                        ?>
                    </table>
                    <div class="editor">
                        <input type="submit" value="Delete">


                </form>

            </div>

            <div class="editor2">
                <button type="text" id="useradd" class="addbtn" onclick="useradd()">Add</button>
                <form action="process3.php" id="useradding" style="display: none;" method="post">
                    <label for="">Email</label>
                    <input type="hidden" name="form_type" value="form2">
                    <input name="useremail" type="email" placeholder="Email" required>
                    <label for="">Password:</label>
                    <input name="userpass" type="password" placeholder="Password" required>
                    <label for="">Name:</label>
                    <input name="username" type="text" placeholder="Username" required>
                    <label for="">DOB</label>
                    <input name="userdob" type="text" placeholder="Date oF Birth" required>
                    <label for="">Gender</label>
                    <input name="usergender" type="text" placeholder="Gender" required>
                    <input type="submit" class="addbtn" value="Add">

                </form>

            </div>


            </div>
            <hr>
            <div class="box box1">

                <h1>Add Album,Playlist to album,Artist</h1>
                <script>
                    function addalbum() {
                        document.getElementById('addalbum').style.display = "none";
                        document.getElementById('addplaylist').style.display = "none";
                        document.getElementById('form3').style.display = "flex";
                        document.getElementById('showplaylist').style.display = "none";


                    }

                    function addplaylist() {
                        document.getElementById('addalbum').style.display = "none";

                        document.getElementById('addplaylist').style.display = "none";
                        document.getElementById('showplaylist').style.display = "none";

                        document.getElementById('form4').style.display = "flex";

                    }

                    function showplaylist() {
                        document.getElementById('addalbum').style.display = "none";

                        document.getElementById('addplaylist').style.display = "none";
                        document.getElementById('showplaylist').style.display = "none";
                        document.getElementById('form6').style.display = "flex";

                    }
                    function back() {
                        window.location.reload()
                    }
                </script>

                <div style="margin:20px 0px">
                    <button style="width: 130px; cursor: grab;" class="addbtn" id="addalbum" onclick="addalbum()">Add Album</button>
                    <button style="width: 130px; cursor: grab;" class="addbtn" id="addplaylist" onclick="addplaylist()">Add Playlist</button>
                    <button style="width: 130px; cursor: grab;" class="addbtn" id="showplaylist" onclick="showplaylist()">Veiw Playlist</button>


                </div>
                <style>
                    .albselc {
                        width: 200px;
                        height: 40px;
                        background: grey;
                        color: white;
                        padding: 0px 20px;


                    }

                    .spinput {
                        /* color: white; */
                        padding: 10px;
                        box-sizing: border-box;

                        width: 200px;
                        height: 40px;
                        /* background: grey; */

                    }

                    textarea {
                        width: 200px;
                        height: 80px;
                        padding: 10px;
                        box-sizing: border-box;



                    }

                    .box1 {
                        height: 100% !important;
                    }
                </style>
                <form action="process3.php" style="display: none; flex-direction: column;" id="form6" method="post">
                    <input type="hidden" name="form_type" value="form6">

                    <div id="tableplaylist" style=" overflow-y: scroll; height: 350px; width:100%;">
                        <!-- <form action="process3.php" method="post" >      -->

                        <table>
                            <tr>
                                <th>id</th>
                                <th>Select</th>
                                <th>Album</th>
                                <th>Playlist</th>
                                <th>Discription</th>
                                <th>Image</th>
                            </tr>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "spotify";

                            $connection = mysqli_connect($servername, $username, $password, $database);

                            if (!$connection) {
                                echo ">>>";
                            } else {

                                $sql = "SELECT * FROM `playlist`";
                                $result = $connection->query($sql);
                                if ($result->num_rows > 0) {


                                    while ($row = $result->fetch_assoc()) {


                            ?>
                                        <tr>

                                            <td><?php echo $row['id'] ?></td>
                                            <td><input type="checkbox" name="selec" id="selec" value="<?php echo $row["id"] ?>" required> </td>

                                            <td><?php echo $row['album'] ?></td>
                                            <td><?php echo $row['playname'] ?></td>
                                            <td><?php echo $row['playdiscription'] ?></td>
                                            <td><?php echo $row['image'] ?></td>
                                        </tr>

                            <?php

                                    }
                                }
                            }
                            ?>


                        </table>
                        <!-- </form> -->

                    </div>
                    <div class="editor">
                        <button style="background-color: rebeccapurple; margin-right: 10px; width:100px; padding: 15px; color:white; font-weight:700; border-radius:15px;" type="button" onclick="back()" > Back</button>
                        <input type="submit" value="Delete">
                        <!-- <input type="button" value="Delete"> -->

                        
                    </div>
                </form>
                <form action="process3.php" id="form4" method="post" enctype="multipart/form-data" style="display: none; gap:20px; align-items:flex-start ;flex-direction: column;  ;margin:10px;">


                    <input type="hidden" name="form_type" value="form4">
                    <Label>Select Album :</Label>
                    <select name="slecalbum" id="" class="albselc" required>
                        <option value="" disabled selected>Select Album</option>
                        <?php
                        $dir = 'Albums'; // Current directory

                        $folders = glob($dir . '/*', GLOB_ONLYDIR);

                        foreach ($folders as $folder) {
                            $folderok = str_replace("Albums/", "", $folder);
                        ?>

                            <option value="<?php echo "$folderok"; ?>"><?php echo "$folderok"; ?></option>
                        <?php
                        }
                        ?>
                        ?>
                    </select>
                    <label for="">Enter Playlist Name:</label>
                    <input type="text" name="name" class="spinput" placeholder="Playlist Name" required>
                    <label for="">Enter Playlist discription:</label>
                    <textarea name="discription" id="" placeholder="Playlist Discription" required></textarea>
                    <label for="">Select Pic of Playlist</label>
                    <input type="file" name="image" required>
                    <input type="submit" class="spinput">


                </form>

                <form action="process3.php" id="form3" method="post" style="display: none; gap:20px; align-items:center ;margin:10px;">
                    <input type="hidden" name="form_type" value="form3">
                    <label for="">Enter Album name:</label>
                    <input type="text" required placeholder="Album name" name="albumname" style="height:40px; padding:8px ;box-sizing:border-box;">
                    <input type="submit" class="addbtn">

                </form>
            </div>



        </body>

        </html>
<?php

    } else {
        echo "Stay out of this!";
    }
} else {
    echo "you are on the wrong lane";
}

?>