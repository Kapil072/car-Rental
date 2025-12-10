 <?php

$name = $_POST['name'];
$city = $_post['city'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

$conn = new mysqli('localhost', 'root', '', 'carrent');
if (!$conn->connect_error) {
    die('connection failed : ' . $conn->connect_error);

} else {
    $stmt = $conn->prepare("INSERT INTO users(name,city,email,password,number)values(?,?,?,?,?)");
    $stmt->bind_param("ssssi", $name, $city, $email, $password, $number);
    if ($stmt->execute()) {
        echo "Registration is completed";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>