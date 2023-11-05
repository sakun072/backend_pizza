<?php
    include 'condb.php';

    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);
    $fid = $data->fid;
    $name = $data->name;
    $price = $data->price;
    $image = $data->image;
    $crid = $data->crid;
    $ftid = $data->ftid;
    $sid = $data->sid;
    $stmt = $conn->prepare("UPDATE `food` SET `name`= ?,`price`= ?,`image`= ?,`crid`= ?,`ftid`= ?,`sid`= ? WHERE fid = ?");
    $stmt->bind_param("sisiiii", $name, $price, $image, $crid, $ftid, $sid, $fid);

    if ($stmt->execute()) {
        http_response_code(200);
        $error = array("apiStatus" => "200");
        echo json_encode($error, JSON_UNESCAPED_UNICODE);;
    } else {
        http_response_code(400);
        $error = array("apiStatus" => "400");
        echo json_encode($error, JSON_UNESCAPED_UNICODE);;
    }
?>
