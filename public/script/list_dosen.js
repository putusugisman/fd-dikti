$(function() {
    $("#filter_tahun").kendoDatePicker({
        start: "decade",
        depth: "decade",
        format: "yyyy", // Format tampilan tahun
        change: function(e) {
            // Callback yang dipanggil ketika tahun berubah
            var selectedYear = e.sender.value().getFullYear();
            window.location.href = BASE_URL+"?tahun="+selectedYear; 
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
                    id_dosen: { type: "string"},
                    nama_dosen: { type: "string" },
                    nidn: { type: "string" },
                    nip: { type: "string" },
                    jenis_kelamin: { type: "string" },
                    id_agama: { type: "string" },
                    nama_agama: { type: "string" },
                    tanggal_lahir: { type: "string" },
                    id_status_aktif: { type: "string" },
                    nama_status_aktif: { type: "string" },
                }
            }
        }
    });
    /*Handle spreedshet inizialisation*/ 
    $("#spreadsheet").kendoSpreadsheet({
        columns: 10,
        rows: 200,
        scrollable: { virtual: true },
        toolbar: ['excel'],
        sheetsbar: false,
        dataBinding: function (e) {
            console.log('Data is about to be bound to sheet "' + e.sheet.name() + '".');
        },
        dataBound: function (e) {
            console.log('Data has been bound to sheet "' + e.sheet.name() + '".');
        },
        sheets: [{
            name: "ListDosen",
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
                }]
            }],
            columns: [
                { width: 250 },
                { width: 200 },
                { width: 100 },
                { width: 150 },
                { width: 100 },
                { width: 100 },
                { width: 100 },
                { width: 100 },
                { width: 100 },
                { width: 100 },
            ]
        }]
    });
    /*Handle onload data*/ 
    function onRead(options) {
        $.ajax({
            url: BASE_URL + "/ajax/load_list_dosen",
            dataType: "JSON",
            success: function (result) {
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
            dataSource.refresh();
        }
    });
});