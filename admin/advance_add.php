
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'includes/conn.php';
    
    $UpId = $_POST["UpId"];
    $Amount = trim($_POST["Amount"]);
    $AmountDate = trim($_POST["AmountDate"]);
    
    if ("" === "$UpId" || "" === "$Amount" || "" === "$AmountDate") {
        echo "Unable to add empty values!";
    }else {
        $sql = "call`StrProc_InsertAdvanceInfo`('$UpId','$Amount','$AmountDate')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
	

    $conn->close();
} else {
    echo "Form was not submitted";
}
header('location: employee.php');
?>
