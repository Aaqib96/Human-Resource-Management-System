<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<html lang="en">
<head>
    
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    h1 {
      color: #333;
      text-align: center;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn1
    {
      text-align: center;
      padding-bottom:20px;
    }

    button {
      border-color: black;
      background-color: #2bff00;
      color: #000000;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
    }

    button:hover {
      background-color: #000000;
      color: #fff;
      transition: 2s;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
  <div class="container">
    <h1>Biometric Device Connectivity</h1>
    <form>
      <div class="form-group">
        <label for="ipAddress">Device Name</label>
        <input type="text" id="ipAddress" name="ipAddress" placeholder="Enter Device Name">
      </div>
      <div class="form-group">
        <label for="ipAddress">Connection Type</label>
        <input type="text" id="ipAddress" name="ipAddress" placeholder="Enter Connection Type">
      </div>
      <div class="form-group">
        <label for="port">Network Perameters</label>
        <input type="text" id="port" name="port" placeholder="Enter Network Perameter">
      </div>
      <div class="form-group">
        <label for="DType">Device Type</label>
        <input type="text" id="username" name="username" placeholder="Enter Device Type">
      </div>
      <div class="form-group">
        <label for="Serial">Serial No</label>
        <input type="text" id="password" name="password" placeholder="Enter Serial No">
      </div>
      <div class="btn1">
      <button type="submit" class="btn btn-success" style='border-radius:8px;'><b>Connect</b></button>
    </div>
    </form>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/deduction_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
