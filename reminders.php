<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reminders & Alerts | ServiceTrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .fade-in-up {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.6s ease-out;
    }
    .fade-in-up.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .modal {
      animation: slideIn 0.4s ease forwards;
    }
    @keyframes slideIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-zinc-50 text-slate-800 px-4 py-8 md:px-12 scroll-smooth">

  <!-- ✅ Success Message Modal -->
  <div id="reminderSuccess" class="hidden fixed top-6 left-1/2 transform -translate-x-1/2 bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg shadow-md z-50 max-w-md w-full modal">
    <div class="flex justify-between items-start">
      <div>
        <h3 class="text-lg font-semibold mb-1">✅ Reminder Saved!</h3>
        <p class="text-sm">Your custom reminder was added successfully.<br>We’ll notify you as scheduled.</p>
      </div>
      <button onclick="closeReminderSuccess()" class="text-red-500 font-bold ml-4 hover:text-red-700 text-lg">&times;</button>
    </div>
  </div>

  <!-- Header -->
  <div class="max-w-5xl mx-auto mb-10 text-center">
    <h1 class="text-3xl md:text-4xl font-bold text-indigo-700">🔔 Reminders & Alerts</h1>
    <p class="text-slate-600 mt-2">Stay up to date with upcoming services, overdue maintenance, and custom notifications.</p>
  </div>

  <!-- Notification Center -->
  <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 fade-in-up">
    <!-- Upcoming Services -->
    <div class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📅 Upcoming Services</h2>
      <ul class="space-y-3">
        <li class="flex justify-between items-center bg-slate-100 p-3 rounded-lg">
          <div>
            <p class="font-semibold">2-tier - Oil Change</p>
            <p class="text-sm text-slate-500">Due: 2025-07-02</p>
          </div>
          <span class="bg-amber-400 text-white text-sm px-3 py-1 rounded-full">Upcoming</span>
        </li>
        <li class="flex justify-between items-center bg-slate-100 p-3 rounded-lg">
          <div>
            <p class="font-semibold">3-tier - Brake Inspection</p>
            <p class="text-sm text-slate-500">Due: 2025-07-05</p>
          </div>
          <span class="bg-amber-400 text-white text-sm px-3 py-1 rounded-full">Upcoming</span>
        </li>
      </ul>
    </div>

    <!-- Overdue Services -->
    <div class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-semibold text-red-600 mb-4">⚠️ Overdue Services</h2>
      <ul class="space-y-3">
        <li class="flex justify-between items-center bg-red-50 p-3 rounded-lg">
          <div>
            <p class="font-semibold">4-tier - Battery Check</p>
            <p class="text-sm text-red-500">Due: 2025-06-15</p>
          </div>
          <span class="bg-red-500 text-white text-sm px-3 py-1 rounded-full">Overdue</span>
        </li>
      </ul>
    </div>
  </div>

  <!-- Custom Reminder Setup -->
  <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md fade-in-up">
    <h2 class="text-xl font-semibold text-indigo-700 mb-4">➕ Create Custom Reminder</h2>
    <form id="reminderForm" class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <input type="text" placeholder="Reminder Title" class="p-3 border border-gray-300 rounded-lg" required>
      <input type="date" class="p-3 border border-gray-300 rounded-lg" required>
      <select class="p-3 border border-gray-300 rounded-lg md:col-span-2" required>
        <option value="">Select Vehicle</option>
        <option>2-tier Vehicle</option>
        <option>3-tier Vehicle</option>
        <option>4-tier Vehicle</option>
        <option>6-tier Vehicle</option>
      </select>
      <textarea rows="2" placeholder="Note or description" class="p-3 border border-gray-300 rounded-lg md:col-span-2"></textarea>
      <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-lg md:col-span-2 transition">Save Reminder</button>
    </form>
  </div>

  <!-- Alert Center & Settings -->
  <div class="max-w-5xl mx-auto mt-10 grid grid-cols-1 md:grid-cols-2 gap-6 fade-in-up">
    <!-- Alert Settings -->
    <div class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">🔧 Notification Settings</h2>
      <label class="flex items-center space-x-2 mb-3">
        <input type="checkbox" class="accent-indigo-600" checked> <span>Email Reminders</span>
      </label>
      <label class="flex items-center space-x-2 mb-3">
        <input type="checkbox" class="accent-indigo-600" checked> <span>In-App Notifications</span>
      </label>
      <label class="flex items-center space-x-2">
        <input type="checkbox" class="accent-indigo-600"> <span>SMS Alerts</span>
      </label>
    </div>

    <!-- Reminder History -->
    <div class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📂 Reminder History</h2>
      <ul class="space-y-2 text-sm text-slate-600">
        <li>✅ 2025-06-10: AC Service for 2-tier (Completed)</li>
        <li>❌ 2025-06-05: Tire Check for 3-tier (Missed)</li>
        <li>✅ 2025-05-30: Engine Check for 4-tier (Completed)</li>
      </ul>
    </div>
  </div>

  <!-- Calendar Preview (Mock) -->
  <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md fade-in-up">
    <h2 class="text-xl font-semibold text-indigo-700 mb-4">📆 Calendar Overview (Preview)</h2>
    <div class="grid grid-cols-7 gap-2 text-center text-sm text-slate-600">
      <span class="font-semibold">Sun</span><span class="font-semibold">Mon</span><span class="font-semibold">Tue</span><span class="font-semibold">Wed</span><span class="font-semibold">Thu</span><span class="font-semibold">Fri</span><span class="font-semibold">Sat</span>
      <span></span><span>1</span><span>2</span><span class="bg-amber-400 text-white rounded">3</span><span>4</span><span>5</span><span>6</span>
      <span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span class="bg-red-500 text-white rounded">12</span><span>13</span>
      <span>14</span><span>15</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span>
    </div>
  </div>

  <!-- Admin Notification -->
  <div class="max-w-5xl mx-auto mt-6 text-center text-sm text-slate-500">
    <p>🔔 Service centers and admins receive alerts via dashboard or API (integration planned).</p>
  </div>

  <!-- JavaScript -->
  <script>
    const fadeElements = document.querySelectorAll('.fade-in-up');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.2 });
    fadeElements.forEach(el => observer.observe(el));

    document.getElementById("reminderForm").addEventListener("submit", (e) => {
      e.preventDefault();
      document.getElementById('reminderSuccess').classList.remove('hidden');
    });

    function closeReminderSuccess() {
      document.getElementById('reminderSuccess').classList.add('hidden');
    }
  </script>
</body>
</html>
