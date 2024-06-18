<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $adultTraveler = $_POST['adultTraveler'];
    $childTraveler = $_POST['childTraveler'];
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $departDate = date('Y-m-d', strtotime($_POST['departDate']));
    $returnDate = date('Y-m-d', strtotime($_POST['returnDate']));
    $budget = $_POST['budget'];
    $payMethod = $_POST['payMethod'];

    // Handle file upload
    if (isset($_FILES['quotatnFile']) && $_FILES['quotatnFile']['error'] == 0) {
        $fileTmpPath = $_FILES['quotatnFile']['tmp_name'];
        $fileName = $_FILES['quotatnFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $message = 'File is successfully uploaded.';
        } else {
            $message = 'There was some error moving the file to upload directory.';
            $newFileName = null;
        }
    } else {
        $newFileName = null;
    }

    $sql = "INSERT INTO bookings (name, email, adultTraveler, childTraveler, destination, departure, departDate, returnDate, budget, payMethod, quotatnFile)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssddsissdss", $name, $email, $adultTraveler, $childTraveler, $destination, $departure, $departDate, $returnDate, $budget, $payMethod, $newFileName);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Booking successfully submitted!']);
    } else {
        echo json_encode(['message' => 'Error: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
