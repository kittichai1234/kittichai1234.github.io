<!-- form.php -->
<form action="add.php" method="post">
    <div class="form-group">
        <label for="type">ประเภท:</label>
        <select name="type" id="type" class="form-control" required>
            <option value="income">รายรับ</option>
            <option value="expense">รายจ่าย</option>
        </select>
    </div>

    <div class="form-group">
        <label for="amount">จำนวนเงิน:</label>
        <input type="number" name="amount" id="amount" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">รายละเอียด:</label>
        <input type="text" name="description" id="description" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">บันทึก</button>
</form>
