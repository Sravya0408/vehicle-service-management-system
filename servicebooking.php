<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Service | ServiceTrack</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
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
<body class="bg-zinc-50 text-slate-800 px-4 py-8 md:px-12">

  <!-- Success Message Modal -->
  <div id="successMessage" class="hidden fixed top-6 left-1/2 transform -translate-x-1/2 bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg shadow-md z-50 max-w-md w-full modal">
    <div class="flex justify-between items-start">
      <div>
        <h3 class="text-lg font-semibold mb-1">✅ Booking Submitted!</h3>
        <p class="text-sm">Your booking was submitted successfully.<br>We will contact you shortly.<br>Thank you!</p>
      </div>
      <button onclick="closeSuccess()" class="text-red-500 font-bold ml-4 hover:text-red-700 text-lg">&times;</button>
    </div>
  </div>

  <!-- Booking Form -->
  <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-lg fade-in-up">
    <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">Book Your Vehicle Service</h2>
    <form id="bookingForm" class="space-y-6">

      <!-- Vehicle Selection -->
      <div>
        <label class="block font-semibold mb-1 text-slate-700">Select Your Vehicle</label>
        <select class="w-full p-3 rounded-lg border border-gray-300 focus:ring-indigo-600" required>
          <option value="">Choose a vehicle</option>
          <option value="2-tier">2-tier Vehicle</option>
          <option value="3-tier">3-tier Vehicle</option>
          <option value="4-tier">4-tier Vehicle</option>
          <option value="6-tier">6-tier Vehicle</option>
        </select>
      </div>

      <!-- Service Type -->
      <div>
        <label class="block font-semibold mb-1 text-slate-700">Choose Service Type</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="service[]" value="Oil Change" class="accent-indigo-600"> <span>Oil Change</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="service[]" value="Tire Rotation" class="accent-indigo-600"> <span>Overall Service</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="service[]" value="Battery Check" class="accent-indigo-600"> <span>Battery Check</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="service[]" value="AC Repair" class="accent-indigo-600"> <span>AC Repair</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="service[]" value="Washing" class="accent-indigo-600"> <span>Washing</span>
          </label>

        </div>
      </div> 

      <!-- Service Center Locator -->
      <div>
        <label class="block font-semibold mb-1 text-slate-700">Service Center</label>
        <select class="w-full p-3 rounded-lg border border-gray-300 focus:ring-indigo-600" required>
          <option value="">Select nearby center</option>
          <option value="autofix">AutoFix Hub - Banjara Hills</option>
          <option value="speedy">Speedy Garage - Gachibowli</option>
          <option value="motormax">MotorMax - Hitech City</option>
          <option value="quickserve">QuickServe - Jubilee Hills</option>
          <option value="carclinic">CarClinic - Madhapur</option>
          <option value="revplus">RevPlus - Kondapur</option>
        </select>
      </div>

      <!-- Date and Time -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-1 text-slate-700">Preferred Date</label>
          <input type="date" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-indigo-600" required>
        </div>
        <div>
          <label class="block font-semibold mb-1 text-slate-700">Preferred Time</label>
          <input type="time" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-indigo-600" required>
        </div>
      </div>

      <!-- Cost Estimation -->
      <div>
        <label class="block font-semibold mb-1 text-slate-700">Estimated Cost</label>
        <input type="text" id="costEstimate" class="w-full p-3 rounded-lg border border-gray-300 bg-slate-100" placeholder="Click to estimate" readonly onclick="calculateEstimate()" />
      </div>

      <!-- Payment Option -->
      <div>
        <label class="block font-semibold mb-1 text-slate-700">Payment Method</label>
        <div class="space-y-2">
          <label class="flex items-center space-x-2">
            <input type="radio" name="payment" value="Online" class="accent-indigo-600" required> <span>Online (UPI/Card)</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="radio" name="payment" value="Pay at Center" class="accent-indigo-600"> <span>Pay at Service Center</span>
          </label>
        </div>
      </div>

      <!-- Booking Summary -->
      <div>
        <label class="block font-semibold mb-1 text-slate-700">Booking Summary</label>
        <textarea class="w-full p-3 rounded-lg border border-gray-300 bg-slate-100" rows="3" placeholder="Summary will auto-generate after submission..." readonly></textarea>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-white font-semibold py-3 rounded-lg transition transform hover:scale-105">Submit Booking</button>
    </form>
  </div>

  <!-- Booking History Section -->
  <div class="max-w-4xl mx-auto mt-12 bg-white p-6 rounded-xl shadow-md fade-in-up">
    <h3 class="text-xl font-bold text-indigo-700 mb-4">Previous Bookings</h3>
    <div class="overflow-x-auto">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-indigo-100 text-indigo-700">
          <tr>
            <th class="py-2 px-4">Vehicle</th>
            <th class="py-2 px-4">Service Type</th>
            <th class="py-2 px-4">Center</th>
            <th class="py-2 px-4">Date</th>
            <th class="py-2 px-4">Status</th>
          </tr>
        </thead>
        <tbody class="text-slate-600">
          <tr class="border-t">
            <td class="py-2 px-4">2-tier Vehicle</td>
            <td class="py-2 px-4">Oil Change</td>
            <td class="py-2 px-4">AutoFix Hub</td>
            <td class="py-2 px-4">2025-06-15</td>
            <td class="py-2 px-4 text-green-600 font-semibold">Completed</td>
          </tr>
          <tr class="border-t">
            <td class="py-2 px-4">4-tier Vehicle</td>
            <td class="py-2 px-4">Battery Check</td>
            <td class="py-2 px-4">Speedy Garage</td>
            <td class="py-2 px-4">2025-06-20</td>
            <td class="py-2 px-4 text-yellow-500 font-semibold">Scheduled</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Admin Notification Placeholder -->
  <div class="max-w-4xl mx-auto mt-6 text-center text-sm text-slate-500">
    <p>🔔 Booking notification will be sent to service center/admin via email or dashboard integration.</p>
  </div>

  <!-- JavaScript -->
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

    function calculateEstimate() {
      const checkboxes = document.querySelectorAll('input[name="service[]"]:checked');
      let total = 0;
      checkboxes.forEach((box) => {
        if (box.value === "Oil Change") total += 1000;
        if (box.value === "Tire Rotation") total += 800;
        if (box.value === "Battery Check") total += 600;
        if (box.value === "AC Repair") total += 1500;
      });
      document.getElementById("costEstimate").value = total > 0 ? `₹${total} approx.` : "No services selected";
    }

    document.getElementById('bookingForm').addEventListener('submit', function(e) {
      e.preventDefault();
      document.getElementById('successMessage').classList.remove('hidden');
    });

    function closeSuccess() {
      document.getElementById('successMessage').classList.add('hidden');
    }
  </script>
</body>
</html>
