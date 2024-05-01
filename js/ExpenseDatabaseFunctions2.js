function load_new_content() {
    var selected_option = $("#category").val();

    if (selected_option == "Add Category") {
        $('#hidden-button').show();
    } else {
        $('#hidden-button').hide();
    }
}

function getData(php_arr) {
    
    var my_arr = php_arr;
    var data_points = [];

    for (var i = 0; i < my_arr.length; i++) {
        var date_arr = my_arr[i]['date'].split('-');
        var year = parseInt(date_arr[0]);
        var month = parseInt(date_arr[1]) - 1;
        var day = parseInt(date_arr[2]);
        data_points.push({
            x: new Date(year, month, day),
            y: my_arr[i]['amount']});
    }
    data_points.sort(function(a, b) {
        return a["x"] - b["x"];
    });

    return data_points;
}