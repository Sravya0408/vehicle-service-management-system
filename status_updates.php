<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Service Status Updates | ServiceTrack</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .fade-in { opacity: 0; transform: translateY(20px); transition: all 0.6s ease-in-out; }
    .fade-in.visible { opacity: 1; transform: translateY(0); }
  </style>
</head>
<body class="bg-zinc-50 text-slate-800 p-4 md:p-8">
  <div class="max-w-6xl mx-auto">
    <header class="text-center mb-8">
      <h1 class="text-3xl md:text-4xl font-bold text-indigo-700">🔄 Live Service Status Updates</h1>
      <p class="text-slate-600 mt-2">Track your vehicle's service journey in real-time.</p>
    </header>

    <!-- Booking Info -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📋 Booking Information</h2>
      <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-700">
        <p><strong>Booking ID:</strong> #45678</p>
        <p><strong>Vehicle:</strong> Honda Amaze - TS10AB1234</p>
        <p><strong>Service Center:</strong> SpeedAuto, Hyderabad</p>
        <p><strong>Contact:</strong> +91 9876543210</p>
        <p><strong>Scheduled:</strong> 2025-07-05, 10:00 AM</p>
      </div>
    </section>

    <!-- Status Timeline -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📍 Service Progress</h2>
      <div class="flex flex-col gap-6 border-l-4 border-indigo-500 pl-6">
        <div class="relative">
          <span class="absolute -left-3 w-6 h-6 bg-indigo-600 rounded-full"></span>
          <div class="pl-2">
            <p class="font-semibold">Vehicle Received</p>
            <p class="text-sm text-slate-500">2025-07-05 10:05 AM</p>
          </div>
        </div>
        <div class="relative">
          <span class="absolute -left-3 w-6 h-6 bg-indigo-600 rounded-full"></span>
          <div class="pl-2">
            <p class="font-semibold">Diagnosis Completed</p>
            <p class="text-sm text-slate-500">2025-07-05 10:30 AM</p>
          </div>
        </div>
        <div class="relative">
          <span class="absolute -left-3 w-6 h-6 bg-indigo-200 border-2 border-indigo-600 animate-pulse rounded-full"></span>
          <div class="pl-2">
            <p class="font-semibold text-indigo-700">Service In Progress</p>
            <p class="text-sm text-slate-500">Estimated Completion: 12:30 PM</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Notifications and Notes -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <div class="md:flex justify-between mb-4">
        <h2 class="text-xl font-semibold text-indigo-700">🔔 Notifications & Updates</h2>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Reschedule / Cancel</button>
      </div>
      <div class="text-sm text-slate-700 space-y-2">
        <p><strong>11:45 AM:</strong> Brake pads replaced</p>
        <p><strong>11:30 AM:</strong> Oil changed and refilled</p>
        <p><strong>11:00 AM:</strong> Engine diagnosis completed - No issues</p>
      </div>
    </section>

    <!-- Attachments -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📎 Attachments</h2>
      <ul class="list-disc ml-6 text-slate-700 text-sm">
        <li><a href="#" class="text-indigo-600 hover:underline">Before Service Photo</a></li>
        <li><a href="#" class="text-indigo-600 hover:underline">Service Report PDF</a></li>
      </ul>
    </section>

    <!-- Status History -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">🧾 Status History</h2>
      <table class="w-full text-sm text-left">
        <thead class="bg-slate-100">
          <tr>
            <th class="p-2">Status</th>
            <th class="p-2">Timestamp</th>
            <th class="p-2">Comments</th>
            <th class="p-2">Attachments</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="p-2">Received</td>
            <td class="p-2">10:05 AM</td>
            <td class="p-2">Received at front desk</td>
            <td class="p-2">-</td>
          </tr>
          <tr class="border-t">
            <td class="p-2">Diagnosis</td>
            <td class="p-2">10:30 AM</td>
            <td class="p-2">No engine issues</td>
            <td class="p-2">Engine_Diag.pdf</td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Feedback -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📝 Leave Feedback</h2>
      <textarea class="w-full border p-3 rounded mb-4" rows="3" placeholder="Share your experience..."></textarea>
      <button class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Submit</button>
    </section>
  </div>

  <!-- Animation Script -->
  <script>
    const fadeEls = document.querySelectorAll('.fade-in');
    const obs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.2 });
    fadeEls.forEach(el => obs.observe(el));
  </script>
</body>
</html>
