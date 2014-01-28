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
$sql="SELECT * FROM Quizzes WHERE QuizID=$quizid";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$lecture = $row['AfterLectureQuiz'];

ob_end_flush();
ob_start();
$host="localhost"; // Host name 
$username="nk011269_admin"; // Mysql username 
$password="Tomw1991"; // Mysql password 
$db_name="nk011269_Feedback"; // Database name 

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

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

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Answer');
        data.addColumn('number', 'Count');
        data.addRows([
          ['Boring', <?php echo $q1ans[0] ?>],
          ['Not very interesting', <?php echo $q1ans[1] ?>],
          ['Interesting', <?php echo $q1ans[2] ?>],
          ['Very interesting', <?php echo $q1ans[3] ?>],
          ['Extremely interesting', <?php echo $q1ans[4] ?>]
        ]);
 	var data2 = new google.visualization.DataTable();
        data2.addColumn('string', 'Answer');
        data2.addColumn('number', 'Count');
        data2.addRows([
          ['Yes', <?php echo $q2ans[0] ?>],
          ['No', <?php echo $q2ans[1] ?>],
                  ]);
        var data3 = new google.visualization.DataTable();
        data3.addColumn('string', 'Answer');
        data3.addColumn('number', 'Count');
        data3.addRows([
          ['Too easy', <?php echo $q3ans[0] ?>],
          ['Somewhat easy', <?php echo $q3ans[1] ?>],
          ['Neither easy nor difficult', <?php echo $q3ans[2] ?>],
          ['Challenging', <?php echo $q3ans[3] ?>],
          ['Too difficult', <?php echo $q3ans[4] ?>]
        ]);
        var data4 = new google.visualization.DataTable();
        data4.addColumn('string', 'Answer');
        data4.addColumn('number', 'Count');
        data4.addRows([
          ['Not enough interaction', <?php echo $q4ans[0] ?>],
          ['Some interaction', <?php echo $q4ans[1] ?>],
          ['Enough interaction', <?php echo $q4ans[2] ?>],
          ['Lots of interaction', <?php echo $q4ans[3] ?>],
          ['Too Much interation', <?php echo $q4ans[4] ?>]
        ]);
        var data5 = new google.visualization.DataTable();
        data5.addColumn('string', 'Answer');
        data5.addColumn('number', 'Count');
        data5.addRows([
          ['Too slow', <?php echo $q5ans[0] ?>],
          ['Slow', <?php echo $q5ans[1] ?>],
          ['Well paced', <?php echo $q5ans[2] ?>],
          ['Fast', <?php echo $q5ans[3] ?>],
          ['Too fast', <?php echo $q5ans[4] ?>]
        ]);
        var data6 = new google.visualization.DataTable();
        data6.addColumn('string', 'Answer');
        data6.addColumn('number', 'Count');
        data6.addRows([
          ['Yes', <?php echo $q6ans[0] ?>],
          ['No', <?php echo $q6ans[1] ?>],
                  ]);
        var data7b = new google.visualization.DataTable();
        data7b.addColumn('string', 'Answer');
        data7b.addColumn('number', 'Count');
        data7b.addRows([
          ['Yes', <?php echo $q7bans[0] ?>],
          ['No', <?php echo $q7bans[1] ?>],
           ]);
        var data8b = new google.visualization.DataTable();
        data8b.addColumn('string', 'Answer');
        data8b.addColumn('number', 'Count');
        data8b.addRows([
          ['Yes', <?php echo $q8bans[0] ?>],
          ['No', <?php echo $q8bans[1] ?>],
           ]);   
        var data9b = new google.visualization.DataTable();
        data9b.addColumn('string', 'Answer');
        data9b.addColumn('number', 'Count');
        data9b.addRows([
          ['Too easy', <?php echo $q9bans[0] ?>],
          ['Somewhat easy', <?php echo $q9bans[1] ?>],
          ['Neither easy nor difficult', <?php echo $q9bans[2] ?>],
          ['Challenging', <?php echo $q9bans[3] ?>],
          ['Too difficult', <?php echo $q9bans[4] ?>]
        ]);
        var data9c = new google.visualization.DataTable();
        data9c.addColumn('string', 'Answer');
        data9c.addColumn('number', 'Count');
        data9c.addRows([
          ['Non-existent', <?php echo $q9cans[0] ?>],
          ['Sometimes there', <?php echo $q9cans[1] ?>],
          ['Good', <?php echo $q9cans[2] ?>],
          ['Very good', <?php echo $q9cans[3] ?>],
          ['Excellent', <?php echo $q9cans[4] ?>]
        ]);
        <?php if ($lecture != 1) { echo "var data10 = new google.visualization.DataTable();
        data10.addColumn('string', 'Answer');
        data10.addColumn('number', 'Count');
        data10.addRows([
          ['Too easy', $q10ans[0] ],
          ['Somewhat easy', $q10ans[1] ],
          ['Neither easy nor difficult', $q10ans[2]],
          ['Challenging', $q10ans[3] ],
          ['Too difficult', $q10ans[4] ]
        ]);";}?>
        
        // Set chart options
        var options = {'title':'How interesting did you find the module?',
                       'width':600,
                       'height':450,
                       legend : {position : 'none'}};
        var options2 = {'title':'Did you find the module easy to follow?',
                       'width':600,
                       'height':450,
                       pieSliceText: 'none'};
        var options3 = {'title':'How difficult did you find the module?',
                       'width':600,
                       'height':450,
                       legend : {position : 'none'}};
        var options4 = {'title':'How well did the lecturer interact with the group?',
                       'width':600,
                       'height':450,
                       legend : {position : 'none'}};
        var options5 = {'title':'How was the pace of the module?',
                       'width':600,
                       'height':450,
                       legend : {position : 'none'}};
        var options6 = {'title':'Did you learn something?',
                       'width':600,
                       'height':450,
                       pieSliceText: 'none'};
        var options7b = {'title':'Would you describe the lecture notes as useful?',
                       'width':600,
                       'height':450,
                       pieSliceText: 'none'};
        var options8b = {'title':'Would you describe the visual aids as useful?',
                       'width':600,
                       'height':450,
                       pieSliceText: 'none'};
        var options9b = {'title':'How easy was the practical work?',
                       'width':600,
                       'height':450,
                       legend : {position : 'none'}};
        var options9c = {'title':'How was the support in the practical sessions?',
                       'width':600,
                       'height':450,
                       legend : {position : 'none'}};
        <?php if ($lecture != 1) { echo "var options10 = {'title':'How did you find the coursework?',
                       'width':600,
                       'height':450,
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
      }
      
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="q1"></div>
    <div id="q2"></div>
    <div id="q3"></div>
    <div id="q4"></div>
    <div id="q5"></div>
    <div id="q6"></div>
    <div id="q7b"></div>
    <div id="q8b"></div>
    <div id="q9b"></div>
    <div id="q9c"></div>
    <div id="q10"></div>
  </body>
</html>