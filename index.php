<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Scheduling System</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <!-- Header Section -->
    <header>
        <div class="container">
            <h1>Appointment Scheduling System</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="views/schedule_appointment.php">Schedule Appointment</a></li>
                    <li><a href="views/view_appointments.php">View Appointments</a></li>
                    <li><a href="views/manage_providers.php">Manage Providers</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Your Appointments, Simplified</h2>
            <p>Book, manage, and track your appointments with ease, all in one place.</p>
            <a href="views/schedule_appointment.php" class="btn btn-primary">Schedule Now</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h3>Features of Our System</h3>
            <div class="feature-cards">
                <div class="feature-card">
                    <i class="fas fa-calendar-check"></i>
                    <h4>Easy Scheduling</h4>
                    <p>Book appointments in just a few clicks, with flexible time options.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-mobile-alt"></i>
                    <h4>Mobile Access</h4>
                    <p>Manage your appointments from anywhere with our mobile-friendly platform.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-bell"></i>
                    <h4>Automated Reminders</h4>
                    <p>Never miss an appointment with timely reminders and alerts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonials">
        <div class="container">
            <h3>What Our Users Are Saying</h3>
            <div class="testimonial-cards">
                <div class="testimonial-card">
                    <p>"A fantastic tool that has revolutionized how we schedule appointments. Simple, fast, and effective!"</p>
                    <p>- Sarah J., Salon Owner</p>
                </div>
                <div class="testimonial-card">
                    <p>"This system has made managing my appointments a breeze. Highly recommended!"</p>
                    <p>- Michael W., Customer</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Appointment Scheduling System. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
