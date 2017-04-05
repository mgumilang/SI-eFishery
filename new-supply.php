<DOCTYPE! html>
<html>
    <header>
    	<title>Inventory Manufaktur eFishery | New</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <div class="date"></div>
    </header>
    <body>
    	<form>
    		<div class="form-head">
    			<span class="tipe">
    				Tipe: 
    				<select name="data-masukan">
    					<option value="supply">Supply</option>
    					<option value="pengambilan">Pengambilan</option>
    					<option value="qc">QC</option>
    				</select>
    			</span>
    			<span class="jumlah">
    				Jumlah:
    				<input type="number" name="jumlah" min="0" step="1" value="0">
    			</span>
    		</div>
    		<div class="form-body panel panel-default panel-light panel-summary">
				<div class="panel-body nopadding">
					<div class="input-field">
						<table>
							<tr>
								<td>ID</td>
								<td>: <input type="text" name="ID"></td>
							</tr>
							<tr>
								<td>Nama Barang</td>
								<td>: <input type="text" name="namaBarang"></td>
							</tr>
							<tr>
								<td>Jenis Barang</td>
								<td>: <input type="text" name="jenisBarang"></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
            <button type="submit" class="btn btn-default">Insert</button>
    	</form>    	
        <button class="btn btn-default">Back</button>
        <button class="btn btn-default">Reset</button>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/date.js"></script>
</html>