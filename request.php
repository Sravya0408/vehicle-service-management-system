<?php
$submitted = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $submitted = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Service Request | ServiceTrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body { font-family: 'Inter', sans-serif; }
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.5s ease;
    }
    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .modal {
      animation: slideIn 0.4s ease forwards;
    }
    @keyframes slideIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-gradient-to-br from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center px-4 py-10 relative">

  <!-- Success Message Box -->
  <?php if ($submitted): ?>
    <div id="successBox" class="fixed top-6 md:top-10 left-1/2 transform -translate-x-1/2 bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg shadow-md modal z-50 max-w-md w-full">
      <div class="flex justify-between items-start">
        <div>
          <h3 class="text-lg font-semibold mb-1">✅ Request Submitted!</h3>
          <p class="text-sm">Your request has been submitted successfully.<br>The management will contact you as soon as they review your request.<br>Thank you!</p>
        </div>
        <button onclick="document.getElementById('successBox').remove()" class="text-red-500 font-bold ml-4 hover:text-red-700 text-lg">&times;</button>
      </div>
    </div>
  <?php endif; ?>

  <!-- Form Container -->
  <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-5xl fade-in">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6 text-center">📝 Fill the Service Request Form</h2>

    <form action="request.php" method="POST" id="serviceForm">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Vehicle Type</label>
          <select name="vehicle_type" required class="w-full px-4 py-2 border border-gray-300 rounded">
            <option value="">Please Select Here</option>
            <option value="2-tier">2-tier</option>
            <option value="3-tier">3-tier</option>
            <option value="4-tier">4-tier</option>
            <option value="6-tier">6-tier</option>
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Vehicle Name</label>
          <input type="text" name="vehicle_name" required class="w-full px-4 py-2 border border-gray-300 rounded" />
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Owner Fullname</label>
          <input type="text" name="owner_name" required class="w-full px-4 py-2 border border-gray-300 rounded" />
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Vehicle Registration Number</label>
          <input type="text" name="registration_number" required class="w-full px-4 py-2 border border-gray-300 rounded" />
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Owner Contact #</label>
          <input type="tel" name="owner_contact" required class="w-full px-4 py-2 border border-gray-300 rounded" />
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Vehicle Model</label>
          <input type="text" name="vehicle_model" required class="w-full px-4 py-2 border border-gray-300 rounded" />
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Owner Email</label>
          <input type="email" name="owner_email" required class="w-full px-4 py-2 border border-gray-300 rounded" />
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Services</label>
          <select name="services" required class="w-full px-4 py-2 border border-gray-300 rounded">
            <option value="">Please Select Here</option>
            <option value="Change Oil">Change Oil</option>
            <option value="Overall Checkup">Overall Checkup</option>
            <option value="Tire Replacement">Tire Replacement</option>
          </select>
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-medium text-slate-700 mb-1">Address</label>
          <textarea name="address" rows="2" required class="w-full px-4 py-2 border border-gray-300 rounded"></textarea>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Request Type</label>
          <select name="request_type" id="requestType" required class="w-full px-4 py-2 border border-gray-300 rounded">
            <option value="Drop Off">Drop Off</option>
            <option value="Pick Up">Pick Up</option>
          </select>
        </div>

        <!-- Pick-Up Address Box -->
        <div id="pickupAddressContainer" class="md:col-span-2 hidden">
          <label class="block text-sm font-medium text-slate-700 mb-1">Pick-Up Address</label>
          <textarea name="pickup_address" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded"></textarea>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end gap-4 mt-8">
        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition font-semibold">Submit Request</button>
        <button type="button" onclick="window.history.back()" class="bg-slate-700 text-white px-6 py-2 rounded hover:bg-slate-800 transition">Close</button>
      </div>
    </form>
  </div>

  <script>
    document.querySelector('.fade-in').classList.add('visible');

    const requestType = document.getElementById('requestType');
    const pickupContainer = document.getElementById('pickupAddressContainer');

    requestType.addEventListener('change', function () {
      if (this.value === 'Pick Up') {
        pickupContainer.classList.remove('hidden');
      } else {
        pickupContainer.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
