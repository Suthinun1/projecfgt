<?php
$host = 'localhost'; // ที่อยู่ของฐานข้อมูล
$username = 'root';  // ชื่อผู้ใช้ฐานข้อมูล
$password = '';      // รหัสผ่านฐานข้อมูล
$dbname = 'db_project'; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($host, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}
?>
