<?php
// Include database connection
include('../config/db.php');

// Fetch appointments from the database
$query = "SELECT * FROM appointments ORDER BY created_at DESC";
$stmt = $pdo->query($query);
$appointments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <!-- Link to View Appointments Page Specific CSS -->
    <link rel="stylesheet" href="../css/view.css"> <!-- Use the same CSS as Home Page -->
</head>

<body>

    <header>
        <div class="container">
            <h1>Your Appointments</h1>
        </div>
    </header>

    <main>
        <div class="form-container">
            <?php if (count($appointments) > 0): ?>
                <h2>All Appointments</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Additional Notes</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $appointment): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($appointment['name']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['email']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['message']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['created_at']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>No appointments found.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Appointment Scheduling System. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
