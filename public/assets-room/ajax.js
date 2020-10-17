
var roomData = [];

$.ajax({
    method: 'GET',
    url: '/room/get-data',
    dataType: 'json',
    success: function(data)
    {
        var roomYes = data
        console.log('roomYes ===>',roomYes)

        $("#gridContainer").dxDataGrid({
            dataSource: roomYes.result,
            keyExpr: "id",
            showBorders: true,
            paging: {
                enabled: false
            },
            editing: {
                mode: "form",
                allowUpdating: true
            },
            columns: [
                "roomName",
                "capacity",
                "description",
                "color",
                "isActive"
            ]
        });
    }
});
