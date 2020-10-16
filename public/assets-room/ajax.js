
var roomData = [];

$.ajax({
    method: 'GET',
    url: '/room/get-data',
    dataType: 'json',
    success: function(data)
    {
        console.log(data)

        $("#gridContainer").dxDataGrid({
            dataSource: data.result,
            showBorders: true,
            paging: {
                enabled: false
            },
            editing: {
                mode: "form",
                allowUpdating: true
            },
            columns: [
                {
                    dataField: "Prefix",
                    caption: "Title",
                    width: 70
                },
                "FirstName",    
                "FirstName",
                "FirstName",
                "LastName", {
                    dataField: "Position",
                    width: 170
                }, {
                    dataField: "BirthDate",
                    dataType: "date"
                }, {
                    dataField: "Notes",
                    visible: false,
                    formItem: {
                        colSpan: 2,
                        editorType: "dxTextArea",
                        editorOptions: {
                            height: 100
                        }
                    }
                }
            ]
        });
    }
});
