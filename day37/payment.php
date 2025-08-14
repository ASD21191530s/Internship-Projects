<?php
include('connect2.php');
$error = $success = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $aid = mysqli_real_escape_string($conn,$_POST['aid']);
  $amount = mysqli_real_escape_string($conn,$_POST['amount']);
  $method = mysqli_real_escape_string($conn,$_POST['method']);
  $status = mysqli_real_escape_string($conn,$_POST['status']);
  if ($aid && $amount && $method && $status) {
    $sql = "INSERT INTO payment (Aid, Pamount, Pmethode, Pstatus)
            VALUES ('$aid','$amount','$method','$status')";
    if (mysqli_query($conn,$sql)) $success="Payment recorded";
    else $error=mysqli_error($conn);
  } else $error="Please fill all fields";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Payment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { display:flex; justify-content:center; align-items:center; height:100vh;
           background: linear-gradient(to right, #7f00ff, #e100ff); }
    .card { width:350px; border-radius:8px; }
  </style>
</head>
<body>
  <div class="card p-4 shadow">
    <h4 class="text-center mb-4">Add Payment</h4>
    <?php if($error): ?><div class="alert alert-danger"><?=$error?></div>
    <?php elseif($success): ?><div class="alert alert-success"><?=$success?></div><?php endif; ?>
    <form method="POST">
      <div class="mb-3"><label>Appointment ID</label><input name="aid" type="number" class="form-control" required></div>
      <div class="mb-3"><label>Amount</label><input name="amount" type="number" class="form-control" required></div>
<div class="mb-3">
  <label class="form-label">Payment Mode</label>
  <select name="method" class="form-select" required>
    <option value="">Select Mode</option>
    <option value="Cash">Cash</option>
    <option value="Card">Card</option>
    <option value="UPI">UPI</option>
    <option value="Net Banking">Net Banking</option>
  </select>
</div>
<div class="mb-3">
  <label class="form-label">Payment Status</label>
  <select name="status" class="form-select" required>
    <option value="">Select Status</option>
    <option value="Paid">Paid</option>
    <option value="Unpaid">Unpaid</option>
    <option value="Pending">Pending</option>
  </select>
</div>
      <button class="btn btn-purple w-100 btn btn-info">Confirm Payment</button>
    </form>
  </div>
</body>
</html>

