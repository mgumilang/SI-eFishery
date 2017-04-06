<DOCTYPE! html>
<html>
    <header>
        <title>Inventory Manufaktur eFishery | History</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/history.css">
        <div class="date"></div>
    </header>
    <body>
        <div class="container-fluid">
        	<form>
                <div class="form-head">
                    <span class="oleh">
                        Search by:
                        <select name="jenis-masukan">
                            <option value="tanggal">Tanggal</option>
                            <option value="bulan">Bulan</option>
                            <option value="tahun">Tahun</option>
                        </select>
                        <span class="tanggal">
                            <input type="number" name="tanggal" min="1" max="31" step="1" value="1">
                        </span>
                        <span class="bulan">
                            <select name="bulan">
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </span>
                        <span class="tahun">
                            <input type="number" name="tanggal" min="2010" max="2017" step="1" value="2010">
                        </span>
                        <button type="button" class="btn btn-info">
							Search...
						</button>
                    </span>
                </div>
            </form>     
            <div class="form-body panel panel-default panel-light panel-summary">
                <div class="panel-body nopadding">
                    <div class="input-field">
                        <table>
                            
                        </table>
                    </div>
                </div>
            </div>
            <button class="btn btn-default">Back</button>
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/date.js"></script>
</html>