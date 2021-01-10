<?php 
    require('connect.php');
?>
<!DOCTYPE html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html"/>
    <link rel="styleshhet" type='text/css' href='style.css'/>
</head>
<body>
    <?php 
    $query = $_GET['query'];
    $min_length = 2;
    if(strlen($query) >= $min_length){
        $query = htmlspecialchars($query);
        $query = mysqli_real_escape_string($conn,$query);
        $sql =  "SELECT * FROM lop WHERE (`namvaotruong` LIKE '%".$query."%') OR (`khoihientai` LIKE '%".$query."%')";
        $raw_result = mysqli_query($conn, $sql) or die(mysqli_error());
        if(mysqli_num_rows($raw_result) > 0){
            while($results = mysqli_fetch_array($raw_result)){
                echo "<p><h3>".$results['namvaotruong']."</h3>".$results['khoihientai']."</p>";
            }
        }
        else{
            echo "No results";
        }
    }
    else{
        echo "Minimum length is ".$min_length;
    }
    ?>
</body>
</html>