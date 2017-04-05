<DOCTYPE! html>
<html>
    <header>
        <title>Inventory Manufaktur eFishery | Homepage</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <div class="date"></div>
    </header>
    <body>
        <div class="row">
            <div class="col-md-6">
                <div class="menu">
                    <button id="New" onclick="location.href='new-supply.php';">New</button>
                    <button id="Edit" onclick="location.href='edit.php';">Edit</button>
                    <button id="Search" onclick="location.href='search.php';">Search</button>
                    <button id="History" onclick="location.href='history.php';">History</button>
                    <button id="Settings" onclick="location.href='settings.php';">Settings</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="logo">
                    <img src="img/logo.png">
                </div>
            </div>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/date.js"></script>
    <script src="js/index.js"></script>
</html>
