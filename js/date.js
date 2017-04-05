var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Obktober', 'November', 'Desemebr'];

var n = new Date();
var y = n.getFullYear();
var m = months[n.getMonth()];
var d = n.getDate();
var h = days[n.getDay()];

$(document).ready(function() {
    $('.date').text(h + ", " + d + " " + m + " " + y);
});