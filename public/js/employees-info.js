$.jgrid.defaults.responsive = true;
$.jgrid.defaults.styleUI = 'Bootstrap';


$(".nav-sidebar li").on("click", function () {
    $(".nav-sidebar li").removeClass("active");
    $(this).addClass("active");
});

$(document).ready(function () {
    $("#jqGridInfo").jqGrid({
        url: "/employees/all",
        mtype: "GET",
        datatype: "json",
        page: 1,
        colModel: [
            {
                label : "Ful Name",
                name: 'ful_name',
                searchoptions: {
                    // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                    // use it to place a third party control to customize the toolbar
                    dataInit: function (element) {
                        $(element).autocomplete({
                            id: 'AutoComplete',
                            source: function(request, response){
                                this.xhr = $.ajax({
                                    url: 'http://trirand.com/blog/phpjqgrid/examples/jsonp/autocompletep.php?callback=?&acelem=ful_name',
                                    data: request,
                                    dataType: "jsonp",
                                    success: function( data ) {
                                        response( data );
                                    },
                                    error: function(model, response, options) {
                                        response([]);
                                    }
                                });
                            },
                            autoFocus: true,
                            autowidth: true
                        });
                    }
                }
            },
            {
                label : "Position",
                name: 'position',
                autowidth: true,
                searchoptions: {
                    // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                    // use it to place a third party control to customize the toolbar
                    dataInit: function (element) {
                        $(element).autocomplete({
                            id: 'AutoComplete',
                            source: function(request, response){
                                this.xhr = $.ajax({
                                    url: 'http://trirand.com/blog/phpjqgrid/examples/jsonp/autocompletep.php?callback=?&acelem=position',
                                    data: request,
                                    dataType: "jsonp",
                                    success: function( data ) {
                                        response( data );
                                    },
                                    error: function(model, response, options) {
                                        response([]);
                                    }
                                });
                            },
                            autoFocus: true
                        });
                    }
                }
            },
            {
                label: "Employment Date",
                name: 'employment_date',
                autowidth: true,
                sorttype:'date',
                searchoptions: {
                    // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                    // use it to place a third party control to customize the toolbar
                    dataInit: function (element) {
                        $(element).datepicker({
                            id: 'orderDate_datePicker',
                            dateFormat: 'yy-mm-dd',
                            //minDate: new Date(2010, 0, 1),
                            maxDate: new Date(2020, 0, 1),
                            showOn: 'focus'
                        });
                    },
                    // show search options
                    sopt: ["ge","le","eq"] // ge = greater or equal to, le = less or equal to, eq = equal to
                }
            },

            {
                label: "Salary",
                name: 'salary',
                autowidth: true,
                sorttype: 'number',
                searchoptions : {
                    // show search options
                    sopt: ["ge","le","eq"] // ge = greater or equal to, le = less or equal to, eq = equal to
                }
            }
        ],
        loadonce: true,
        viewrecords: true,
        autowidth: true,
        height: 'auto',
        rowNum: 20,
        pager: "#jqGridPager"
    });
    // activate the toolbar searching
    $('#jqGridInfo').jqGrid('filterToolbar',{
        // JSON stringify all data from search, including search toolbar operators
        stringResult: true,
        // instuct the grid toolbar to show the search options
        searchOperators: true
    });
});






