<?php
if(empty($_COOKIE['user_cook']))
{
header("location:admin_login_success.php");
}

ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 
$quizid = $_GET['quiz'];

$loggedin=$_COOKIE['user_cook'];
// Connect to server and select databse.
// Create connection
$con=mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT * FROM Quizzes WHERE QuizID=$quizid";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$lecture = $row['AfterLectureQuiz'];
$module = $row['ModuleID'];
$passphrase = $row['Passphrase'];
if ($_COOKIE['admin_cook'] == 0)
{
if ($_COOKIE['module1_cook'] != $module)
{
if ($_COOKIE['module2_cook'] != $module)
{
if ($_COOKIE['module3_cook'] != $module)
{
if ($_COOKIE['module4_cook'] != $module)
{
if ($_COOKIE['module5_cook'] != $module)
{
header("location:quizzes.php");
}
}
}
}
}
}



ob_end_flush();

ob_start();


$sql="SELECT * FROM QuizResponses WHERE QuizID=$quizid";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if ($count > 0) {
//do graph stuff

//create lots of counting arrays

$q1ans = array(0,0,0,0,0);
$q2ans = array(0,0);
$q3ans = array(0,0,0,0,0);
$q4ans = array(0,0,0,0,0);
$q5ans = array(0,0,0,0,0);
$q6ans = array(0,0);
$q7ans = array(0,0);
$q7bans = array(0,0);
$q8ans = array(0,0);
$q8bans = array(0,0);
$q9ans = array(0,0);
$q9bans = array(0,0,0,0,0);
$q9cans = array(0,0,0,0,0);
$q10ans = array(0,0,0,0,0);

while($row = mysqli_fetch_array($result)){
$q1 = $row['Q1'];
$q2 = $row['Q2'];
$q3 = $row['Q3'];
$q4 = $row['Q4'];
$q5 = $row['Q5'];
$q6 = $row['Q6'];
$q7 = $row['Q7'];
$q7b = $row['Q7b'];
$q8 = $row['Q8'];
$q8b = $row['Q8b'];
$q9 = $row['Q9'];
$q9b = $row['Q9b'];
$q9c = $row['Q9c'];
$q10 = $row['Q10'];

switch ($q1){
case 1:
$q1ans[0]++;
break;
case 2:
$q1ans[1]++;
break;
case 3:
$q1ans[2]++;
break;
case 4:
$q1ans[3]++;
break;
case 5:
$q1ans[4]++;
break;
default:
break;
}
switch ($q2){
case 1:
$q2ans[0]++;
break;
case 2:
$q2ans[1]++;
break;
default:
break;
}
switch ($q3){
case 1:
$q3ans[0]++;
break;
case 2:
$q3ans[1]++;
break;
case 3:
$q3ans[2]++;
break;
case 4:
$q3ans[3]++;
break;
case 5:
$q3ans[4]++;
break;
default:
break;
}
switch ($q4){
case 1:
$q4ans[0]++;
break;
case 2:
$q4ans[1]++;
break;
case 3:
$q4ans[2]++;
break;
case 4:
$q4ans[3]++;
break;
case 5:
$q4ans[4]++;
break;
default:
break;
}
switch ($q5){
case 1:
$q5ans[0]++;
break;
case 2:
$q5ans[1]++;
break;
case 3:
$q5ans[2]++;
break;
case 4:
$q5ans[3]++;
break;
case 5:
$q5ans[4]++;
break;
default:
break;
}
switch ($q6){
case 1:
$q6ans[0]++;
break;
case 2:
$q6ans[1]++;
break;
case 3:
$q6ans[2]++;
break;
case 4:
$q6ans[3]++;
break;
case 5:
$q6ans[4]++;
break;
default:
break;
}
switch ($q7){
case 1:
$q7ans[0]++;
break;
case 2:
$q7ans[1]++;
break;
default:
break;
}
switch ($q7b){
case 1:
$q7bans[0]++;
break;
case 2:
$q7bans[1]++;
default:
break;
}
switch ($q8){
case 1:
$q8ans[0]++;
break;
case 2:
$q8ans[1]++;
break;
default:
break;
}
switch ($q8b){
case 1:
$q8bans[0]++;
break;
case 2:
$q8bans[1]++;
break;
default:
break;
}
switch ($q9){
case 1:
$q9ans[0]++;
break;
case 2:
$q9ans[1]++;
break;
default:
break;
}
switch ($q9b){
case 1:
$q9bans[0]++;
break;
case 2:
$q9bans[1]++;
break;
case 3:
$q9bans[2]++;
break;
case 4:
$q9bans[3]++;
break;
case 5:
$q9bans[4]++;
break;
default:
break;
}
switch ($q9c){
case 1:
$q9cans[0]++;
break;
case 2:
$q9cans[1]++;
break;
case 3:
$q9cans[2]++;
break;
case 4:
$q9cans[3]++;
break;
case 5:
$q9cans[4]++;
break;
default:
break;
}
switch ($q10){
case 1:
$q10ans[0]++;
break;
case 2:
$q10ans[1]++;
break;
case 3:
$q10ans[2]++;
break;
case 4:
$q10ans[3]++;
break;
case 5:
$q10ans[4]++;
break;
default:
break;
}
}
}
else{
//error stuff
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Results</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">

  <script type="text/javascript" src="rgbcolor.js"></script> 
  <script type="text/javascript" src="canvg.js"></script> 
  <script type="text/javascript" src="grChartImg.js"></script>   
  <script type="text/javascript" src="jquery/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="jsPDF/jspdf.js"></script>
  <script type="text/javascript" src="jsPDF/jspdf.plugin.standard_fonts_metrics.js"></script> 
  <script type="text/javascript" src="jsPDF/jspdf.plugin.split_text_to_size.js"></script>               
  <script type="text/javascript" src="jsPDF/jspdf.plugin.from_html.js"></script>
  <script type="text/javascript" src="jsPDF/jspdf.plugin.addimage.js"></script>
  <script type="text/javascript" src="js/FileSaver.js"></script>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
	var csv, csv2, csv3, csv4, csv5, csv6, csv7b, csv8b, csv9b, csv9c, csv10, csvall;
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

		// Create the data table.
        var data = google.visualization.arrayToDataTable([
		['Answer', 'Count',  { role: 'annotation' } ],
		['Boring', <?php echo $q1ans[0] ?>, <?php echo $q1ans[0] ?>],
        ['Not very interesting', <?php echo $q1ans[1] ?>, <?php echo $q1ans[1] ?>],
        ['Interesting', <?php echo $q1ans[2] ?>, <?php echo $q1ans[2] ?>],
        ['Very interesting', <?php echo $q1ans[3] ?>, <?php echo $q1ans[3] ?>],
        ['Extremely interesting', <?php echo $q1ans[4] ?>, <?php echo $q1ans[4] ?>]
        ]);
		
		
		var data2 = google.visualization.arrayToDataTable([
		['Answer', 'Count'],
		['Yes', <?php echo $q2ans[0] ?>],
		['No', <?php echo $q2ans[1] ?>],
		]);
		
		var data3 = google.visualization.arrayToDataTable([
		['Answer', 'Count',  { role: 'annotation' } ],
		['Too easy', <?php echo $q3ans[0] ?>,<?php echo $q3ans[0] ?>],
        ['Somewhat easy', <?php echo $q3ans[1] ?>,<?php echo $q3ans[1] ?>],
        ['Neither easy nor difficult', <?php echo $q3ans[2] ?>,<?php echo $q3ans[2] ?>],
        ['Challenging', <?php echo $q3ans[3] ?>,<?php echo $q3ans[3] ?>],
        ['Too difficult', <?php echo $q3ans[4] ?>,<?php echo $q3ans[4] ?>]
        ]);
		
		var data4 = google.visualization.arrayToDataTable([
		['Answer', 'Count',  { role: 'annotation' } ],
		['Not enough interaction', <?php echo $q4ans[0] ?>,<?php echo $q4ans[0] ?>],
        ['Some interaction', <?php echo $q4ans[1] ?>,<?php echo $q4ans[1] ?>],
        ['Enough interaction', <?php echo $q4ans[2] ?>,<?php echo $q4ans[2] ?>],
        ['Lots of interaction', <?php echo $q4ans[3] ?>,<?php echo $q4ans[3] ?>],
        ['Too Much interation', <?php echo $q4ans[4] ?>,<?php echo $q4ans[4] ?>]
        ]);
		
		var data5 = google.visualization.arrayToDataTable([
		['Answer', 'Count',  { role: 'annotation' } ],
		['Too slow', <?php echo $q5ans[0] ?>,<?php echo $q5ans[0] ?>],
        ['Slow', <?php echo $q5ans[1] ?>,<?php echo $q5ans[1] ?>],
        ['Well paced', <?php echo $q5ans[2] ?>, <?php echo $q5ans[2] ?>],
        ['Fast', <?php echo $q5ans[3] ?>, <?php echo $q5ans[3] ?>],
        ['Too fast', <?php echo $q5ans[4] ?>, <?php echo $q5ans[4] ?>]
        ]);
		
		var data6 = google.visualization.arrayToDataTable([
		['Answer', 'Count'],
		['Yes', <?php echo $q6ans[0] ?>],
		['No', <?php echo $q6ans[1] ?>],
		]);
		
		var data7b = google.visualization.arrayToDataTable([
		['Answer', 'Count'],
		['Yes', <?php echo $q7bans[0] ?>],
		['No', <?php echo $q7bans[1] ?>],
		]);
		
		var data8b = google.visualization.arrayToDataTable([
		['Answer', 'Count'],
		['Yes', <?php echo $q8bans[0] ?>],
		['No', <?php echo $q8bans[1] ?>],
		]);
		
		var data9b = google.visualization.arrayToDataTable([
		['Answer', 'Count',  { role: 'annotation' } ],
		['Too easy', <?php echo $q9bans[0] ?>,<?php echo $q9bans[0] ?>],
        ['Somewhat easy', <?php echo $q9bans[1] ?>,<?php echo $q9bans[1] ?>],
        ['Neither easy nor difficult', <?php echo $q9bans[2] ?>,<?php echo $q9bans[2] ?>],
        ['Challenging', <?php echo $q9bans[3] ?>,<?php echo $q9bans[3] ?>],
        ['Too difficult', <?php echo $q9bans[4] ?>,<?php echo $q9bans[4] ?>]
        ]);
		
		var data9c = google.visualization.arrayToDataTable([
		['Answer', 'Count',  { role: 'annotation' } ],
		['Non-existent', <?php echo $q9cans[0] ?>,<?php echo $q9cans[0] ?>],
        ['Sometimes there', <?php echo $q9cans[1] ?>,<?php echo $q9cans[1] ?>],
        ['Good', <?php echo $q9cans[2] ?>,<?php echo $q9cans[2] ?>],
        ['Very good', <?php echo $q9cans[3] ?>,<?php echo $q9cans[3] ?>],
        ['Excellent', <?php echo $q9cans[4] ?>,<?php echo $q9cans[4] ?>]
        ]);
		<?php if ($lecture != 1) { echo "var data10 = google.visualization.arrayToDataTable([
		['Answer', 'Count',  { role: 'annotation' } ],
        ['Too easy', $q10ans[0],$q10ans[0] ],
        ['Somewhat easy', $q10ans[1],$q10ans[1] ],
        ['Neither easy nor difficult', $q10ans[2],$q10ans[2]],
        ['Challenging', $q10ans[3],$q10ans[3] ],
        ['Too difficult', $q10ans[4],$q10ans[4] ]
        ]);";}?>
		
		
		//OLD WAY, changed to array of arrays for labelling. Kept just in case.
        // var data = new google.visualization.DataTable();
        // data.addColumn('string', 'Answer');
        // data.addColumn('number', 'Count');
        // data.addRows([
          // ['Boring', <?php echo $q1ans[0] ?>],
          // ['Not very interesting', <?php echo $q1ans[1] ?>],
          // ['Interesting', <?php echo $q1ans[2] ?>],
          // ['Very interesting', <?php echo $q1ans[3] ?>],
          // ['Extremely interesting', <?php echo $q1ans[4] ?>]
        // ]);
		
		// var data2 = new google.visualization.DataTable();
			// data2.addColumn('string', 'Answer');
			// data2.addColumn('number', 'Count');
			// data2.addRows([
			  // ['Yes', <?php echo $q2ans[0] ?>],
			  // ['No', <?php echo $q2ans[1] ?>],
					  // ]);
		
        // var data3 = new google.visualization.DataTable();
        // data3.addColumn('string', 'Answer');
        // data3.addColumn('number', 'Count');
        // data3.addRows([
          // ['Too easy', <?php echo $q3ans[0] ?>],
          // ['Somewhat easy', <?php echo $q3ans[1] ?>],
          // ['Neither easy nor difficult', <?php echo $q3ans[2] ?>],
          // ['Challenging', <?php echo $q3ans[3] ?>],
          // ['Too difficult', <?php echo $q3ans[4] ?>]
        // ]);
		
		
        // var data4 = new google.visualization.DataTable();
        // data4.addColumn('string', 'Answer');
        // data4.addColumn('number', 'Count');
        // data4.addRows([
          // ['Not enough interaction', <?php echo $q4ans[0] ?>],
          // ['Some interaction', <?php echo $q4ans[1] ?>],
          // ['Enough interaction', <?php echo $q4ans[2] ?>],
          // ['Lots of interaction', <?php echo $q4ans[3] ?>],
          // ['Too Much interation', <?php echo $q4ans[4] ?>]
        // ]);
		
        // var data5 = new google.visualization.DataTable();
        // data5.addColumn('string', 'Answer');
        // data5.addColumn('number', 'Count');
        // data5.addRows([
          // ['Too slow', <?php echo $q5ans[0] ?>],
          // ['Slow', <?php echo $q5ans[1] ?>],
          // ['Well paced', <?php echo $q5ans[2] ?>],
          // ['Fast', <?php echo $q5ans[3] ?>],
          // ['Too fast', <?php echo $q5ans[4] ?>]
        // ]);
		
        // var data6 = new google.visualization.DataTable();
        // data6.addColumn('string', 'Answer');
        // data6.addColumn('number', 'Count');
        // data6.addRows([
          // ['Yes', <?php echo $q6ans[0] ?>],
          // ['No', <?php echo $q6ans[1] ?>],
                  // ]);
				  
        // var data7b = new google.visualization.DataTable();
        // data7b.addColumn('string', 'Answer');
        // data7b.addColumn('number', 'Count');
        // data7b.addRows([
          // ['Yes', <?php echo $q7bans[0] ?>],
          // ['No', <?php echo $q7bans[1] ?>],
           // ]);
		   
        // var data8b = new google.visualization.DataTable();
        // data8b.addColumn('string', 'Answer');
        // data8b.addColumn('number', 'Count');
        // data8b.addRows([
          // ['Yes', <?php echo $q8bans[0] ?>],
          // ['No', <?php echo $q8bans[1] ?>],
           // ]);   
		   
        // var data9b = new google.visualization.DataTable();
        // data9b.addColumn('string', 'Answer');
        // data9b.addColumn('number', 'Count');
        // data9b.addRows([
          // ['Too easy', <?php echo $q9bans[0] ?>],
          // ['Somewhat easy', <?php echo $q9bans[1] ?>],
          // ['Neither easy nor difficult', <?php echo $q9bans[2] ?>],
          // ['Challenging', <?php echo $q9bans[3] ?>],
          // ['Too difficult', <?php echo $q9bans[4] ?>]
        // ]);
		
        // var data9c = new google.visualization.DataTable();
        // data9c.addColumn('string', 'Answer');
        // data9c.addColumn('number', 'Count');
        // data9c.addRows([
          // ['Non-existent', <?php echo $q9cans[0] ?>],
          // ['Sometimes there', <?php echo $q9cans[1] ?>],
          // ['Good', <?php echo $q9cans[2] ?>],
          // ['Very good', <?php echo $q9cans[3] ?>],
          // ['Excellent', <?php echo $q9cans[4] ?>]
        // ]);
		
        // var data10 = new google.visualization.DataTable();
        // data10.addColumn('string', 'Answer');
        // data10.addColumn('number', 'Count');
        // data10.addRows([
          // ['Too easy', $q10ans[0] ],
          // ['Somewhat easy', $q10ans[1] ],
          // ['Neither easy nor difficult', $q10ans[2]],
          // ['Challenging', $q10ans[3] ],
          // ['Too difficult', $q10ans[4] ]
        // ]);
        
        // Set chart options
        var options = {'title':'How interesting did you find the <?php if ($lecture != 1) { echo "module"; } else{ echo "lecture"; }?>?',
                       'width':600,
                       'height':450,
					   chartArea: {width: '50%'},
                       legend : {position : 'none'}};
        var options2 = {'title':'Did you find the <?php if ($lecture != 1) { echo "module"; } else{ echo "lecture"; }?> easy to follow?',
                       'width':600,
                       'height':450,};
        var options3 = {'title':'How difficult did you find the <?php if ($lecture != 1) { echo "module"; } else{ echo "lecture"; }?>?',
                       'width':600,
                       'height':450,
					   chartArea: {width: '50%'},
                       legend : {position : 'none'}};
        var options4 = {'title':'How well did the lecturer interact with the group?',
                       'width':600,
                       'height':450,
					   chartArea: {width: '50%'},
                       legend : {position : 'none'}};
        var options5 = {'title':'How was the pace of the <?php if ($lecture != 1) { echo "module"; } else{ echo "lecture"; }?>?',
                       'width':600,
                       'height':450,
					   chartArea: {width: '50%'},
                       legend : {position : 'none'}};
        var options6 = {'title':'Did you learn something?',
                       'width':600,
                       'height':450,};
        var options7b = {'title':'Would you describe the lecture notes as useful?',
                       'width':600,
                       'height':450,};
        var options8b = {'title':'Would you describe the visual aids as useful?',
                       'width':600,
                       'height':450,};
        var options9b = {'title':'How easy was the practical work?',
                       'width':600,
                       'height':450,
					   chartArea: {width: '50%'},
                       legend : {position : 'none'}};
        var options9c = {'title':'How was the support in the practical sessions?',
                       'width':600,
                       'height':450,
					   chartArea: {width: '50%'},
                       legend : {position : 'none'}};
        <?php if ($lecture != 1) { echo "var options10 = {'title':'How did you find the coursework?',
                       'width':600,
                       'height':450,
					   chartArea: {width: '50%'},
                       legend : {position : 'none'}};";} ?>


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('q1'));
        chart.draw(data, options);
        var chart2 = new google.visualization.PieChart(document.getElementById('q2'));
        chart2.draw(data2, options2);
        var chart3 = new google.visualization.BarChart(document.getElementById('q3'));
        chart3.draw(data3, options3);
        var chart4 = new google.visualization.BarChart(document.getElementById('q4'));
        chart4.draw(data4, options4);
        var chart5 = new google.visualization.BarChart(document.getElementById('q5'));
        chart5.draw(data5, options5);
        var chart6 = new google.visualization.PieChart(document.getElementById('q6'));
        chart6.draw(data6, options6);
        var chart7b = new google.visualization.PieChart(document.getElementById('q7b'));
        chart7b.draw(data7b, options7b);
        var chart8b = new google.visualization.PieChart(document.getElementById('q8b'));
        chart8b.draw(data8b, options8b);
        var chart9b = new google.visualization.BarChart(document.getElementById('q9b'));
        chart9b.draw(data9b, options9b);
        var chart9c = new google.visualization.BarChart(document.getElementById('q9c'));
        chart9c.draw(data9c, options9c);
        <?php if ($lecture != 1) { echo "var chart10 = new google.visualization.BarChart(document.getElementById('q10'));
        chart10.draw(data10, options10);" ;} ?>
		
	csv = google.visualization.dataTableToCsv(data);
	csv2 = google.visualization.dataTableToCsv(data2);
	csv3 = google.visualization.dataTableToCsv(data3);
	csv4 = google.visualization.dataTableToCsv(data4);
	csv5 = google.visualization.dataTableToCsv(data5);
	csv6 = google.visualization.dataTableToCsv(data6);
	csv7b = google.visualization.dataTableToCsv(data7b);
	csv8b = google.visualization.dataTableToCsv(data8b);
	csv9b = google.visualization.dataTableToCsv(data9b);
	csv9c = google.visualization.dataTableToCsv(data9c);
	<?php if ($lecture != 1) { echo "csv10 = google.visualization.dataTableToCsv(data10);" ;} ?>
	csvall = options.title + "\n" + csv + "\n" + options2.title + "\n" + csv2 + "\n" + options3.title + "\n" + csv3 + "\n" + options4.title + "\n" + csv4 + "\n" + options5.title + "\n" + csv5 + "\n" + options6.title + "\n" + csv6 + "\n" + options7b.title + "\n" + csv7b + "\n" + options8b.title + "\n" + csv8b + "\n" + options9b.title + "\n" + csv9b + "\n" + options9c.title + "\n" + csv9c + "\n" <?php if ($lecture != 1) { echo '+ options10.title + "\n" + csv10 + "\n"';}?>; 
	
      }
	  
	
    </script>
  </head>

  <body>
   <h1>
   <?php echo $module . " " ?>Results - Passhprase: "<?php echo $passphrase ?>"
   </h1>
	<!--
		<a href="javascript:grChartImg.ShowImage('q1', true)">Click me</a>
		<a href="javascript:getImageData('q1')">No, click me</a>
		<a href="javascript:demo()" class="button">Run Code</a>
																			-->
	<p><a class="btn btn-primary" href="javascript:pdf()" role="button">Download all as PDF</a> <a class="btn btn-success" href="javascript:getcsv(11)" role="button">Download all as CSV</a> <a class="btn btn-info" href="detailed_results.php?quiz=<?php echo $_GET['quiz'] ?>" role="button">View detailed feedback</a>
	<a class="btn btn-warning" href="quizzes.php" role="button">Go back</a> <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>
	<div id="results">
	<!--Divs that will hold the pie chart-->
	<!--div style="float: left"-->
	<div class="row">
	<div class="col-md-6">
	<div id="q1" style="width: 600px; height: 450px;"></div>
	<a class="btn btn-info"href="javascript:getImageData(1)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(1)" role="button">Download as CSV</a>
	</div>
	<div class="col-md-6">
	<div id="q2"></div>
	<a class="btn btn-info"href="javascript:getImageData(2)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(2)" role="button">Download as CSV</a>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
	<div id="q3"></div>
	<a class="btn btn-info"href="javascript:getImageData(3)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(3)" role="button">Download as CSV</a>
	</div>
	<div class="col-md-6">
	<div id="q4"></div>
	<a class="btn btn-info"href="javascript:getImageData(4)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(4)" role="button">Download as CSV</a>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
	<div id="q5"></div>
	<a class="btn btn-info"href="javascript:getImageData(5)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(5)" role="button">Download as CSV</a>
	</div>
	<div class="col-md-6">
	<div id="q6"></div>
	<a class="btn btn-info"href="javascript:getImageData(6)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(6)" role="button">Download as CSV</a>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
	<div id="q7b"></div>
	<a class="btn btn-info"href="javascript:getImageData(7)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(7)" role="button">Download as CSV</a>
	</div>
	<div class="col-md-6">
	<div id="q8b"></div>
	<a class="btn btn-info"href="javascript:getImageData(8)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(8)" role="button">Download as CSV</a>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
	<div id="q9b"></div>
	<a class="btn btn-info"href="javascript:getImageData(9)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(9)" role="button">Download as CSV</a>
	</div>
	<div class="col-md-6">
	<div id="q9c"></div>
	<a class="btn btn-info"href="javascript:getImageData(9.5)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(9.5)" role="button">Download as CSV</a>
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-6">
	<div id="q10"></div>
	<?php if ($lecture != 1) { echo '<a class="btn btn-info"href="javascript:getImageData(10)" role="button">Save image</a> <a class="btn btn-success" href="javascript:getcsv(10)" role="button">Download as CSV</a>' ;} ?>
	</div>
	</div>
    
	</div>
	<br>
	<br>
	<p> <a class="btn btn-warning" href="admin_login_success.php" role="button">Go back</a>  &nbsp; &nbsp; &nbsp;  <a class="btn btn-danger" href="Logout.php" role="button">Log out</a> </p>
	<script type="text/javascript">
	function getImageData(number){
	var div_name
	var filename
	switch (number)
	{
	case 1:
	div_name = 'q1';
	filename = 'howinteresting.jpg';
	break;
	case 2:
	div_name = 'q2';
	filename = 'easytofollow.jpg';
	break;
	case 3:
	div_name = 'q3';
	filename = 'howdifficult.jpg';
	break;
	case 4:
	div_name = 'q4';
	filename = 'lecturerinteraction.jpg';
	break;
	case 5:
	div_name = 'q5';
	filename = 'pace.jpg';
	break;
	case 6:
	div_name = 'q6';
	filename = 'learnsomething.jpg';
	break;
	case 7:
	div_name = 'q7b';
	filename = 'usefulnotes.jpg';
	break;
	case 8:
	div_name = 'q8b';
	filename = 'usefulvisualaids.jpg';
	break;
	case 9:
	div_name = 'q9b';
	filename = 'practicaleasy.jpg';
	break;
	case 9.5:
	div_name = 'q9c';
	filename = 'practicalsupport.jpg';
	break;
	case 10:
	div_name = 'q10';
	filename = 'coursework.jpg';
	break;
	default:
	div_name = 'q1';
	filename = 'howinteresting.jpg';
	break;
	}

	
	//Set the exported Image Format.Supported jpeg and png type.      
  //To Change Image Format, call before any procedure the SetImageFormat method.
  grChartImg.SetImageFormat = {type:'jpeg'};
  
  var imageData=grChartImg.GetImageData(div_name);
  post_to_url('save.php', {d: imageData, f: filename});
  //img_download(imageData);
  // var url = imageData.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
// window.open(url);

  }
  </script>
  <script type="text/javascript">
  	
	//credit to Rakesh Pai http://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit/133997#133997
	function post_to_url(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
	
	
	/* function img_download(data){
	var str = "save.php?i=";
	str = str + data;
	str = str + "f=howinteresting.jpg";
	window.open(str,"_self")
	}
   */</script>
  <script type="text/javascript">
  
  function pdf() {

  //grChartImg.SetImageFormat = {type:'jpeg'};
  
  var imgDataQ1=grChartImg.GetImageData('q1');
  var imgDataQ2=grChartImg.GetImageData('q2');
  var imgDataQ3=grChartImg.GetImageData('q3');
  var imgDataQ4=grChartImg.GetImageData('q4');
  var imgDataQ5=grChartImg.GetImageData('q5');
  var imgDataQ6=grChartImg.GetImageData('q6');
  var imgDataQ7b=grChartImg.GetImageData('q7b');
  var imgDataQ8b=grChartImg.GetImageData('q8b');
  var imgDataQ9b=grChartImg.GetImageData('q9b');
  var imgDataQ9c=grChartImg.GetImageData('q9c');
  <?php if ($lecture != 1) { echo "var imgDataQ10=grChartImg.GetImageData('q10');" ;} ?>
  var doc = new jsPDF();
doc.setFontSize(16);
doc.text(20, 20, '<?php echo $module. ' Results - Passhprase: "' . $passphrase .'"'?>');
  doc.addImage(imgDataQ1, 'JPEG', 5, 25, 100, 75);
  doc.addImage(imgDataQ2, 'JPEG', 110, 25, 100, 75);
  doc.addImage(imgDataQ3, 'JPEG', 5, 105, 100, 75);
  doc.addImage(imgDataQ4, 'JPEG', 110, 105, 100, 75);
  doc.addImage(imgDataQ5, 'JPEG', 5, 185, 100, 75);
  doc.addImage(imgDataQ6, 'JPEG', 110, 185, 100, 75);
  doc.addPage();
  doc.addImage(imgDataQ7b, 'JPEG', 5, 5, 100, 75);
  doc.addImage(imgDataQ8b, 'JPEG', 110, 5, 100, 75);
  doc.addImage(imgDataQ9b, 'JPEG', 5, 85, 100, 75);
  doc.addImage(imgDataQ9c, 'JPEG', 110, 85, 100, 75);
  <?php if ($lecture != 1) { echo "doc.addImage(imgDataQ10, 'JPEG', 5, 165, 100, 75);" ;} ?>
  


  doc.output('save', 'feedback_results.pdf'); 
    }
</script>
<script type = "text/javascript">

function getcsv(csvnumber){
var thiscsv
var filename
	switch (csvnumber)
	{
	case 1:
	thiscsv = csv;
	filename = 'howinteresting.csv';
	break;
	case 2:
	thiscsv = csv2;
	filename = 'easytofollow.csv';
	break;
	case 3:
	thiscsv = csv3;
	filename = 'howdifficult.csv';
	break;
	case 4:
	thiscsv = csv4;
	filename = 'lecturerinteraction.csv';
	break;
	case 5:
	thiscsv = csv5;
	filename = 'pace.csv'
	break;
	case 6:
	thiscsv = csv6;
	filename = 'learnsomething.csv';
	break;
	case 7:
	thiscsv = csv7b;
	filename = 'usefulnotes.csv';
	break;
	case 8:
	thiscsv = csv8b;
	filename = 'usefulvisualaids.csv';
	break;
	case 9:
	thiscsv = csv9b;
	filename = 'practicaleasy.csv';
	break;
	case 9.5:
	thiscsv = csv9c;
	filename = 'practicalsupport.csv';
	break;
	case 10:
	thiscsv = csv10;
	filename = 'coursework.csv';
	break;
	case 11:
	thiscsv = csvall;
	filename = 'FeedbackResults.csv';
	break;
	default:
	thiscsv = csv;
	filename = 'howinteresting.csv';
	break;
	}
	//post_to_url('save.php', {d: thiscsv, f: filename});
	downloadCSV(thiscsv, filename)
	}
</script>
<script type="text/javascript">
function downloadCSV (csv_out, filename) {
            var blob = new Blob([csv_out], {type: 'text/csv;charset=utf-8'});
            var url  = window.URL || window.webkitURL;
            var link = document.createElementNS("http://www.w3.org/1999/xhtml", "a");
            link.href = url.createObjectURL(blob);
            link.download = filename; 

            var event = document.createEvent("MouseEvents");
            event.initEvent("click", true, false);
            link.dispatchEvent(event); 
}
</script>
  </body>
</html>