<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Service Center Finder | ServiceTrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .fade-in { opacity: 0; transform: translateY(20px); transition: all 0.6s ease-in-out; }
    .fade-in.visible { opacity: 1; transform: translateY(0); }
    #map { height: 300px; width: 100%; }
    .popup-box {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #4f46e5;
      color: white;
      padding: 12px 20px;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      z-index: 1000;
      animation: fadeSlide 0.4s ease;
    }
    @keyframes fadeSlide {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-zinc-50 text-slate-800 p-4 md:p-8">

<div class="max-w-7xl mx-auto">
  <header class="text-center mb-8">
    <h1 class="text-4xl font-bold text-indigo-700">🔍 Find a Service Center</h1>
    <p class="text-slate-600 mt-2">Search and book from trusted vehicle service centers near you.</p>
  </header>

  <!-- Search and Filters -->
  <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
    <form class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
      <input type="text" id="searchLocation" placeholder="City, Area, or Pincode" class="p-3 border border-gray-300 rounded" />
      <select id="ratingFilter" class="p-3 border border-gray-300 rounded">
        <option value="">Filter by Rating</option>
        <option>⭐⭐⭐⭐⭐</option>
        <option>⭐⭐⭐⭐</option>
        <option>⭐⭐⭐</option>
        <option>⭐⭐</option>
        <option>⭐</option>
      </select>
      <select id="serviceType" class="p-3 border border-gray-300 rounded">
        <option value="">Service Type</option>
        <option>Oil Change</option>
        <option>AC Repair</option>
        <option>Tire Replacement</option>
        <option>Battery Check</option>
        <option>Transmission Repair</option>
        <option>Wheel Repair</option>
        <option> Washing</option>
        <option>Brake Inspection</option>
      </select>
    </form>
    <div class="flex justify-between items-center flex-wrap gap-2">
      <div>
        <button type="button" onclick="detectLocation()" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Auto Detect Location</button>
      </div>
      <div>
        <label class="mr-2">Sort by:</label>
        <select class="p-2 border border-gray-300 rounded">
          <option>Nearest First</option>
          <option>Highest Rated</option>
          <option>Most Popular</option>
        </select>
      </div>
    </div>
  </section>

  <!-- Google Maps Section -->
  <section class="bg-white p-6 rounded-xl shadow mb-6 fade-in">
    <h2 class="text-xl font-semibold text-indigo-700 mb-2">🗺️ Map View</h2> 
    <p><iframe id="mapIframe" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d20046970.98824444!2d66.83821100295954!3d22.113059738673844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sIndia%20all%20vehicle%20services!5e0!3m2!1sen!2sin!4v1753031916655!5m2!1sen!2sin" width="1200" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
  </section>

  <!-- Service Centers List -->
  <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 fade-in">
    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
      <div class="flex items-center mb-3">

        <img src="images/logo.png" alt="ServiceTrack Logo" class="logo" width="35" height="25" />
        <div>
          <h3 class="font-bold text-indigo-700"> AutoFix Garage</h3>
          <p class="text-sm text-slate-500">2.4km</p>
        </div>
      </div>
      <p class="text-sm text-slate-600">123 Service Road, Hyderabad<br>+91 9876543210</p>
      <div class="flex justify-between items-center mt-4">
        <button onclick="showPopup('Booked successfully!')" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 text-sm">Book Now</button>
        <button onclick="showPopup('Saved successfully!')" class="text-sm text-amber-500 hover:underline">Save</button>
      </div>
    </div>
  </section>

  <div class="text-center text-sm text-slate-500 mt-10">
    Admins can manage centers and API responses from the backend dashboard.
  </div>
</div>

<!-- Google Maps API -->
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>

<script>
  // Scroll animation
  const fadeElements = document.querySelectorAll('.fade-in');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add('visible');
    });
  }, { threshold: 0.1 });
  fadeElements.forEach(el => observer.observe(el));

  // Google Maps
  let map;
  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 20.5937, lng: 78.9629 },
      zoom: 5,
    });
  }

  // Location Detection
  function detectLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) => {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;

        map.setCenter({ lat, lng });
        map.setZoom(14);
        new google.maps.Marker({ position: { lat, lng }, map, title: "Your Location" });

        // Update iframe map link
        const iframe = document.getElementById('mapIframe');
        iframe.src = `https://www.google.com/maps?q=${lat},${lng}&z=14&output=embed`;

        showPopup("Location detected and map updated!");
      }, () => {
        alert("Unable to retrieve your location.");
      });
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  // Popup Message
  function showPopup(message) {
    const popup = document.createElement('div');
    popup.className = 'popup-box';
    popup.textContent = message;
    document.body.appendChild(popup);
    setTimeout(() => popup.remove(), 2500);
  }
</script>

</body>
</html>
