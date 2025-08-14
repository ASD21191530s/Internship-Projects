<?php
include('connect2.php');
$error = $success = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $oname = mysqli_real_escape_string($conn,$_POST['oname']);
  $ophone = mysqli_real_escape_string($conn,$_POST['ophone']);
  $oemail = mysqli_real_escape_string($conn,$_POST['oemail']);
  $oaddress = mysqli_real_escape_string($conn,$_POST['oaddress']);
  if ($oname && $ophone && $oemail && $oaddress) {
    $sql = "INSERT INTO owner (Oname, Ophoneno, Oemail, Oaddress)
            VALUES ('$oname','$ophone','$oemail','$oaddress')";
    if (mysqli_query($conn,$sql)) $success="Owner added";
    else $error=mysqli_error($conn);
  } else $error="Please fill all fields";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Owner</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { display:flex; justify-content:center; align-items:center; height:100vh;
           background: linear-gradient(to right, #4e73df, #6b88dfff); }
    .card { width:350px; border-radius:8px; }
  </style>
</head>
<body>
  <div class="card p-4 shadow">
    <h4 class="text-center mb-4">Add Owner</h4>
    <?php if($error): ?><div class="alert alert-danger"><?=$error?></div><?php elseif($success): ?><div class="alert alert-success"><?=$success?></div><?php endif; ?>
    <form method="POST">
      <div class="mb-3"><label class="form-label">Name</label><input name="oname" class="form-control" required></div>
      <div class="mb-3"><label>Phone</label><input name="ophone" type="text" class="form-control" required pattern="\d{10}"></div>
      <div class="mb-3"><label>Email</label><input name="oemail" type="email" class="form-control" required></div>
      <div class="mb-3"><label>Address</label><textarea name="oaddress" class="form-control" rows="2" required></textarea></div>
      <button class="btn btn-primary w-100">Register</button>
    </form>
  </div>
</body>
</html>
