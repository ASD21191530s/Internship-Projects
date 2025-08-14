<?php
include('connect2.php');
$error = $success = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $pname = mysqli_real_escape_string($conn,$_POST['pname']);
  $pbreed = mysqli_real_escape_string($conn,$_POST['pbreed']);
  $pspecies = mysqli_real_escape_string($conn,$_POST['pspecies']);
  $pgender = mysqli_real_escape_string($conn,$_POST['pgender']);
  $oid = mysqli_real_escape_string($conn,$_POST['oid']);
  if ($pname && $pbreed && $pspecies && $pgender && $oid) {
    $sql = "INSERT INTO pet (Pname, Pbreed, Pspecies, Pgender, Oid)
            VALUES ('$pname','$pbreed','$pspecies','$pgender','$oid')";
    if (mysqli_query($conn,$sql)) $success="Pet added";
    else $error=mysqli_error($conn);
  } else $error="Please fill all fields";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Pet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { display:flex; justify-content:center; align-items:center; height:100vh;
           background: linear-gradient(to right, #43cea2, #185a9d); }
    .card { width:350px; border-radius:8px; }
  </style>
</head>
<body>
  <div class="card p-4 shadow">
    <h4 class="text-center mb-4">Add Pet</h4>
    <?php if($error): ?><div class="alert alert-danger"><?=$error?></div>
    <?php elseif($success): ?><div class="alert alert-success"><?=$success?></div><?php endif; ?>
<form method="POST">
      <div class="mb-3"><label>Name</label><input name="pname" class="form-control" required></div>
      <div class="mb-3"><label>Breed</label><input name="pbreed" class="form-control" required></div>
<div class="mb-3">
  <label class="form-label">Species</label>
  <select name="pspecies" class="form-select" required>
    <option value="">Select Species</option>
    <option value="Dog">Dog</option>
    <option value="Cat">Cat</option>
    <option value="Bird">Bird</option>
    <option value="Rabbit">Rabbit</option>
    <option value="Other">Other</option>
  </select>
</div>
<div class="mb-3">
  <label class="form-label">Gender</label><br>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="pgender" value="Male" required>
    <label class="form-check-label">Male</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="pgender" value="Female">
    <label class="form-check-label">Female</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="pgender" value="Other">
    <label class="form-check-label">Other</label>
  </div>
</div>
      <div class="mb-3"><label>Owner ID</label><input name="oid" type="number" class="form-control" required></div>
      <button class="btn btn-success w-100">Add Pet</button>
</form>
  </div>
</body>
</html>
