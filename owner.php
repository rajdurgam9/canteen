<!DOCTYPE html>
<html>
<head>
    <title>Order Data</title>
    <link rel="stylesheet" href="style.css">
    <!-- <meta http-equvi="refresh" content="10"> -->
    <style>
        button{
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
    <h2>Order Data</h1>
    </header>
    <br><br>
    
    <button id="deleteButton">Delete Top Order</button>
    <form method="POST" action="deletemiddle.php">
    <input type="text" id="middle" name="middle" required>
    <button type="submit">Delete Middle Order</button>
    </form>

    <table id="userTable">
        <thead>
            <tr>
            <th>roll number</th><th>burger</th><th>pizza</th><th>salad</th><th>fries</th><th>total</th><th>time</th>
            </tr>
        </thead>
        <tbody>
    <?php
    // Establish a database connection
    $hostname = 'localhost';
    $dbUsername = 'id20822154_root';
    $dbPassword = 'oNnq-!K=#JY7o9}+';
    $database = 'id20822154_canteen';

    $conn = new mysqli($hostname, $dbUsername, $dbPassword, $database);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Retrieve data from the database
    $sql = "SELECT * FROM orders order by time";
    $result = $conn->query($sql);

    // Display the data in an HTML table
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['roll'] . '</td>';
            echo '<td>' . $row['burger'] . '</td>';
            echo '<td>' . $row['pizza'] . '</td>';
            echo '<td>' . $row['salad'] . '</td>';
            echo '<td>' . $row['fries'] . '</td>';
            echo '<td>' . $row['total'] . '</td>';
            echo '<td>' . $row['time'] . '</td>';
            echo '</tr>';
        }
        
    } else {
        echo '<tr><td colspan="7">No records found.</td></tr>';
    }
    // Close the database connection
    $conn->close();
    ?>
    </tbody>
    </table>
    <br><br>

    
<!-- =========================================================================================================== -->
    

    <script>
    // Add event listener to the delete button
    document.getElementById('deleteButton').addEventListener('click', function() {
        // Retrieve the table body and its first row
        var tableBody = document.querySelector('#userTable tbody');
        var firstRow = tableBody.querySelector('tr:first-child');
        
        // Check if the first row exists
        if (firstRow) {
            // Remove the first row from the table
            tableBody.removeChild(firstRow);
            
            // Send an AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send();
        }
    });

    setInterval(function() {
            location.reload();
        }, 50000);
</script>


</body>
</html>
