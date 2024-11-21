<?php
// Include the database connection file
require_once('../config/db.php');

// Define variables and initialize with empty values
$name = $email = $phone = $date = $time = $message = "";
$name_err = $email_err = $phone_err = $date_err = $time_err = "";

// Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate phone number
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your phone number.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Validate date
    if (empty(trim($_POST["date"]))) {
        $date_err = "Please choose an appointment date.";
    } else {
        $date = trim($_POST["date"]);
    }

    // Validate time
    if (empty(trim($_POST["time"]))) {
        $time_err = "Please choose an appointment time.";
    } else {
        $time = trim($_POST["time"]);
    }

    // Validate message (optional)
    if (!empty(trim($_POST["message"]))) {
        $message = trim($_POST["message"]);
    }

    // If no errors, insert data into the database
    if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($date_err) && empty($time_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO appointments (name, email, phone, appointment_date, appointment_time, message) VALUES (:name, :email, :phone, :appointment_date, :appointment_time, :message)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
            $stmt->bindParam(":appointment_date", $param_date, PDO::PARAM_STR);
            $stmt->bindParam(":appointment_time", $param_time, PDO::PARAM_STR);
            $stmt->bindParam(":message", $param_message, PDO::PARAM_STR);

            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_date = $date;
            $param_time = $time;
            $param_message = $message;

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo "Your appointment has been scheduled successfully!";
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        unset($stmt);
    }
}

// Close connection
unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Appointment</title>
    <link rel="stylesheet" href="../css/schedulee.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="container">
            <h1>Schedule Your Appointment</h1>
        </div>
    </header>

    <main>
        <div class="form-container">
            <h2>Book an Appointment</h2>
            <form action="schedule_appointment.php" method="POST">

                <!-- Name Field -->
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <span><?php echo $name_err; ?></span>

                <!-- Email Field -->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <span><?php echo $email_err; ?></span>

                <!-- Phone Field -->
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                <span><?php echo $phone_err; ?></span>

                <!-- Date Field -->
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
                <span><?php echo $date_err; ?></span>

                <!-- Time Field -->
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
                <span><?php echo $time_err; ?></span>

                <!-- Message Field -->
                <label for="message">Additional Notes:</label>
                <textarea id="message" name="message" rows="4" placeholder="Enter any additional details"></textarea>

                <!-- Submit Button -->
                <button type="submit">Confirm Appointment</button>
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
