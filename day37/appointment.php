<?php
include('connect2.php');
$error = $success = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $pid = mysqli_real_escape_string($conn,$_POST['pid']);
  $did = mysqli_real_escape_string($conn,$_POST['did']);
  $reason = mysqli_real_escape_string($conn,$_POST['reason']);
  $date = mysqli_real_escape_string($conn,$_POST['date']);
  $status = mysqli_real_escape_string($conn,$_POST['status']);
  if ($pid && $did && $reason && $date && $status) {
    $sql = "INSERT INTO appointment (Pid, Did, Reason, Date, Status)
            VALUES ('$pid','$did','$reason','$date','$status')";
    if (mysqli_query($conn,$sql)) $success="Appointment booked";
    else $error=mysqli_error($conn);
  } else $error="Please fill all fields";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { display:flex; justify-content:center; align-items:center; height:100vh;
           background: linear-gradient(to right, #00b09b, #96c93d); }
    .card { width:350px; border-radius:8px; }
  </style>
</head>
<body>
  <div class="card p-4 shadow">
    <h4 class="text-center mb-4">Book Appointment</h4>
    <?php if($error): ?><div class="alert alert-danger"><?=$error?></div>
    <?php elseif($success): ?><div class="alert alert-success"><?=$success?></div><?php endif; ?>
    <form method="POST">
      <div class="mb-3"><label>Pet ID</label><input name="pid" type="number" class="form-control" required></div>
      <div class="mb-3"><label>Doctor ID</label><input name="did" type="number" class="form-control" required></div>
      <div class="mb-3"><label>Reason</label><input name="reason" class="form-control" required></div>
      <div class="mb-3"><label>Date</label><input name="date" class="form-control" placeholder="YYYY-MM-DD" required></div>
<div class="mb-3">
  <label class="form-label">Status</label><br>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" value="Pending" required>
    <label class="form-check-label">Pending</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" value="Confirmed">
    <label class="form-check-label">Confirmed</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" value="Completed">
    <label class="form-check-label">Completed</label>
  </div>
</div>      <button class="btn btn-success w-100">Schedule Appointment</button>
    </form>
  </div>
</body>
</html>
