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
                    id_prodi: { type: "string"},
                    kode_program_studi: { type: "string" },
                    nama_program_studi: { type: "string" },
                    status: { type: "string" },
                    id_jenjang_pendidikan: { type: "string" },
                    nama_jenjang_pendidikan: { type: "string" },
                }
            }
        }
    });
    /*Handle spreedshet inizialisation*/ 
    $("#spreadsheet").kendoSpreadsheet({
        columns: 6,
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
            name: "ProgramStudi",
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
                }]
            }],
            columns: [
                { width: 250 },
                { width: 70 },
                { width: 250 },
                { width: 70 },
                { width: 70 },
                { width: 70 }
            ]
        }]
    });
    /*Handle onload data*/ 
    function onRead(options) {
        $.ajax({
            url: BASE_URL + "/ajax/load_prodi_pt",
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