<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ServiceTrack - Vehicle Service Manager</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    /* Splash Screen Styles */
    #splash-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #6A4CFF; /* Purple background */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .logo {
      width: 350px;
      margin-bottom: 20px;
    }

    .loading-bar-container {
      width: 100%;
      background-color: #D0D0D0;
      border-radius: 25px;
      height: 10px;
      margin: 20px auto;
    }

    .loading-bar {
      width: 0;
      height: 100%;
      background-color: #FF6C00;
      border-radius: 25px;
      animation: loading 3s ease-in-out forwards;
    }

    @keyframes loading {
      0% { width: 0%; }
      100% { width: 100%; }
    }

    /* Main Page Content */
    .fade-in-up {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.6s ease-out;
    }

    .fade-in-up.visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body class="bg-zinc-50 text-slate-800 scroll-smooth">

  <!-- Splash Screen -->
  <div id="splash-screen">
<div class="text-center">
      <img src="images/logo.png" alt="ServiceTrack Logo" class="logo" />
      <div class="loading-bar-container">
        <div class="loading-bar"></div>
      </div>
    </div>
  </div>
 <!-- Navbar -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceTrack</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <style>
        /* Navbar Styling */
        header {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .navbar-logo {
            width: 40px; /* Reducing the logo size */
            height: auto;
            margin-right: 10px; /* Space between the logo and the text */
        }

        .navbar-title {
            font-size: 2xl; /* Text size for "ServiceTrack" */
            font-weight: bold;
            color: #4c51bf; /* Indigo color */
        }

        .navbar-links {
            display: flex;
            gap: 20px;
        }

        .navbar-links a {
            color: #4c51bf; /* Indigo text color */
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .navbar-links a:hover {
            color: #f59e0b; /* Amber hover color */
        }

        .login-btn {
            background-color: #4c51bf; /* Indigo color */
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #4338ca; /* Darker indigo on hover */
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar Section -->
    <header>
        <div class="navbar container mx-auto flex justify-between items-center">
            <div class="logo-container">
                <!-- Logo Image and Text -->
                <img src="images/logo.png" alt="ServiceTrack Logo" class="navbar-logo">
                <h1 class="navbar-title">ServiceTrack</h1>
            </div>
            <nav class="navbar-links hidden md:block">
                <a href="#about">About</a>
                <a href="#features">Features</a>
                <a href="#contact">Contact</a>
                <a href="login.php" class="login-btn">Login</a>
            </nav>
        </div>
    </header>

</body>
</html>

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-indigo-800 to-indigo-600 text-white pt-28 pb-20 px-4 text-center">
    <div class="max-w-3xl mx-auto fade-in-up">
      <h2 class="text-4xl md:text-5xl font-bold mb-6">Smarter Vehicle Service Management</h2>
      <p class="text-lg md:text-xl mb-8">Book, track, and manage your vehicle services with ease and transparency.</p>
      <a href="request.php" class="bg-white text-indigo-600 px-6 py-3 rounded-lg hover:bg-gray-100 transition">Get Started</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-16 px-6 bg-white">
    <div class="max-w-4xl mx-auto text-center fade-in-up">
      <h3 class="text-3xl font-bold text-indigo-700 mb-4">About ServiceTrack</h3>
      <p class="text-lg text-slate-700 mb-4">
        ServiceTrack is a modern vehicle service management solution designed to bring convenience, transparency, and control to your automotive care routine.
      </p>
      <p class="text-lg text-slate-700 mb-4">
        Whether you're managing a single car or an entire fleet, our platform offers powerful tools to handle booking, reminders, digital history, and service center communication — all from a centralized dashboard.
      </p>
      <p class="text-lg text-slate-700">
        With a user-first approach, ServiceTrack simplifies the service process by keeping you informed at every stage, helping you avoid missed services and unexpected breakdowns.
      </p>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-20 bg-slate-100 px-4">
    <div class="max-w-6xl mx-auto text-center mb-12">
      <h3 class="text-3xl font-bold text-indigo-700 mb-2">Key Features</h3>
      <p class="text-gray-600">Streamline your vehicle service experience with these tools.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <!-- Feature Cards -->
      <a href="servicebooking.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105 fade-in-up">
        <h4 class="text-xl font-semibold text-indigo-600 mb-2">🔧 Service Booking</h4>
        <p class="text-gray-600">Book vehicle service appointments quickly and manage bookings in one place.</p>
      </a>
      <a href="reminders.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105 fade-in-up">
        <h4 class="text-xl font-semibold text-indigo-600 mb-2">⏰ Reminders & Alerts</h4>
        <p class="text-gray-600">Get timely email and dashboard alerts when your next service is due.</p>
      </a>
      <a href="servicecenter.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105 fade-in-up">
        <h4 class="text-xl font-semibold text-indigo-600 mb-2">🏢 Service Center Finder</h4>
        <p class="text-gray-600">Find nearby trusted service centers and book directly from the platform.</p>
      </a>
      <a href="history.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105 fade-in-up">
        <h4 class="text-xl font-semibold text-indigo-600 mb-2">📜 History Tracking</h4>
        <p class="text-gray-600">Access all past services, invoices, and reports anytime, anywhere.</p>
      </a>
      <a href="status_updates.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105 fade-in-up">
        <h4 class="text-xl font-semibold text-indigo-600 mb-2">📡 Status Updates</h4>
        <p class="text-gray-600">Receive real-time progress updates directly from the service center.</p>
      </a>
      <a href="dashboard.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:scale-105 fade-in-up">
        <h4 class="text-xl font-semibold text-indigo-600 mb-2">👤 User Dashboard</h4>
        <p class="text-gray-600">All your vehicles, services, alerts and preferences — fully in control.</p>
      </a>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-16 bg-white px-4">
    <div class="max-w-3xl mx-auto text-center">
      <h3 class="text-2xl font-bold text-indigo-700 mb-4">Need Help?</h3>
      <p class="text-gray-700 mb-6">Email us at <a href="mailto:support@servicetrack.com" class="text-indigo-500 underline">support@servicetrack.com</a></p>
      <a href="register.php" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">Join Now</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6 text-center">
    <p>&copy; <?php echo date("Y"); ?> ServiceTrack. All rights reserved.</p>
  </footer>

  <!-- Splash Screen Redirect Script -->
  <script>
    setTimeout(function() {
      document.getElementById('splash-screen').style.display = 'none';
    }, 3000);
  </script>

  <!-- Scroll Animation Script -->
  <script>
    const elements = document.querySelectorAll('.fade-in-up');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.2 });
    elements.forEach(el => observer.observe(el));
  </script>
</body>
</html>
