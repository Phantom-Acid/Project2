function getData(php_arr) {
    var my_arr = php_arr;
    var data_points = [];

    for (var i = 0; i < my_arr.length; i++) {
        var date_arr = my_arr[i]['date'].split('-');
        var year = parseInt(date_arr[0]);
        var month = parseInt(date_arr[1]) - 1; // JavaScript counts months from 0 to 11
        var day = parseInt(date_arr[2]);
        data_points.push({
            x: new Date(year, month, day),
            y: my_arr[i]['amount']
        });
    }

    return data_points;
}
