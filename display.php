<!-- display.php -->
<?php
$dataFile = 'data.json';

if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
} else {
    $data = ['income' => [], 'expense' => []];
}

$incomeTotal = array_sum(array_column($data['income'], 'amount'));
$expenseTotal = array_sum(array_column($data['expense'], 'amount'));
$balance = $incomeTotal - $expenseTotal;
?>

<h2>รายการรายรับ</h2>
<table class="table">
    <thead>
        <tr>
            <th>จำนวนเงิน</th>
            <th>รายละเอียด</th>
            <th>การจัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['income'] as $index => $income): ?>
            <tr>
                <td><?= $income['amount']; ?></td>
                <td><?= $income['description']; ?></td>
                <td>
                    <a href="edit.php?type=income&index=<?= $index; ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                    <a href="delete.php?type=income&index=<?= $index; ?>" class="btn btn-danger btn-sm">ลบ</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>รายการรายจ่าย</h2>
<table class="table">
    <thead>
        <tr>
            <th>จำนวนเงิน</th>
            <th>รายละเอียด</th>
            <th>การจัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['expense'] as $index => $expense): ?>
            <tr>
                <td><?= $expense['amount']; ?></td>
                <td><?= $expense['description']; ?></td>
                <td>
                    <a href="edit.php?type=expense&index=<?= $index; ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                    <a href="delete.php?type=expense&index=<?= $index; ?>" class="btn btn-danger btn-sm">ลบ</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>ยอดรวม</h2>
<p>รายรับทั้งหมด: <?= $incomeTotal; ?></p>
<p>รายจ่ายทั้งหมด: <?= $expenseTotal; ?></p>
<h2>ยอดคงเหลือ</h2>
<p><?= $balance; ?></p>
