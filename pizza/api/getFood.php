<?php
    include 'condb.php';

    $fid = $_GET["fid"];
    
    $stmt = $conn->prepare("SELECT * FROM food WHERE fid = ?");
    $stmt->bind_param("i", $fid);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_assoc();

    if ($outp != null) {
        echo json_encode($outp, JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(400);
        $error = array("apiStatus" => "400");
        echo json_encode($error, JSON_UNESCAPED_UNICODE);;
    }
?>
