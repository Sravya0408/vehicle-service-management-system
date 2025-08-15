<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Service History Tracker | ServiceTrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <style>
    body { font-family: 'Inter', sans-serif; }
    .fade-in { opacity: 0; transform: translateY(20px); transition: all 0.5s ease-in-out; }
    .fade-in.visible { opacity: 1; transform: translateY(0); }
  </style>
</head>
<body class="bg-zinc-50 text-slate-800 p-4 md:p-8">
  <div class="max-w-7xl mx-auto">
    <header class="text-center mb-8">
      <h1 class="text-4xl font-bold text-indigo-700">🗂️ Service History Tracking</h1>
      <p class="text-slate-600 mt-2">View and manage your vehicle's complete service records.</p>
    </header>

    <!-- Vehicle Selector & Filters -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <select id="vehicleSelect" class="p-3 border border-gray-300 rounded">
          <option>Select Vehicle</option>
          <option value="2-tier">2-tier Vehicle</option>
          <option value="3-tier">3-tier Vehicle</option>
          <option value="4-tier">4-tier Vehicle</option>
          <option value="6-tier">6-tier Vehicle</option>
        </select>
        <input type="text" id="bookingID" placeholder="Booking ID" class="p-3 border border-gray-300 rounded" readonly>
        <select class="p-3 border border-gray-300 rounded">
          <option>Status</option>
          <option>Completed</option>
          <option>Missed</option>
          <option>Cancelled</option>
        </select>
        <select class="p-3 border border-gray-300 rounded">
          <option>Service Type</option>
          <option>Oil Change</option>
          <option>Overall Checkup</option>
          <option>Tire Replacement</option>
          <option>Washing</option>
        </select>
      </div>
    </section>

    <!-- History Table -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in overflow-auto">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">🧾 Service Records</h2>
      <table class="min-w-full text-sm">
        <thead>
          <tr class="bg-slate-100 text-left">
            <th class="p-3">Date</th>
            <th class="p-3">Center</th>
            <th class="p-3">Service</th>
            <th class="p-3">Cost</th>
            <th class="p-3">Status</th>
            <th class="p-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="p-3">2025-07-01</td>
            <td class="p-3">AutoFix, Hyderabad</td>
            <td class="p-3">Oil Change</td>
            <td class="p-3">₹1,200</td>
            <td class="p-3 text-green-600">Completed</td>
            <td class="p-3 space-x-2">
              <button class="text-indigo-600 hover:underline">View</button>
              <button class="text-amber-500 hover:underline">Rebook</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Detailed Modal Placeholder -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📄 Booking Details</h2>
      <p class="text-slate-600 text-sm">Booking ID: #12345 | Mechanic: Raju</p>
      <ul class="mt-3 text-sm list-disc ml-5 text-slate-700">
        <li>Oil change – ₹500</li>
        <li>Engine cleaning – ₹700</li>
        <li>Filter replacement – ₹200</li>
      </ul>
      <div class="mt-4 space-x-3">
        <button onclick="downloadPDF()" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Download PDF</button>
        <button class="bg-slate-500 text-white px-4 py-2 rounded hover:bg-slate-600">Print</button>
      </div>
    </section>

    <!-- Maintenance Patterns Charts -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📈 Maintenance Patterns</h2>
      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-slate-100 p-4 rounded shadow text-center">
          <h3 class="font-semibold text-slate-700 mb-2">💰 Total Spent</h3>
          <p class="text-indigo-600 font-bold text-lg">₹12,400</p>
        </div>
        <div class="bg-slate-100 p-4 rounded shadow text-center">
          <h3 class="font-semibold text-slate-700 mb-2">🔧 Most Frequent Service</h3>
          <p class="text-indigo-600 font-bold text-lg">Oil Change (6 times)</p>
        </div>
        <div class="bg-slate-100 p-4 rounded shadow text-center">
          <h3 class="font-semibold text-slate-700 mb-2">📅 Avg. Days Between Services</h3>
          <p class="text-indigo-600 font-bold text-lg">120 Days</p>
        </div>
      </div>
    </section>

    <!-- Feedback & Reviews -->
    <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
      <h2 class="text-xl font-semibold text-indigo-700 mb-4">📝 Feedback</h2>
      <textarea class="w-full p-3 border border-gray-300 rounded mb-3" rows="3" placeholder="Leave your feedback..."></textarea>
      <button onclick="submitFeedback()" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Submit</button>
    </section>

    <!-- Notifications and Admin Info -->
    <div class="text-center text-sm text-slate-500 fade-in">
      🔔 Get notified before your next scheduled service. Admins can manage records and reports via dashboard.
    </div>
  </div>

  <!-- Success Message Box -->
  <div id="submittedMessage" class="hidden fixed top-6 left-1/2 transform -translate-x-1/2 bg-blue-100 border border-blue-300 text-blue-800 px-6 py-4 rounded-lg shadow-md z-50 max-w-md w-full">
    <div class="flex justify-between items-start">
      <div>
        <h3 class="text-lg font-semibold mb-1">✅ Feedback Submitted Successfully!</h3>
        <p class="text-sm">Your feedback has been submitted. Thank you!</p>
      </div>
    </div>
  </div>

  <script>
    const fadeItems = document.querySelectorAll('.fade-in');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.1 });
    fadeItems.forEach(el => observer.observe(el));

    // Function to generate Booking ID automatically after vehicle selection
    document.getElementById("vehicleSelect").addEventListener("change", function() {
      const vehicle = this.value;
      const bookingID = `${vehicle}-${Math.floor(Math.random() * 1000000)}`;
      document.getElementById("bookingID").value = bookingID;
    });

    // Function to download PDF
    function downloadPDF() {
      const doc = new jsPDF();
      const summary = document.querySelector('textarea').value;
      doc.text(summary, 10, 10);
      doc.save("BookingDetails.pdf");
      alert("Box Downloaded!");
    }

    // Submit Feedback
    function submitFeedback() {
      document.getElementById('submittedMessage').classList.remove('hidden');
    }
  </script>
</body>
</html>
