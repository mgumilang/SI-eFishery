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
                <button class="btn btn-default">Edit Pegawai</button>
                <button class="btn btn-default">Edit Folder QC</button>  
            </div>
            <div class="nav-button">
                <button class="btn btn-default save">Save</button>      
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
    </script>
    <script src="js/date.js"></script>
</html>