

<head>
<title>What is in the News?</title>
<!-- <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> -->
</head>
<body>

<?php

ini_set("display_errors",1);
       error_reporting(E_ALL);

$servername="localhost:3306";
$username="hesham";
$password="Hysedchshm0204";
$database="News";

$connection = mysqli_connect($servername, $username, $password, $database);

#http://richardcummings.info/apostrophe-input-form-php-mysql-the-easy-solution/

/*function removeUmlout($str) {
  $a = array('Ä', 'ä', 'Ü', 'ü', 'Ö', 'ö');
  $b = array('ae', 'Ae','Ue','ue', 'Oe', 'oe');
  return str_replace($a, $b, $str);
}
*/


echo "--------------------" ."<br>";
$myTable=$_POST['tableName'];
$myTitle=$_POST['title'];
$myTitle = str_replace("'"," ",$myTitle);
#$myTitle = str_replace("\""," ",$myTitle);
#$myTitle = str_replace("ä","ae",$myTitle);
$myTitle = mysqli_real_escape_string($connection, $myTitle);
$mySource=$_POST['source'];
$mySubject=$_POST['subject'];
#$mySubject = str_replace("'","''",$mySubject);
$mySubject = mysqli_real_escape_string($connection, $mySubject);
$myAuthor=$_POST['author'];
#$myAuthor = str_replace("'","''",$myAuthor);
$mySummary=$_POST['summary'];
//$mySummary = mysql_real_escape_string($mySummary);
#$mySummary = str_replace("'","''",$mySummary);
//$mySummary = str_replace(""","",$mySummary);
//https://www.php.net/manual/en/function.mysql-real-escape-string.php
$mySummary = mysqli_real_escape_string($connection, $mySummary);
$myComments=$_POST['comments'];
#$myComments = str_replace("'","''",$myComments);
#$myDate=$_POST['datum'];
$myBibliography=$_POST['bibliography'];
#$myBibliography = str_replace("'","''",$myBibliography);
#echo "id" . $id . "<br>";
//$myDelete=$_POST['delete'];

echo "Table Name:" . $myTable ."<br>";
echo "Title:" . $myTitle ."<br>";
echo "Source:" . $mySource ."<br>";
echo "Subject:" . $mySubject ."<br>";
echo "Author:" . $myAuthor ."<br>";
echo "Summary:" . $mySummary ."<br>";
echo "Comments:" . $myComments ."<br>";
#echo "Date:" . $myDate ."<br>";
echo "Bibliography:" . $myBibliography ."<br>";

#$query = "INSERT INTO {$myTable} (title, source, subject, author, summary, comments, datum, bibliography)
#VALUES ('$myTitle', '$mySource', '$mySubject', '$myAuthor', '$mySummary', '$myComments', '$myDate', '$myBibliography')";

$query = "INSERT INTO {$myTable} (title, source, subject, author, summary, comments, datum, bibliography)
VALUES ('$myTitle', '$mySource', '$mySubject', '$myAuthor', '$mySummary', '$myComments', CURDATE(), '$myBibliography')";

#$result = mysqli_query($connection, $query) or die('Connection Error');
$result = mysqli_query($connection, $query) or die('Connection Error');
#$query = "INSERT INTO plants (plantsName, comments) VALUES ('$plant', '$mycomment')";
#$query = mysqli_query("INSERT INTO '$mytable' (plantsName, comments) VALUES ('$plant', '$mycomment')") or die('No Connection');
#mysqli_query($connection, $query) or die('Connection Error');

mysqli_close($connection);

header('Refresh: 60; URL=http://localhost/news.html');

//Select Statament
//https://www.w3schools.com/php/php_mysql_select.asp
// Create connection

$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

#$sql = "SELECT idpolitics, title, source FROM Politics";
$sql = "SELECT idpolitics, title, source FROM Politics";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        //echo "<br>". "id: " . $row["idpolitics"]."<br>". "Title: " . $row["title"]. "<br>"."URL: " . $row["source"]. "<br>";
       echo  "<br>". "<br>" . "id: " . $row["idpolitics"]."<br>". "Title: " . $row["title"]. "<br>" . "<br>";
         //echo '<a href="'.$row["source"].'"> '.$row["source"].' </a>';
         echo '<a href=""> '.$row["source"].' </a>';
         //echo '<a href="'.$row["source"].'"> </a>';
    }
} else {
    echo "0 results";
}

$conn->close();


?>
<br>
<br>
<br>
<a href= "http://localhost/news.html"> Click Here to Return to Home  </a>

</body>


</html>


<!--
Step by Step Guide on How to Solve the Encoding Issues with Weird Characters
When creating the database in MySQL make sure all the string fields have utf8_spanish_ci charset and the charset of the tables is
utf_unicode_ci (you can change it later in phpMyAdmin going to Operations > Collation)
Make sure you specify a Content-type in all your HTML files, inside the <head> tag:
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
And in those files you output without HTML headers (XML, AJAX/JSON calls, APIs…) put this in the PHP:
header("Content-Type: text/html;charset=utf-8");
When establishing the connection between PHP and MySQL send this query before any other:
mysql_query("SET NAMES 'utf8'");
Remove the DefaultCharset in Apache or modify it
Following these steps will solve the weird accents problem in your server. If it still doesn’t work post a comment below and we’ll help you.
https://xaviesteve.com/1223/issues-with-accents-and-strange-characters-in-php-mysql-solved/

-->
