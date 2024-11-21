
// actions/submit_appointment.php
<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $service_provider_id = $_POST['service_provider'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    // Insert the appointment into the database
    $sql = "INSERT INTO appointments (service_provider_id, user_name, user_email, appointment_date, appointment_time)
            VALUES (:service_provider_id, :user_name, :user_email, :appointment_date, :appointment_time)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':service_provider_id' => $service_provider_id,
            ':user_name' => $name,
            ':user_email' => $email,
            ':appointment_date' => $appointment_date,
            ':appointment_time' => $appointment_time
        ]);
        echo "Appointment scheduled successfully!";
    } catch (\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
