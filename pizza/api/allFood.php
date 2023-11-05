<?php
    include 'condb.php';
    $stmt = $conn->prepare("SELECT * FROM food");
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp, JSON_UNESCAPED_UNICODE);
?>
