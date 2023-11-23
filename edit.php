<!-- edit.php -->
<?php
$dataFile = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $type = $_GET['type'];
    $index = $_GET['index'];

    if (file_exists($dataFile)) {
        $data = json_decode(file_get_contents($dataFile), true);

        $item = $data[$type][$index];
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขรายการ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>แก้ไขรายการ</h2>

        <form action="update.php" method="post">
            <input type="hidden" name="type" value="<?= $type; ?>">
            <input type="hidden" name="index" value="<?= $index; ?>">

            <div class="form-group">
                <label for="amount">จำนวนเงิน:</label>
                <input type="number" name="amount" id="amount" class="form-control" value="<?= $item['amount']; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">รายละเอียด:</label>
                <input type="text" name="description" id="description" class="form-control" value="<?= $item['description']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
