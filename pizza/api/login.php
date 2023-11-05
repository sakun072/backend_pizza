<?php
 include 'condb.php';
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);
$username = $data->username;
$password = $data->password;
// $username = isset($_POST['username']) ? $_POST['username'] : "";
// $password = isset($_POST['password']) ? $_POST['password'] : "";

$stmt = $conn->prepare("SELECT * FROM owner WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
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