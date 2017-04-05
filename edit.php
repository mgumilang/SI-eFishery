<DOCTYPE! html>
<html>
    <header>
        <title>Inventory Manufaktur eFishery | Edit</title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/edit.css">
        <div class="date"></div>
    </header>
    <body>
        <div class="container-fluid">
        	<form>
                <div class="form-head">
                    <span class="oleh">
                        ID Barang:
                        <input type="text" name="oleh">
                        <button type="button" class="btn btn-info">
							Search...
						</button>
                    </span>
                </div>
                <div class="form-body panel panel-default panel-light panel-summary">
                    <div class="panel-body nopadding">
                        <div class="input-field">
                            <table>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>: </td>
                                    <td><input type="text" name="namaBarang"></td>
                                    <td>Tanggal Masuk</td>
                                    <td>: </td>
                                    <td><input type="text" name="namaBarang"></td>
                                </tr>
                                <tr>
                                    <td>Jenis Barang</td>
                                    <td>: </td>
                                    <td><input type="text" name="jenisBarang"></td>
                                    <td>Status</td>
                                    <td>: </td>
                                    <td><input type="radio" name="sedia" value="ada" checked> Ada
      <input type="radio" name="sedia" value="kosong"> Tidak ada</td>
                                </tr>
                                <tr>
                                    <td>Hasil</td>
                                    <td>: </td>
                                    <td><input type="radio" name="hasil" value="lulus" checked> Lulus
      <input type="radio" name="hasil" value="gagal"> Tidak lulus</td>
      								<td></td>
      								<td></td>
      								<td></td>
                                </tr>
                                <tr>
                                    <td>File</td>
                                    <td>: </td>
                                    <td><input type="file" name="namaFile"></td>
      								<td></td>
      								<td></td>
      								<td></td>
                                </tr>
                                <tr>
                                    <td valign="top">Keterangan</td>
                                    <td valign="top">: </td>
                                    <td><textarea class="form-control" rows="5"></textarea></td>
      								<td></td>
      								<td></td>
      								<td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Confirm</button>
            </form>     
            <button class="btn btn-default">Back</button>
            <button class="btn btn-default">Reset</button>  	
        </div>
    </body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/date.js"></script>
</html>