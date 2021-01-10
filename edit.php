<!DOCTYPE html>
<html lang="en">
<head>
    <title>Them SV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-">
    <link rel="stylesheet" href="tablle.css" />
</head>
<body>
    <?php 
    require('connect.php');
    $svid = "";
    $trangthai = "";
    $lopid = "";
    $hovaten = "";
    $ngaysinh = "";
    $mota = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["id"])) { $svid = $_POST['id']; }
        if(isset($_POST["trangthai"])) { $trangthai = $_POST['trangthai']; }
        if(isset($_POST["lop_id"])) { $lopid = $_POST['lop_id']; }
        if(isset($_POST["hovaten"])) { $hovaten = $_POST['hovaten']; }
        if(isset($_POST["ngaysinh"])) { $ngaysinh = $_POST['ngaysinh']; }
        if(isset($_POST["mota"])) { $mota = $_POST['mota']; }
    }
        $them = "INSERT INTO hocsinh (id , trangthai, lop_id, hovaten, ngaysinh, mota) 
        VALUES ('$svid','$trangthai','$lopid','$hovaten','$ngaysinh','$mota')";
        if($conn -> query($them) === TRUE) {
            echo "Thêm thành công";
        } else {
            echo "Hỏng";
        }
    ?>
    <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="#">Cau 1</a></li>
        <li><a href="QLSV">QLSV</a></li>
    </ul>
    <div>
        <form method="POST" class="form">
            <h2>Form thêm sinh viên</h2>
            <label>ID: <input type="text" name="id"></label><br/>
            <label>Trạng thái: <input type="text"  name="trangthai"></label><br/>
            <label>ID Lớp: <input type="text"  name="lop_id"></label><br/>
            <label>Họ và tên: <input type="text" name="hovaten"></label><br/>
            <label>Ngày Sinh: <input type="text"  name="ngaysinh"></label><br/>
            <label>Mô tả: <input type="text" name="mota"></label><br/>
            <input type="submit" name="update_user">
        </form>
    </div>
    <div>
    <?php 
    require('connect.php');
    $id=$_GET['id'];
    $sql = "SELECT * FROM hocsinh WHERE lop_id='$id'";
            $query= mysqli_fetch_assoc($sql);
    $row = mysqli_fetch_assoc($query);
    ?>
    <table class="thongtinsv" style='border: 1px solid ; width: 100%'>
    <tr>
        <th>TT</th>
        <th>Trạng thái</th>
        <th>Họ và tên</th>
        <th>Ngày Sinh</th>
        <th>Mô tả</th>
        <th>ID lớp</th>
    </tr>
    <tbody>
        <?php 
        $sql = "SELECT * FROM hocsinh where lop_id='$id'";
        $result = mysqli_query($conn, $sql) or die (mysqli_error());
        while 
        ($row = mysqli_fetch_array($result)){ ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['trangthai']; ?></td>
        <td><?php echo $row['hovaten']; ?></td>
        <td><?php echo $row['ngaysinh'];?></td>
        <td><?php echo $row['mota'];?></td>
        <td><?php echo $row['lop_id'];?></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    </div>
</body>
<footer>
    <h1>Vu Mi Lơ</h1>
    <h1>Sinh viên hàng hải</h1>
</footer>
