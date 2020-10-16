$(function() {
    

var employees = [{
    text : "John Heart",
    id: 1,
    color: "#56ca85",
    avatar: "https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/gym/coach-man.png",
    age: 27,
    discipline: "ABS, Fitball, StepFit"
}, {
    text : "Sandra Johnson",
    id: 2,
    color: "#ff9747",
    avatar: "https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/gym/coach-woman.png",
    age: 25,
    discipline: "ABS, Fitball, StepFit"
}];

var data = [{ 
        text: "Helen",
        employeeID: 2,
        startDate: new Date(2016, 7, 2, 9, 30),
        endDate: new Date(2016, 7, 2, 11, 30)
    }, {
        text: "Helen",
        employeeID: 2,
       startDate: new Date(2016, 7, 11, 9, 30),
        endDate: new Date(2016, 7, 12, 11, 30)
    }, {
        text: "Alex",
        employeeID: 1,
        startDate: new Date(2016, 7, 3, 9, 30),
        endDate: new Date(2016, 7, 3, 11, 30)
    }, {
        text: "Alex",
        employeeID: 1,
        startDate: new Date(2016, 7, 12, 12, 0),
        endDate: new Date(2016, 7, 12, 13, 0)
    }, {
        text: "Alex",
        employeeID: 2,
        startDate: new Date(2016, 7, 17, 9, 30),
        endDate: new Date(2016, 7, 17, 11, 30)
    }, {
        text: "Stan",
        employeeID: 1,
        startDate: new Date(2016, 7, 8, 9, 30),
        endDate: new Date(2016, 7, 8, 11, 30)
    }, {
        text: "Stan",
        employeeID: 1,
        startDate: new Date(2016, 7, 29, 9, 30),
        endDate: new Date(2016, 7, 29, 11, 30)
    }, {
        text: "Stan",
        employeeID: 1,
        startDate: new Date(2016, 7, 31, 9, 30),
        endDate: new Date(2016, 7, 31, 11, 30)
    },
     {
        text: "Rachel",
        employeeID: 2,
        startDate: new Date(2016, 7, 5, 9, 30),
        endDate: new Date(2016, 7, 5, 11, 30)
    }, {
        text: "Rachel",
        employeeID: 2,
        startDate: new Date(2016, 7, 8, 9, 30),
        endDate: new Date(2016, 7, 8, 11, 30)
    }, {
        text: "Rachel",
        employeeID: 1,
        startDate: new Date(2016, 7, 22, 9, 30),
        endDate: new Date(2016, 7, 22, 11, 30)
    }, {
        text: "Kelly",
        employeeID: 2,
        startDate: new Date(2016, 7, 16, 9, 30),
        endDate: new Date(2016, 7, 16, 11, 30)
    }, {
        text: "Kelly",
        employeeID: 2,
        startDate: new Date(2016, 7, 30, 9, 30),
        endDate: new Date(2016, 7, 30, 11, 30)
    }];

    
    $(".scheduler").dxScheduler({
        dataSource: data,
        views: ["month"],
        currentView: "month",
        currentDate: new Date(2016, 7, 2, 11, 30),
        firstDayOfWeek: 1,
        startDayHour: 8,
        endDayHour: 18,
        showAllDayPanel: false,
        height: 600,
        groups: ["employeeID"],
        resources: [
            {
                fieldExpr: "employeeID",
                allowMultiple: false,
                dataSource: employees,
                label: "Employee"
            }
        ],
        dataCellTemplate: function (cellData, index, container) {
            var employeeID = cellData.groups.employeeID,
                currentTraining = getCurrentTraining(cellData.startDate.getDate(), employeeID);

            var wrapper = $("<div>")
                .toggleClass("employee-weekend-" + employeeID, isWeekEnd(cellData.startDate)).appendTo(container)
                .addClass("employee-" + employeeID)
                .addClass("dx-template-wrapper");

            wrapper.append($("<div>")
                .text(cellData.text)
                .addClass(currentTraining)
                .addClass("day-cell")
            );

        },
        resourceCellTemplate: function (cellData) {
            var name = $("<div>")
                .addClass("name")
                .css({ backgroundColor: cellData.color })
                .append($("<h2>")
                    .text(cellData.text));

            var avatar = $("<div>")
                .addClass("avatar")
                .html("<img src=" + cellData.data.avatar + ">")
                .attr("title", cellData.text);

            var info = $("<div>")
                .addClass("info")
                .css({ color: cellData.color })
                .html("Age: " + cellData.data.age + "<br/><b>" + cellData.data.discipline + "</b>");

            return $("<div>").append([name, avatar, info]);
        }
    });

    function isWeekEnd(date) {
        var day = date.getDay();
        return day === 0 || day === 6;
    }

    function getCurrentTraining(date, employeeID) {
        var result = (date + employeeID) % 3,
            currentTraining = "training-background-" + result;

        return currentTraining;
    }
});