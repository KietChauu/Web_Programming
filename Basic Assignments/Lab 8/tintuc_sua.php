<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type ="text/css">
        body{
            display: table-cell;
            margin-left: auto;
            margin-right: auto;
            vertical-align: middle;
        }
        input[type="text"]{
            width: 250px;
            margin-top: 3px;
            margin-bottom: 3px;
        }
        textarea {
            width: 250px;
            margin-top: 2px;
            margin-bottom: 2px;
        }
        input[type='submit']{
            width: 121px;
            margin-top: 3px;
            margin-bottom: 3px;
        }
        input[type="reset"]{
            width: 121px;
            margin-top: 3px;
            margin-bottom: 3px;
        }
        pre{
            background-color: white;
            box-shadow: 10px 10px 5px #888888;
            padding: 25px;
            vertical-align: center;
        }
    </style>
</head>
<body>
    <form action="../tintuc/tintuc_xuly_sua.php" method="post" enctype="multipart/form-data">
    <?php
    require_once '../admin/database/dbcon.php' ;
    $id = $_GET["id"];
    $sql = "select * from tintuc where matin = ".$id;
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_array($result)){
    ?>
    <pre>
        <input type="text" name="matin" value="<?php echo $row["matin"] ?>" readonly>
        <select name="maloai">
        <?php
        $sql_loaitin = "select * from loaitin";
        $result_loaitin = mysqli_query($conn,$sql_loaitin);
        while ($row_loaitin == mysqli_fetch_array($result_loaitin)){
        ?>
        <option value=<?php echo $row_loaitin[0] ?>
        <?php if($row_loaitin[0] ==$row ["maloai"]) echo "selected"?>
        >
        <?php echo $row_loaitin[1] ?></option>
        <?php
    }
    ?>
        </select>
        <input type="text" name="tentin" value="<?php echo $row ["tentin"] ?>">
        <textarea name="tomtat"><?php echo $row["tomtat"] ?></textarea>
        <textarea name="noidung"><?php echo $row["noidung"] ?></textarea>
        <input type="text" name="hinhanhcu" value="<?php echo $row["hinhanh"] ?>" readonly>
        <input type="file" name="hinhanhmoi">
        <input type="text" name="tacgia" value="<?php echo $row["tacgia"] ?>">
        <input type="text" name="tinnoibat" value="<?php echo $row["noibat"] ?>">
        <input type="text" name="trangthai" value="<?php echo $row["trangthai"] ?>">
        <input type="submit" value="Lưu thay đổi"> <input type="reset" value="Hủy">
    </pre>
    <?php
    }
    mysqli_close($conn);
    ?>
    </form>
    
</body>
</html>