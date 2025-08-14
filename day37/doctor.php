<?php
include('connect2.php');
$error = $success = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $dname = mysqli_real_escape_string($conn,$_POST['dname']);
  $demail = mysqli_real_escape_string($conn,$_POST['demail']);
  $dspec = mysqli_real_escape_string($conn,$_POST['dspec']);
  $dphone = mysqli_real_escape_string($conn,$_POST['dphone']);
  if ($dname && $demail && $dspec && $dphone) {
    $sql = "INSERT INTO doctor (Dname, Demail, Dspecialization, Dphoneno)
            VALUES ('$dname','$demail','$dspec','$dphone')";
    if (mysqli_query($conn,$sql)) {
        $success="Doctor added";}
    else {
        $error=mysqli_error($conn);}
  } else $error="Please fill all fields";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Doctor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { display:flex; justify-content:center; align-items:center; height:100vh;
           background: linear-gradient(to right, #f7971e, #ffd200); }
    .card { width:350px; border-radius:8px; }
  </style>
</head>
<body>
  <div class="card p-4 shadow">
    <h4 class="text-center mb-4">Add Doctor</h4>
    <?php if($error): ?><div class="alert alert-danger"><?=$error?></div>
    <?php elseif($success): ?><div class="alert alert-success"><?=$success?></div><?php endif; ?>
    <form method="POST">
      <div class="mb-3"><label>Name</label><input name="dname" class="form-control" required></div>
      <div class="mb-3"><label>Email</label><input name="demail" type="email" class="form-control" required></div>
<div class="mb-3">
  <label class="form-label">Specialization</label><br>
  <div class="row">
    <div class="col">
  <div class="form-check">
    <input class="form-check-input" type="radio" name="dspec" value="Surgery" required>
    <label class="form-check-label">Surgery</label>
  </div>
    </div>
    <div class="col">
  <div class="form-check">
    <input class="form-check-input" type="radio" name="dspec" value="Dermatology">
    <label class="form-check-label">Dermatology</label>
  </div></div>
  <div class="col">
  <div class="form-check">
    <input class="form-check-input" type="radio" name="dspec" value="Dentistry">
    <label class="form-check-label">Dentistry</label>
  </div>
</div>
<div class="col">
<div class="form-check">
    <input class="form-check-input" type="radio" name="dspec" value="Dentistry">
    <label class="form-check-label">Cardiologist</label>
  </div>
    </div>
    </div>
</div>
      <div class="mb-3"><label>Phone</label><input name="dphone" class="form-control" required pattern="\d{10}"></div>
      <button class="btn btn-warning w-100">Add Doctor</button>
    </form>
  </div>
</body>
</html>
