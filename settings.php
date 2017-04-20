<?php 
    require_once('module/PengolahPegawai.php');

    require_once('dbconfig.php');
    global $HOST;
    global $NAME;
    global $USER;
    global $PASS;
    
    // Database credential
    $dbHost = $HOST;
    $dbName = $NAME;
    $dbUser = $USER;
    $dbPass = $PASS;

    // create instance
    $dbhelper = new DatabaseHelper($dbHost, $dbName, $dbUser, $dbPass);
    $hm = new PengolahPegawai($dbhelper);

    if(isset($_GET['type'])) {
        if ($_GET['type'] == 'delete') {
            $hasil = $hm->delete($_GET['idpegawai']);
        } else if ($_GET['type'] == 'add') {
            $hasil = $hm->insert($_GET['namapegawai']);
        } else if ($_GET['type' == 'folder']) {
            
        }
    }

?>
<DOCTYPE! html>
<html>
    <header>
        <title>Inventory Manufaktur eFishery | Edit</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/settings.css">
        <div class="date"></div>
    </header>
    <body>
        <div class="container-fluid">
        	<span class="sub-title">Settings</span>
            <div class="edit-button">
                <!-- Trigger/Open The Modal -->
                <button class="btn btn-default" id="edit-button">Edit Pegawai</button>

                <!-- The Modal -->
                <div id="pegawaiModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">Close &times;</span>
                        <div class="row">
                            <div class="col-md-6 delete-form">
                                <form action="" method="GET">
                                    <br>
                                    <div class="form-group">
                                        <label>ID Pegawai:</label>
                                        <input type="text" class="form-control" name="idpegawai">
                                    </div>
                                    <input type="hidden" name="type" value="delete">
                                    <br>
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                            <div class="col-md-6 add-form">
                                <form action="" method="GET">
                                    <div class="form-group">
                                        <label>Nama Pegawai:</label>
                                        <input type="text" class="form-control" name="namapegawai">
                                    </div>
                                    <input type="hidden" name="type" value="add">
                                    <br>
                                    <input type="submit" class="btn btn-success" value="Add">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-default" id="edit-folder-button">Edit Folder QC</button>  
                <!-- The Modal -->
                <div id="folderModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">Close &times;</span>
                        <div class="row">
                            <div class="col-md-12 folder-form">
                                <form action="middleware/change-path.php" method="POST">
                                    <div class="form-group">
                                        <label>Path Folder:</label>
                                        <input type="text" class="form-control" name="path" value="<?php

                                        require('module/PengolahBarang.php');

                                        echo PengolahBarang::getPath();
                                    ?>">
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <style type="text/css">
                /* The Modal (background) */
                .modal {
                    display: none; /* Hidden by default */
                    position: fixed; /* Stay in place */
                    z-index: 1; /* Sit on top */
                    left: 0;
                    top: 0;
                    width: 100%; /* Full width */
                    height: 100%; /* Full height */
                    overflow: auto; /* Enable scroll if needed */
                    background-color: rgb(0,0,0); /* Fallback color */
                    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                }

                /* Modal Content/Box */
                .modal-content {
                    background-color: #fefefe;
                    margin: 15% auto; /* 15% from the top and centered */
                    padding: 20px;
                    border: 1px solid #888;
                    width: 80%; /* Could be more or less, depending on screen size */
                }

                /* The Close Button */
                .close {
                    color: #444;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                }

                .close:hover,
                .close:focus {
                    color: black;
                    text-decoration: none;
                    cursor: pointer;
                }

                .delete-form {
                    margin-top: 5.5px;
                }
            </style>
            <div class="nav-button">     
                <button class="btn btn-default back" id="back-button">Back</button>
            </div>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $('#back-button').click(function(e){
            e.preventDefault();
            window.location.href = "index.php";
        })

        // Get the modal
        var modal = document.getElementById('pegawaiModal');
        var modalfolder = document.getElementById('folderModal');

        // Get the button that opens the modal
        var btn = document.getElementById("edit-button");
        var btnfolder = document.getElementById("edit-folder-button");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var spanfolder = document.getElementsByClassName("close")[1];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        btnfolder.onclick = function() {
            modalfolder.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        spanfolder.onclick = function() {
            modalfolder.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal || event.target == modalfolder) {
                modal.style.display = "none";
                modalfolder.style.display = "none";
            }
        }
    </script>
    <script src="js/date.js"></script>
</html>