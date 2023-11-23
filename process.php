<?php
session_start();

$transactions = [];

if (isset($_SESSION['transactions'])) {
    $transactions = $_SESSION['transactions'];
}

// Process add, edit, and delete transactions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['type']) && isset($_POST['amount']) && isset($_POST['description'])) {
        $transaction = [
            'type' => $_POST['type'],
            'amount' => $_POST['amount'],
            'description' => $_POST['description'],
        ];

        if (isset($_POST['edit_id'])) {
            $editId = $_POST['edit_id'];
            $transactions[$editId] = $transaction;
            $_SESSION['message'] = 'แก้ไขรายการเรียบร้อยแล้ว';
        } else {
            $transactions[] = $transaction;
            $_SESSION['message'] = 'บันทึกรายการเรียบร้อยแล้ว';
        }

        $_SESSION['transactions'] = $transactions;
        header('Location: index.php');
        exit;
    }
}

if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    $editTransaction = $transactions[$editId];
}
?>
