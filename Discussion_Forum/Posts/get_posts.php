<?php
include 'Connection/dbConnection.php';

$sql = "SELECT * FROM posts ORDER BY user_id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
        echo "<ul>";
        echo "<li>";
		echo "<div class='latest_post'>";
		echo "<h3>" .$row['user_name'] ."</h3>";
        echo " <p>" . $row['user_email'] . "</p>";
		echo "<p>" . $row['time'] . "</p>";
		echo "<p>" . $row['user_msg'] . "</p>";
		echo "</div>";
        echo "</li>";
	    echo "</ul>";
    }

} else {
	echo "No posts yet.";
}

mysqli_close($conn);
?>
