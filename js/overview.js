window.onload = function() {
  var category = 'Utilities';

  var my_arr = formatData(category);
  var options = {
      animationEnabled: true,
      theme: "light2",
      title: {text: "Percent of budget spent on ".concat(category)},
      data: [{ 
          type: "doughnut",
          startAngle: 270,
          indexLabelFontSize: 17,
          indexLabel: `
            {label} - #percent%`,
          dataPoints: my_arr
      }]
  };
  options.data[0].dataPoints[0].color = "red";
  options.data[0].dataPoints[1].color = "#E8E8E8";
  $("#chartContainer").CanvasJSChart(options);

  var options2 = {
      animationEnabled: true,
      theme: "light2",
      title: {text: "Budget composition"},
      data: [{ 
          type: "doughnut",
          startAngle: 270,
          indexLabelFontSize: 17,
          indexLabel: `
            {label} - #percent%`,
          dataPoints: formatData2()
      }]
  };

  $("#chartContainer2").CanvasJSChart(options2);
  
};

function formatData2() {
  var cats = <?php echo json_encode($categories, JSON_NUMERIC_CHECK); ?>;
  var total = 0;
  return_arr = [];

  for (let i=0; i < cats.length; i++) {
    total = total + cats[i]['limitAmount'];
  }
  

  for (let i=0; i < cats.length; i++) {
    var a = Math.round(cats[i]['spent'] / cats[i]['limitAmount'] * 100);
    return_arr.push({
      y: a,
      label: cats[i]['category']
    });
  }

  return return_arr;
}

function formatData(category) {
  var cats = <?php echo json_encode($categories, JSON_NUMERIC_CHECK); ?>;
  var return_arr = []

  for (let i=0; i < cats.length; i++) {
    if (cats[i]['category'] == category) {
      var a = Math.round(cats[i]['spent'] / cats[i]['limitAmount'] * 100);
      return_arr.push({
        y: a,
        label: category
      });
    }
  }

  var remaining = () => {
    if (return_arr[0]['y'] < 100) {
      return 100 - return_arr[0]['y']; 
    }
    else {
      return 0;
    }
  };
  return_arr.push({y: remaining(), label: 'Remaining'});

  return return_arr;
}

function change_content() {

  var category = $("#category").val();

  var my_arr = formatData(category);

  var options = {
      animationEnabled: true,
      theme: "light2",
      title: {text: "Percent of budget spent on ".concat(category)},
      data: [{ 
          type: "doughnut",
          startAngle: 270,
          indexLabelFontSize: 17,
          indexLabel: `
            {label} - #percent%`,
          dataPoints: my_arr
      }]
  };

  options.data[0].dataPoints[0].color = "red";
  options.data[0].dataPoints[1].color = "#E8E8E8";
  $("#chartContainer").CanvasJSChart(options);


}