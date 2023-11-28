$(function() {
    $("#filter_tahun").kendoDatePicker({
        start: "decade",
        depth: "decade",
        format: "yyyy", // Format tampilan tahun
        change: function(e) {
            // Callback yang dipanggil ketika tahun berubah
            var selectedYear = e.sender.value().getFullYear();
            window.location.href = BASE_URL+"/riwayat_pendidikan/?tahun="+selectedYear; 
        }
    });
    var dataSource = new kendo.data.DataSource({
        transport: {
            read: onRead,
        },
        batch: true,
        change: function() {
           $("#cancel").toggleClass("k-disabled", !this.hasChanges());
        },
        schema: {
            model: {
                // id: "ProductID",
                fields: {
                    id_registrasi_mahasiswa: { type: "string"},
                    id_mahasiswa: { type: "string" },
                    nim: { type: "string" },
                    nama_mahasiswa: { type: "string" },
                    nama_jenis_daftar: { type: "string" },
                    id_jenis_daftar: { type: "string" },
                    id_periode_masuk: { type: "string" },
                    nama_periode_masuk: { type: "string" },
                    id_perguruan_tinggi: { type: "string" },
                    nama_perguruan_tinggi: { type: "string" },
                    id_prodi: { type: "string" },
                    nama_program_studi: { type: "string" },
                    jenis_kelamin: { type: "string" },
                    tanggal_daftar: { type: "string" },
                    nama_ibu_kandung: { type: "string" },
                    biaya_masuk: { type: "string" },
                }
            }
        }
    });
    /*Handle spreedshet inizialisation*/ 
    $("#spreadsheet").kendoSpreadsheet({
        columns: 16,
        // rows: 100,
        toolbar: ['excel'],
        sheetsbar: false,
        dataBinding: function (e) {
            console.log('Data is about to be bound to sheet "' + e.sheet.name() + '".');
        },
        dataBound: function (e) {
            console.log('Data has been bound to sheet "' + e.sheet.name() + '".');
        },
        sheets: [{
            name: "RiwayatPendidikan",
            dataSource: dataSource,
            rows: [{
                height: 40,
                cells: [
                {
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                },{
                    bold: "true",
                    background: "#9c27b0",
                    textAlign: "center",
                    color: "white"
                }]
            }],
            columns: [
                { width: 250 },
                { width: 250 },
                { width: 100 },
                { width: 200 },
                { width: 70 },
                { width: 145 }
            ]
        }]
    });
    /*Handle onload data*/ 
    function onRead(options) {
        $.ajax({
            url: BASE_URL + "/ajax/load_riwayat_pendidikan",
            dataType: "JSON",
            data:{
                tahun
            },success: function (result) {
                options.success(result);
            },
            error: function (result) {
                options.error(result);
            }
        });
    }
    /*Handle cancel changes*/ 
    $("#cancel").click(function() {
        if (!$(this).hasClass("k-disabled")) {
            dataSource.cancelChanges();
        }
    });
});