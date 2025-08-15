<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Dashboard | ServiceTrack</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.5s ease-in-out;
    }
    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body class="bg-zinc-50 text-slate-800 p-4 md:p-8">
  <div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <header class="flex items-center justify-between flex-wrap gap-4">
      <div>
        <h1 class="text-3xl font-bold text-indigo-700">👋 Welcome, Sravya!</h1>
        <p class="text-sm text-slate-600">Here’s your vehicle service summary and quick tools.</p>
      </div>
      <img src="https://i.pravatar.cc/60" alt="Profile Picture" class="w-14 h-14 rounded-full border-2 border-indigo-600" />
    </header>

    <!-- My Vehicle & Next Due Service -->
    <section class="bg-white rounded-xl shadow p-6 fade-in grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <h2 class="text-xl font-semibold text-indigo-700 mb-2">🚗 My Vehicles</h2>
        <ul class="text-sm space-y-2">
          <li><strong>Swift Dzire</strong> – KA01AB1234 <span class="text-slate-500">(Petrol)</span></li>
          <li><strong>i20 Elite</strong> – TS05XY5678 <span class="text-slate-500">(Diesel)</span></li>
          <li><strong>Honda</strong> – TS05XY5678 <span class="text-slate-500">(Petrol)</span></li>
        </ul>
        <button class="mt-3 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">➕ Add Vehicle</button>
      </div>
      <div>
        <h2 class="text-xl font-semibold text-indigo-700 mb-2">🛠️ Next Due Service</h2>
        <p class="text-sm text-slate-600">Swift Dzire - <strong>Oil Change</strong></p>
        <p class="text-sm text-amber-600">Due on: 2025-07-10</p>
        <a href="#" class="text-indigo-500 text-sm hover:underline">View Service Details</a>
      </div>
    </section>

    <!-- Booking Summary + Alerts Widget -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-6 fade-in">
      <!-- Upcoming Bookings -->
      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-indigo-700 mb-4">📅 Upcoming Bookings</h2>
        <div class="text-sm space-y-2">
          <p><strong>July 6, 10:00 AM</strong> - AutoFix Center, Hyderabad</p>
          <p>Service: AC Checkup</p>
          <a href="status_updates.php" class="text-indigo-500 hover:underline">🔍 View Booking</a>
        </div>
      </div>

      <!-- Alerts Widget -->
      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-indigo-700 mb-4">🔔 Alerts & Reminders</h2>
        <ul class="text-sm space-y-2">
          <li class="text-amber-600">Oil Change overdue by 2 days</li>
          <li class="text-amber-500">Brake Inspection due in 3 days</li>
        </ul>
        <a href="reminders.php" class="inline-block mt-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm">View All Reminders</a>
      </div>
    </section>

    <!-- Tracker + Recent History -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-6 fade-in">
      <!-- Booking Status Tracker -->
      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-indigo-700 mb-4">🔄 Service Progress</h2>
        <ol class="relative border-l border-indigo-300 text-sm">
          <li class="mb-4 ml-4">
            <span class="absolute -left-2 w-4 h-4 bg-green-500 rounded-full"></span>
            Vehicle Received - 09:00 AM
          </li>
          <li class="mb-4 ml-4">
            <span class="absolute -left-2 w-4 h-4 bg-green-500 rounded-full"></span>
            Diagnosis Started - 09:30 AM
          </li>
          <li class="mb-4 ml-4">
            <span class="absolute -left-2 w-4 h-4 bg-amber-500 rounded-full animate-pulse"></span>
            Service in Progress...
          </li>
        </ol>
        <a href="status_updates.php" class="text-indigo-500 hover:underline text-sm">Go to Status Updates</a>
      </div>

      <!-- Recent Service History -->
      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-indigo-700 mb-4">🧾 Recent Service History</h2>
        <p class="text-sm">2025-06-25 - Completed - AutoFix Center</p>
        <a href="history_tracking.php" class="text-indigo-500 hover:underline text-sm">View Full History</a>
      </div>
    </section>

    <!-- Center Suggestions + Notifications -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-6 fade-in">
      <!-- Suggestions -->
      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-indigo-700 mb-4">🏢 Suggested Service Centers</h2>
        <ul class="text-sm space-y-2">
          <li><strong>SpeedServ</strong> - 4.7⭐ - 2.5km away</li>
          <li><strong>AutoFix Pro</strong> - 4.8⭐ - 3.1km away</li>
        </ul>
        <a href="service_center_finder.php" class="text-indigo-500 hover:underline text-sm">Find More Centers</a>
      </div>

      <!-- Notifications -->
      <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-indigo-700 mb-4">📩 Notifications</h2>
        <ul class="text-sm space-y-2">
          <li>✅ Booking confirmed for July 6</li>
          <li>⚠️ Oil service reminder</li>
          <li>🎁 Flat 10% off this month!</li>
        </ul>
      </div>
    </section>

    <!-- Quick Actions -->
    <section class="bg-white p-6 rounded-xl shadow fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">⚡ Quick Actions</h2>
      <div class="flex flex-wrap gap-4">
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Book Now</button>
        <button class="bg-white border border-indigo-600 text-indigo-600 px-4 py-2 rounded hover:bg-indigo-100">Download Invoice</button>
        <button class="bg-amber-500 text-white px-4 py-2 rounded hover:bg-amber-600">Rate Last Service</button>
      </div>
    </section>

    <!-- Statistics & Insights -->
    <section class="bg-white p-6 rounded-xl shadow fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📊 My Statistics</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
        <div class="p-4 bg-slate-100 rounded">Total Spent: ₹7,200</div>
        <div class="p-4 bg-slate-100 rounded">Services: 6</div>
        <div class="p-4 bg-slate-100 rounded">Frequent: Oil Change</div>
        <div class="p-4 bg-slate-100 rounded">Last Visit: 2025-06-25</div>
      </div>
    </section>

    <!-- Favorites -->
    <section class="bg-white p-6 rounded-xl shadow fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">⭐ Favorite Centers</h2>
      <ul class="text-sm list-disc ml-5 space-y-1 text-slate-700">
        <li>AutoFix Center, Hyderabad</li>
        <li>SpeedServ Garage, Secunderabad</li>
      </ul>
    </section>

    <!-- Account Settings -->
    <section class="bg-white p-6 rounded-xl shadow fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">⚙️ Account Management</h2>
      <ul class="text-sm list-disc ml-5 space-y-1">
        <li><a href="#" class="text-indigo-500 hover:underline">Edit Profile</a></li>
        <li><a href="#" class="text-indigo-500 hover:underline">Change Password</a></li>
        <li><a href="#" class="text-indigo-500 hover:underline">Payment Methods</a></li>
        <li><a href="#" class="text-indigo-500 hover:underline">App Settings</a></li>
      </ul>
    </section>

    <!-- Support & Help -->
    <section class="bg-white p-6 rounded-xl shadow fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">🆘 Support & Help</h2>
      <div class="flex flex-wrap gap-3 text-sm">
        <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Contact Support</a>
        <a href="#" class="bg-white border border-indigo-600 text-indigo-600 px-4 py-2 rounded hover:bg-indigo-100">Visit FAQ</a>
      </div>
    </section>
  </div>

  <script>
    // Animate sections on scroll
    const sections = document.querySelectorAll('.fade-in');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.2 });

    sections.forEach(sec => observer.observe(sec));
  </script>
</body>
</html>
