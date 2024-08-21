<?php
// file: index.php

// Bao gồm file array_functions.php để sử dụng các hàm xử lý mảng
require 'control.php';

$numbers = [];
$results = null;
$numberSearch=null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form input và chuyển thành mảng số nguyên
    $numbers = array_map('intval', explode(',', $_POST['numbers']));
    $numberSearch = (int)$_POST['search'];
    // Xử lý mảng sử dụng các hàm đã định nghĩa
    $results = [
        'sum' => sumArray($numbers),
        'max' => maxArray($numbers),
        'min' => minArray($numbers),
        'sortedAscending' => sortArrayAscending($numbers),
        'searchNumber' => searchNumber($numbers,$numberSearch)
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions Example</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <h1>Array Functions</h1>

    <form method="post" action="">
        <label for="numbers">Nhập mảng:</label>
        <input type="text" id="numbers" name="numbers" placeholder="e.g., 3,5,2,8,1" required>
        <input type="text" id="search" name="search" required>
        <input type="submit" value="Enter">
    </form>

    <?php if ($results !== null): ?>
    <table>

        <tr>
            <td>Mảng ban đầu</td>
            <td><?php echo implode(', ', $numbers); ?></td>
        </tr>
        <tr>
            <td>Tổng các phần tử trong mảng</td>
            <td><?php echo $results['sum']; ?></td>
        </tr>
        <tr>
            <td>Giá trị lớn nhất trong mảng</td>
            <td><?php echo $results['max']; ?></td>
        </tr>
        <tr>
            <td>Giá trị nhỏ nhất trong mảng</td>
            <td><?php echo $results['min']; ?></td>
        </tr>
        <tr>
            <td>Sorted Array (Ascending)</td>
            <td><?php echo implode(', ', $results['sortedAscending']); ?></td>
        </tr>
        <tr>
            <td> </td>
            <td>
                <?php echo $results['searchNumber']?$numberSearch . " có trong mảng": $numberSearch . " không có trong mảng" ?>

            </td>

        </tr>

    </table>
    <?php endif; ?>

</body>

</html>