<?php
// Include database connection
include('../config/db.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;

    // Check if required fields are filled
    if (!$name || !$email || !$phone) {
        $error_message = "Please fill out all fields.";
    } else {
        try {
            // Prepare the SQL statement to insert provider data into the database
            $stmt = $pdo->prepare("INSERT INTO providers (name, email, phone) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $phone]);
            $success_message = "Provider added successfully!";
        } catch (PDOException $e) {
            $error_message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Provider</title>
    <!-- Link to Add Provider Page Specific CSS -->
    <link rel="stylesheet" href="../css/manage_providers.css">
</head>

<body>

    <header>
        <div class="container">
            <h1>Add New Service Provider</h1>
        </div>
    </header>

    <main>
        <div class="form-container">
            <!-- Display Success or Error Message -->
            <?php if (isset($success_message)): ?>
                <div class="success-message">
                    <p><?php echo $success_message; ?></p>
                </div>
            <?php endif; ?>

            <?php if (isset($error_message)): ?>
                <div class="error-message">
                    <p><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>

            <!-- Provider Add Form -->
            <form action="add_provider.php" method="POST">
                <label for="name">Provider Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>

                <input type="submit" value="Add Provider">
            </form>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Appointment Scheduling System. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
