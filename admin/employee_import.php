<style>
        /* Add your custom CSS styles here */

        .content {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;

        }
        .inp{
            display: inline-block;
            padding: 10px 20px;
        }
/* 
        .wrapper {
            background-color: #fff;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        } */

        h1 {
            color: #333;
        }

        .box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }

        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }

        /* Style the file input */
        input[type="file"] {
            display: none;
        }

        label.upload-label {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        label.upload-label:hover {
            background-color: #2980b9;
        }

        /* Style the buttons */
        input[type="submit"] {
            background-color: #27ae60;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #219955;
        }

        /* Style the file input */
            input[type="file"] {
                display: none; /* Hide the default file input */
                display: inline-block;
                padding: 10px 20px;
                background-color: #27ae60;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-align: center;
                
                
                
            }

            /* Hover state for the custom file input button */
            input[type="file"]:hover {
                background-color: #219955;
            }
    </style>
<?php include 'includes/conn.php'; ?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<link rel="stylesheet" href="style/datatable1.13.6.css">
<link rel="stylesheet" href="style/datatable2.4.1.css">

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Import Employee List
        </h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> <a href="employee.php"> <i class="fa fa-dashboard"></i> Employee </a> </li>
        <li class="active">Import Employee</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h2>Upload Excel File</h2>
                            <form action="#" method="post" enctype="multipart/form-data">
                              <div>
                              Select Excel File to Upload:
                              </div>
                              <div class="inp">
                              <input type="file" name="excel_File" accept=".csv" class="form-control" id="csvFile">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" class="form-control" name="insert" value="Insert Data into Database">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </div>  
                            <br>
                            <!-- <input type="submit" value="import" name="import">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="insert" value="Insert Data into Database"> -->
                            </form> 
                            <table style="width: 100%; table-layout: fixed;" id="dataTable" border="1">
                            <thead class="header" method = "post">
                               <tr>
                                    <th>Employee Id</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>gender</th>
                                    <th>CNIC</th>
                                    <th>Email</th>
                                    <th>contact</th>
                                    <th>address</th>
                                    <th>Designation</th>
                                    <th>payscale</th>
                                    <th>shifte</th>
                                    <th>workingDays</th>
                                    <th>salary</th>
                              </tr>
                          </thead>
                                <!-- Table body will be added dynamically -->   
                          </table>
 <?php
use SimpleExcel\SimpleExcel;

// $db = mysqli_connect('localhost','root','','hrms');

if (!$conn) {
    die('Could not connect:'.mysqli_connect_error());
}

if(isset($_POST['insert'])){

    if(move_uploaded_file($_FILES['excel_File']['tmp_name'],$_FILES['excel_File']['name'])){
    
    require_once('../SimpleExcel/SimpleExcel.php');
    
    $excel = new SimpleExcel('csv');
    
    $excel->parser->loadFile($_FILES['excel_File']['name']);
    
    $foo = $excel->parser->getField(); 
    $count = 0;
    // $db = mysqli_connect('localhost','root','','hrms');
    
    while(count($foo) > $count){
    //    $User_Id = $foo[$count][0];
    $Employee_Id = $foo[$count][0];
    $firstname = $foo[$count][1];
    $lastname = $foo[$count][2];
    $gender = $foo[$count][3];
    $CNIC = $foo[$count][4];
    $Gmail = $foo[$count][5];
    $contact = $foo[$count][6];
    $address = $foo[$count][7];
    $Designation_Id = $foo[$count][8];
    $payscale_id = $foo[$count][9];
    $shift_id = $foo[$count][10];
    $workingDays = $foo[$count][11];
    $salary = $foo[$count][12];
    $sql = "call `SP_InsertUserProfileInfo`('$Employee_Id','$firstname','$lastname','$gender','$CNIC','$Gmail','$contact','$address','$Designation_Id','$payscale_id','$shift_id','$workingDays','$salary')";  
    mysqli_query($conn,$sql);
    $count++;  
    }
    }
    }

?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
 
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" /> -->
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script> -->
    <!-- <script>
    $(document).ready(function(){
    $('.dt').DataTable();
    })
    </script> -->
</div>

<script>
        document.getElementById('csvFile').addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const contents = e.target.result;
                    const lines = contents.split('\n');
                    let tableHtml = '<tbody>';

                    if (lines.length > 0) {
                        const headers = lines[0].split(',');

                        // for (const header of headers) {
                        //     tableHtml += `<td>${header}</td>`;
                        // }

                        // tableHtml += '</tr><tbody>';

                        for (let i = 1; i < lines.length; i++) {
                            const row = lines[i].split(',');

                            tableHtml += '<tr>';
                            // for (const cell of row) {
                            //     tableHtml += `<td>${cell}</td>`;
                            // }
                            if(row[1] != undefined){
                                holdJsonData.push({"Employee_Id":row[0],
                                "firstname":row[1],
                                "lastname":row[2],
                                "gender":row[3],
                                "CNIC":row[4],
                                "Gmail":row[5],
                                "contact":row[6],
                                "address":row[7],
                                "Designation_Id":row[8],
                                "payscale_id":row[9],
                                "shift_id":row[10],
                                "workingDays":row[11],
                                "salary":row[12]
                                })
                            }
                            //tableHtml += '</tr>';
                            
                        }

                    }
                    //tableHtml += '</tbody>';
                    //holdData = JSON.stringify(holdJsonData);
                    $('#dataTable').dataTable().fnClearTable();
                    $('#dataTable').dataTable().fnDestroy();
                    $('#dataTable').DataTable({
                        dom: "'<'row'l>Bfrtip'",
                        "scrollX": true,
                        "scrollY": '500px',
                        "data": holdJsonData,
                        "columns": [
                            { "data" : "Employee_Id" },
                            { "data" : "firstname" },
                            { "data" : "lastname" },
                            { "data" : "gender" },
                            { "data" : "CNIC" },
                            { "data" : "Gmail" },
                            { "data" : "contact" },
                            { "data" : "address" },
                            { "data" : "Designation_Id" },
                            { "data" : "payscale_id" },
                            { "data" : "shift_id" },
                            { "data" : "workingDays" },
                            { "data" : "salary" }
                        ]
                    });
                    //document.getElementById('dataTable').innerHTML = tableHtml;
                };

                reader.readAsText(file);
            }
        });
    </script>
<script src="JS/datatable1.13.6.js"></script>
<script>
    let holdData = [];
    let holdJsonData = [];
    var dtable = $('#dataTable').DataTable({
        dom: "'<'row'l>Bfrtip'",
        "scrollX": true,
        "scrollY": '500px',
        "data": holdData,
        "columns": [
            { "data" : "Employee_Id" },
            { "data" : "firstname" },
            { "data" : "lastname" },
            { "data" : "gender" },
            { "data" : "CNIC" },
            { "data" : "Gmail" },
            { "data" : "contact" },
            { "data" : "address" },
            { "data" : "Designation_Id" },
            { "data" : "payscale_id" },
            { "data" : "shift_id" },
            { "data" : "workingDays" },
            { "data" : "salary" },
        ]
    });
   $(document).ready( function () {
} );
</script>
</body>
</html>