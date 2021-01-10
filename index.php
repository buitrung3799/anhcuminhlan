<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quan Ly Sinh Vien</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-">
    <link rel="stylesheet" href="tablle.css" />
</head>
<body>
    <?php 
    require('connect.php');
    ?>
    <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="#">Cau 1</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </ul>
    <div class='searchBtn'>
        <h1>Search Form</h1>
        <form action='search.php' method='GET'>
            <input type='text' name='query' />
            <input type='submit' value='search' />
    </form>
    </div>
    <div>
    <table class="thongtinsv" style='border: 1px solid ; width: 100%'>
    <tr>
        <th>TT</th>
        <th>Năm vào trường</th>
        <th>Khối hiện tại</th>
        <th>Đã tốt nghiệp</th>
    </tr>
    <tbody>
        <?php 
        $sql = "SELECT * FROM lop";
        $result = mysqli_query($conn, $sql) or die (mysqli_error());
        while 
        ($row = mysqli_fetch_array($result)){ ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['namvaotruong']; ?></td>
        <td><?php echo $row['khoihientai']; ?></td>
        <td><?php echo $row['datotnghiep'];?></td>
        <td><a href='edit.php?id=<?php echo $row['id'] ?>'>Edit</a></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    </div>
</body>
<footer>
    
        <h3>Username: <?php echo $_SESSION['username'];?></h3>
    <h1>Vu Mi Lơ</h1>
    <h1>Sinh viên hàng hải</h1>
</footer>
