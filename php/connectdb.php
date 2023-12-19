<?php
// Thông tin kết nối đến cơ sở dữ liệu PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "DB_training";
$user = "postgres";
$password = "Lehaphuong@123";

// Kết nối đến cơ sở dữ liệu
try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

  // Truy vấn dữ liệu từ bảng
  $sql = "SELECT film.title
  FROM (film INNER JOIN inventory ON film.film_id = inventory.film_id) 
  INNER JOIN rental ON inventory.inventory_id = rental.inventory_id
  ORDER BY rental.rental_date DESC";
  $result = $conn->query($sql);

  // Hiển thị danh sách cơ sở dữ liệu trong HTML
  if ($result->rowCount() > 0) {
    echo "<ul>";
    foreach ($result as $row) {
        echo "<li>" . $row["title"] . "</li>";
    }
    echo "</ul>";
  } else {
    echo "NO DATA";
  }

// Đóng kết nối
$conn = null;
?>

