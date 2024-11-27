<?php
include '../connection.php';

// ตรวจสอบว่ามีการส่งข้อมูล POST หรือไม่
if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    // ป้องกัน SQL Injection ด้วยการใช้ prepared statements
    $username = $conn->real_escape_string($_REQUEST['username']);
    $password = $conn->real_escape_string($_REQUEST['password']);
    
    // คิวรีเพื่อเช็คข้อมูลการเข้าสู่ระบบ
    $sql = "SELECT * FROM tb_user WHERE username = ? AND password = ?";
    
    // เตรียมคำสั่ง SQL
    if ($stmt = $conn->prepare($sql)) {
        // ผูกค่าตัวแปรกับคำสั่ง SQL
        $stmt->bind_param("ss", $username, $password);
        
        // ดำเนินการคำสั่ง SQL
        $stmt->execute();
        
        // รับผลลัพธ์
        $result = $stmt->get_result();
        $num = $result->num_rows;
        
        if ($num > 0) {
            // เริ่ม session
            session_start();
            $_SESSION['sess_id'] = session_id();
            $_SESSION['sess_username'] = $username; // ใช้ username แทน result->username
            
            echo "<script>
                    alert('Login successful!');
                    window.location.href = '../selectroom.php';
                  </script>";
            exit;
        } else {
            echo "<script>
            alert('Username or Password not provided');
            window.history.back();
          </script>";
    exit;
        }
        
        // ปิดคำสั่ง SQL
        $stmt->close();
    } else {
        // กรณีเกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL
        echo json_encode(array('status' => false, 'message' => "Error preparing the SQL statement"));
    }
} else {
    // กรณีไม่มีการส่งข้อมูล
    echo json_encode(array('status' => false, 'message' => "Username or Password not provided"));
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>