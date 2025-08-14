<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>
<body>
    <th>Registartion Details</th>
  <?php
                   require("connect.php");

                    $sql = "SELECT name, email, phone, gender, address, course FROM form";
                    $result = mysqli_query($conn, $sql);
                    ?>

            <table class="display" id="userTable">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Course</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['course']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data found</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>


    <script>
        $(document).ready(function(){
            $('#userTable').DataTable();
        });
        new DataTable( '#example', {
    paging: false,
    scrollY: 400
} );
        </script>
</body>
</html>