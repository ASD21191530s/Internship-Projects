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

