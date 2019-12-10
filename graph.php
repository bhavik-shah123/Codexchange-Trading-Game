<?php
session_start();
header('Content-Type: application/json');

$conn = mysqli_connect("localhost", "root", "bhavik", "codexchange");
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $user=$_SESSION["username"];
                            $sql="SELECT * FROM users WHERE username='$user'";
                            $result=$conn->query($sql);
                            while($row = $result->fetch_assoc())
                            {
                                $id=$row["id"];
                            }

                            $sql1="SELECT balance FROM forgraph WHERE user_id='$id'";
                            $res=$conn->query($sql1);

$data = array();
foreach ($res as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
