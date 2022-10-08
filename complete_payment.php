<?php

session_start();
include("connection.php");

if(isset($_GET['transaction_id']) && isset($_SESSION['order_id'])) {

    $order_status = "paid";
    $order_id = $_SESSION['order_id'];
    $payment_date = date("d-m-Y h:i:s");
    $transaction_id = $GET['transaction_id'];
    //schimba stausul comenzii in comanda platita
    $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");
    $stmt->bind_param("si", $order_status,$order_id);

    //stocheaza informatii comanda
    $stmt1 = $conn->prepare("INSERT INTO payments (order_id,transaction_id, payment_date) VALUES(?,?,?)");
    $stmt1->bind_param("iss",$order_id,$transaction_id,$payment_date);
    $stmt1->execute();
    header("location: thank_you.php?succes_message=Multumesc ca ati cumparat de la noi");
    exit;
}else {
    header("location: index.php");
    exit;
}

?>