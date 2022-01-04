<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$db_name = "lab";
$title = "list_of_companies";
$sql = 'SELECT * FROM `list_of_companies`';

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Статус подключения: Connecting failed".$conn->connect_error);
}
mysqli_set_charset($conn, 'utf8mb4_general_ci');
echo "<p>Статус подключения: Connected successfully</p>";
if(isset($_GET["indicators"])&&$_GET["indicators"] == "yes"){
    $title = "list_of_indicators";
    $sql = 'SELECT * FROM `list_of_indicators`';
}
else if(isset($_GET["regions"])&&$_GET["regions"] == "yes"){
    $title = "list_of_regions";
    $sql = 'SELECT * FROM `list_of_regions`';
}
else if(isset($_GET["entries"])&&$_GET["entries"] == "yes") {
    $title = "log_entries";
    $sql = 'SELECT * FROM `log_entries`';
}

$result  = mysqli_query($conn,$sql);
$arrayResult = [];

if(!$result){
    print("Произошла ошибка");
}else{
    while($row = mysqli_fetch_array($result)){
        $arrayResult[] = $row;
    }
}

echo '<table>';
    echo "<h3 align='center'>Таблица: ". $title . "</h3>";
    echo '<tr>';
    $key = array_keys($arrayResult[0]);
    for($j = 0; $j < count($key);$j++){
        if(!is_numeric($key[$j]))
            echo '<td class="col-title">'. $key[$j] . '</td>';
    }
    echo '</tr>';
for($i = 0; $i < count($arrayResult);$i++){
    echo '<tr>';
    for($j = 0; $j < count($arrayResult[$i]) / 2;$j++){
            echo '<td>'. $arrayResult[$i][$j] . '</td>';
    }
    echo '</tr>';
}
echo '</table>';

?>
