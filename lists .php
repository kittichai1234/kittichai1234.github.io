<!-- transaction-list.php -->
<div class="mb-4">
    <h2>รายการทั้งหมด</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ประเภท</th>
            <th>จำนวนเงิน</th>
            <th>รายละเอียด</th>
            <th>การจัดการ</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($transactions as $transaction) {
            echo '<tr>';
            echo '<td>' . ucfirst($transaction['type']) . '</td>';
            echo '<td>' . $transaction['amount'] . '</td>';
            echo '<td>' . $transaction['description'] . '</td>';
            echo '<td>';
            echo '<a href="index.php?edit=' . $transaction['id'] . '" class="btn btn-warning btn-sm">แก้ไข</a>';
            echo ' <a href="process.php?delete=' . $transaction['id'] . '" class="btn btn-danger btn-sm">ลบ</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
