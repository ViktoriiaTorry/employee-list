$.jgrid.defaults.responsive = true;
$.jgrid.defaults.styleUI = 'Bootstrap';


$(".nav-sidebar li").on("click", function () {
    $(".nav-sidebar li").removeClass("active");
    $(this).addClass("active");
});

    $(document).ready(function () {
        $("#jqGridIndex").jqGrid({
            url: "/employees/all",
            mtype: "GET",
            datatype: "json",
            colModel: [
                {label: 'Ful name', name: 'ful_name', editable: false, sortable: false},
                {label: 'Position', name: 'position'},
                {label: 'id', name: 'id', hidden: true}
            ],
            loadonce: true,
            height: 'auto',
            autowidth: true,
            rowNum: 20,
            subGrid: true, // set the subGrid property to true to show expand buttons for each row
            subGridRowExpanded: showChildGridIndex, // javascript function that will take care of showing the child grid
            subGridOptions: {
                // configure the icons from theme rolloer
                plusicon: "glyphicon-hand-right",
                minusicon: "glyphicon-hand-down"
                //openicon: "ui-icon-arrowreturn-1-e"
            },
            pager: "#jqGridPager"
        });

    });

// the event handler on expanding parent row receives two parameters
// the ID of the grid tow  and the primary key of the row

    function showChildGridIndex(parentRowID, parentRowKey) {
        var childGridID = parentRowID + "_table";
        var childGridPagerID = parentRowID + "_pager";

        // send the parent row primary key to the server so that we know which grid to show
        // var childGridURL = parentRowKey + ".json";
        //childGridURL = childGridURL + "&parentRowID=" + encodeURIComponent(parentRowKey)

        // add a table and pager HTML elements to the parent grid row - we will render the child grid here
        $('#' + parentRowID).append('<table id=' + childGridID + '></table><div id=' + childGridPagerID + ' class=scroll></div>');
        var rdata = jQuery("#jqGridIndex").getRowData(parentRowKey);
        console.log(rdata);
        var manager_id = rdata['id'];

        $("#" + childGridID).jqGrid({
            url: '/employees/' + manager_id,
            mtype: "GET",
            datatype: "json",
            page: 1,
            colModel: [
        {label: 'Ful name', name: 'ful_name', editable: false, sortable: false },
        {label: 'Position', name: 'position'},
        {label: 'id', name: 'id', width: 0, hidden: true}
            ],
            loadonce: true,
            autowidth: true,
            height: '100%',
            subGrid: true, // set the subGrid property to true to show expand buttons for each row
            subGridRowExpanded: showThirdLevelChildGridIndex, // javascript function that will take care of showing the child grid
            pager: "#" + childGridPagerID
        });
    }

// the event handler on expanding parent row receives two parameters
// the ID of the grid tow  and the primary key of the row
function showThirdLevelChildGridIndex(parentRowID, parentRowKey) {
    var childGridID = parentRowID + "_table";
    var childGridPagerID = parentRowID + "_pager";

    // send the parent row primary key to the server so that we know which grid to show
  //  var childGridURL = "child3.json";

    // add a table and pager HTML elements to the parent grid row - we will render the child grid here
    $('#' + parentRowID).append('<table id=' + childGridID + '></table><div id=' + childGridPagerID + ' class=scroll></div>');

    var rdata = jQuery("#jqGridIndex").getRowData(parentRowKey);
    console.log(rdata);
    var manager_id = rdata['id'];

    $("#" + childGridID).jqGrid({
        url: '/employees/' + manager_id,
        mtype: "GET",
        datatype: "json",
        colModel: [
            {label: 'Ful name', name: 'ful_name', editable: false, sortable: false },
            {label: 'Position', name: 'position'},
            {label: 'id', name: 'id', width: 0, hidden: true}
        ],
        loadonce: true,
        autowidth: true,
        height: '100%',
        subGrid: true, // set the subGrid property to true to show expand buttons for each row
        subGridRowExpanded: showFourthLevelChildGridIndex, // javascript function that will take care of showing the child grid
        pager: "#" + childGridPagerID
    });

}

function showFourthLevelChildGridIndex(parentRowID, parentRowKey) {
        var childGridID = parentRowID + "_table";
        var childGridPagerID = parentRowID + "_pager";

        // add a table and pager HTML elements to the parent grid row - we will render the child grid here
        $('#' + parentRowID).append('<table id=' + childGridID + '></table><div id=' + childGridPagerID + ' class=scroll></div>');

        var rdata = jQuery("#jqGridIndex").getRowData(parentRowKey);
        console.log(rdata);
        var manager_id = rdata['id'];

        $("#" + childGridID).jqGrid({
            url: '/employees/' + manager_id,
            mtype: "GET",
            datatype: "json",
            colModel: [
                {label: 'Ful name', name: 'ful_name', editable: false, sortable: false },
                {label: 'Position', name: 'position'},
                {label: 'id', name: 'id', width: 0, hidden: true}
            ],
            loadonce: true,
            autowidth: true,
            height: '100%',
            subGrid: true, // set the subGrid property to true to show expand buttons for each row
            subGridRowExpanded: showFifthLevelChildGridIndex, // javascript function that will take care of showing the child grid
            pager: "#" + childGridPagerID
        });

    function showFifthLevelChildGridIndex(parentRowID, parentRowKey) {
        var childGridID = parentRowID + "_table";
        var childGridPagerID = parentRowID + "_pager";

        // add a table and pager HTML elements to the parent grid row - we will render the child grid here
        $('#' + parentRowID).append('<table id=' + childGridID + '></table><div id=' + childGridPagerID + ' class=scroll></div>');

        var rdata = jQuery("#jqGridIndex").getRowData(parentRowKey);
        console.log(rdata);
        var manager_id = rdata['id'];

        $("#" + childGridID).jqGrid({
            url: '/employees/' + manager_id,
            mtype: "GET",
            datatype: "json",
            colModel: [
                {label: 'Ful name', name: 'ful_name', editable: false, sortable: false},
                {label: 'Position', name: 'position'},
            ],
            loadonce: true,
            autowidth: true,
            height: '100%',
            pager: "#" + childGridPagerID
        });
    }
}





