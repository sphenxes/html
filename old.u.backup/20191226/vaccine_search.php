
<?php
/*https://coolestguidesontheplanet.com/how-to-connect-to-a-mysql-database-with-php*/
ini_set("display_errors",1);
       error_reporting(E_ALL);



/*
$servername="localhost:3306";
$username="hesham";
$password="Hysedchshm0204";
$database="News";
*/

$servername="sql223.main-hosting.eu:3306";
$username="u233929990_hesh";
$password="Hysedchstngr0204";
$database="u233929990_news";


$connection = mysqli_connect($servername, $username, $password, $database);

$myTable=$_POST['tableName'];
$mySearchTerm=$_POST['searchterm'];
$myRadioButton=$_POST['radioTitle'];
/*
$mySubject = $_POST['subject'];
$myAuthor = $_POST['author'];
*/

//$query = "SELECT * FROM {$myTableName} where {$myTitle} like '%{$mySearchTerm}%' "; Working Version
//$query = "SELECT * FROM {$myTable} where title like '%{$mySearchTerm}%' or subject like '%{$mySearchTerm}%' or summary like '%{$mySearchTerm}%'";

$query = "SELECT * FROM {$myTable}
where ({$myRadioButton} like '%{$mySearchTerm}%' ) ";

#where (title like '%{$mySearchTerm}%' ) ";
#where (summary like '%{$mySearchTerm}%' ) ";
#where (subject like '%{$mySearchTerm}%' ) ";
#where (title like '%{$mySearchTerm}%' or subject like '%{$mySearchTerm}%') ";
#where (title like '%{$mySearchTerm}%' or subject like '%{$mySearchTerm}%'  or author like '%{$mySearchTerm}%' or summary like '%{$mySearchTerm}') ";

mysqli_query($connection, $query) or die('Error querying database.');
$result = mysqli_query($connection, $query);

echo "<table border='1'>";
echo "<tr> <th>Title </th> <th> Summary</th> <th> Subject</th> </tr>";

while ($row = mysqli_fetch_array($result))
{


echo "<tr><td>";
echo  "<a href='" .$row['source']. "'>" . $row['title'] ."</a>" ;
#echo  $row['source'] . '' .'<br />';
echo "</td><td>";

#echo "<tr><td>";
echo  $row['summary'] . ' ' .'<br />';
echo "</td> <td>";

echo  $row['subject'] . ' ' .'<br />';
echo "</td> <td>";

}

echo "</table>";


header('Refresh: 300; URL=http://localhost/news_search.html');

?>



<html>
<br>
<br>
<br>
<p>

<a href= "http://localhost/news_search.html"> Click Here to Return to Home  </a>
</p>
</body>

</html>
