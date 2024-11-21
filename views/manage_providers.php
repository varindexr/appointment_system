<?php
// Include database connection
include('../config/db.php');

// Fetch providers from the database
$query = "SELECT * FROM providers";
$stmt = $pdo->query($query);
$providers = $stmt->fetchAll();

// Check if form is submitted for adding a provider
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
            // Prepare SQL statement to insert provider data into the database
            $stmt = $pdo->prepare("INSERT INTO providers (name, email, phone) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $phone]);
            $success_message = "Provider added successfully!";
            // Fetch updated providers list
            $stmt = $pdo->query($query);
            $providers = $stmt->fetchAll();
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
    <title>Manage Providers</title>
    <!-- Link to Manage Providers Page Specific CSS -->
    <link rel="stylesheet" href="../css/manage_providers.css">
</head>

<body>

    <header>
        <div class="container">
            <h1>Manage Service Providers</h1>
        </div>
    </header>

    <main>
        <div class="form-container">
            <!-- Success or Error Message -->
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success">
                    <p><?php echo $success_message; ?></p>
                </div>
            <?php endif; ?>

            <?php if (isset($error_message)): ?>
                <div class="alert alert-error">
                    <p><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>

            <!-- Add Provider Form -->
            <div class="card">
                <h2>Add New Provider</h2>
                <form action="manage_providers.php" method="POST">
                    <div class="form-group">
                        <label for="name">Provider Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>

                    <input type="submit" value="Add Provider">
                </form>
            </div>
        </div>

        <div class="provider-list">
            <h2>All Providers</h2>

            <!-- Provider Cards -->
            <div class="cards-container">
                <?php if (count($providers) > 0): ?>
                    <?php foreach ($providers as $provider): ?>
                        <div class="card">
                            <h3><?php echo htmlspecialchars($provider['name']); ?></h3>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($provider['email']); ?></p>
                            <p><strong>Phone:</strong> <?php echo htmlspecialchars($provider['phone']); ?></p>
                            
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No providers found.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Appointment Scheduling System. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
