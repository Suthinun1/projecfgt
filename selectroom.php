<?php

// เชื่อมต่อฐานข้อมูล
include('connection.php');

// ดึงข้อมูลห้องพักจากฐานข้อมูล
$sql = "SELECT * FROM rooms"; // สมมติว่าในฐานข้อมูลมีตาราง rooms
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกห้องพัก</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="rooms-container">
        <h2>เลือกห้องพักของคุณ</h2>
        <p>ยินดีต้อนรับ, <?php echo $_SESSION['username']; ?>!</p>
        
        <h3>ห้องพักที่มีให้เลือก:</h3>
        <div class="rooms-list">
            <?php
            if ($result->num_rows > 0) {
                // แสดงห้องพักทั้งหมดที่ดึงมาจากฐานข้อมูล
                while ($room = $result->fetch_assoc()) {
                    echo "<div class='room-item'>";
                    echo "<h4>" . htmlspecialchars($room['room_name']) . "</h4>";
                    echo "<p>ราคาต่อคืน: " . htmlspecialchars($room['price']) . " บาท</p>";
                    echo "<p>" . htmlspecialchars($room['description']) . "</p>";
                    echo "<a href='reserve.php?room_id=" . $room['id'] . "' class='reserve-btn'>จองห้อง</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>ไม่มีห้องพักที่มีให้เลือกในขณะนี้</p>";
            }
            ?>
        </div>

        <a href="logout.php" class="logout-btn">ออกจากระบบ</a>
    </div>
</body>
</html>
