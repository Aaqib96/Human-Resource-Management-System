<?php
//Database connection

include_once 'conn.php';

$EmpID = isset($_POST['id']) ? $_POST['id'] : 0;

// Call the stored procedure
$sql = "CALL `sp_getEmpInfoByUserID`($EmpID)";
$result = $conn->query($sql);

$data = array();
//echo $sql;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'RecId' => $row['RecId'],
            'Employee_Id' => $row['Employee_Id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'contact' => $row['contact'],
            'address' => $row['address'],
            'Gmail' => $row['Gmail'],
            'CNIC' => $row['CNIC'],
            'salary' => $row['salary'],
            'Gender' => $row['Gender'],
            'shift_name' => $row['shift_name'],
            'workingDays' => $row['workingDays'],
            'pay_name' => $row['pay_name']
        );
    }
}

// Close the database connection
$conn->close();

// Send the data as a JSON response
echo json_encode($data);
?>
