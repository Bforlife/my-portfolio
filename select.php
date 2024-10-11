<?php
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="sms.css">
    <style>
        .content {
            flex-grow: 1; /* Take remaining space */
            padding: 20px;
            background-color: white; /* Background color for the content */
            border-radius: 8px; /* Rounded corners for content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional shadow */
        }
        .content h2{
            text-align:center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        tr:hover {
            background-color: #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: black;
        }
    </style>
</head>
<body>
<div class="content">
    <h2>View Messages</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Time and Date</th>
                <th>&#9851; Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select = "SELECT * FROM contact_tb";
            $result = $conn->query($select);
            
            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                        echo "<td><a href='update.php?id=" . $row['id'] . "'>Update</a></td>"; // Link for update
                        echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>"; // Link for delete
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Error: " . $conn->error . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
