<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PKSS e-learning - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-50 font-inter">
  <div class="min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-indigo-700 text-white p-6">
      <div class="mb-8">
        <img class="h-12" src="img/logo-1.png" alt="Logo"/>
      </div>
      <nav class="space-y-2">
        <a href="dashboard.html" class="flex items-center space-x-3 p-3 rounded-lg bg-indigo-800">
          <i class="fas fa-th-large"></i><span>Dashboard</span>
        </a>
        <a href="course.html" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-indigo-800">
          <i class="fas fa-book"></i><span>Course</span>
        </a>
        <a href="test.html" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-indigo-800">
          <i class="fas fa-tasks"></i><span>Test</span>
        </a>
        <a href="certificate.html" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-indigo-800">
          <i class="fas fa-certificate"></i><span>Certificates</span>
        </a>
        <a href="schedule.html" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-indigo-800">
          <i class="fas fa-calendar"></i><span>Schedule</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-6">
      <section>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Selamat Pagi, Joshua</h2>
        <div class="flex items-center mt-4 text-yellow-600">
          <i class="fas fa-exclamation-triangle mr-2"></i>
          <p>Don't miss your examination today!</p>
        </div>
        <div class="mt-4 text-gray-600">
          <span id="live-time" class="text-xl font-semibold">00:00:00</span>
        </div>
        <div class="mt-2 text-gray-600">
          <span id="live-date">Loading date</span>
        </div>
      </section>

      <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover text-center">
          <i class="fas fa-book text-indigo-600 text-5xl mb-4"></i>
          <h3 class="font-semibold text-lg">Course</h3>
          <p class="text-gray-600 mt-2">Access your courses</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover text-center">
          <i class="fas fa-tasks text-indigo-600 text-5xl mb-4"></i>
          <h3 class="font-semibold text-lg">Test</h3>
          <p class="text-gray-600 mt-2">View upcoming tests</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover text-center">
          <i class="fas fa-certificate text-indigo-600 text-5xl mb-4"></i>
          <h3 class="font-semibold text-lg">Certificate</h3>
          <p class="text-gray-600 mt-2">Your achievements</p>
        </div>
      </section>

      <section class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-xl font-semibold mb-4">Announcements</h3>
        <div class="space-y-4">
          <div class="border-b pb-4">
            <h4 class="font-medium">Mid-term Examination Schedule</h4>
            <p class="text-gray-600 mt-1">The mid-term examinations will begin next week...</p>
            <span class="text-sm text-gray-500 mt-2 block">2 hours ago</span>
          </div>
          <div class="border-b pb-4">
            <h4 class="font-medium">New Course Available</h4>
            <p class="text-gray-600 mt-1">Check out our new course on Web Development...</p>
            <span class="text-sm text-gray-500 mt-2 block">1 day ago</span>
          </div>
          <div>
            <h4 class="font-medium">Holiday Notice</h4>
            <p class="text-gray-600 mt-1">The campus will be closed for Independence Day...</p>
            <span class="text-sm text-gray-500 mt-2 block">2 days ago</span>
          </div>
        </div>
      </section>
    </main>

    <!-- Right Sidebar -->
    <aside class="w-full md:w-64 bg-white p-6 border-t md:border-t-0 md:border-l">
      <div class="text-center mb-10">
        <div class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-4">
          <img src="img/pp.png" alt="Profile" class="w-full h-full object-cover">
        </div>
        <h1 class="text-lg font-semibold">Joshua</h1>
        <p class="text-sm text-gray-500">IT division</p>
        <button class="mt-2 text-indigo-600 hover:text-indigo-700">
          <i class="fas fa-edit mr-2"></i>Edit Profile
        </button>
      </div>

      <div>
        <h3 class="font-semibold mb-4">Exam Reminders</h3>
        <div class="space-y-4">
          <div class="bg-red-50 p-3 rounded-lg">
            <div class="flex items-center text-red-800 mb-2">
              <i class="fas fa-clock mr-2"></i><span class="font-medium">Today</span>
            </div>
            <p class="text-sm">Mathematics Final Exam</p>
            <p class="text-xs text-red-600 mt-1">09:00 AM - 11:00 AM</p>
          </div>
          <div class="bg-gray-50 p-3 rounded-lg">
            <div class="flex items-center text-gray-800 mb-2">
              <i class="fas fa-clock mr-2"></i><span class="font-medium">Tomorrow</span>
            </div>
            <p class="text-sm">Physics Mid-term</p>
            <p class="text-xs text-gray-600 mt-1">02:00 PM - 04:00 PM</p>
          </div>
        </div>
      </div>
    </aside>
  </div>

  <script>
    function updateDateTime() {
      const now = new Date();
      document.getElementById('live-time').textContent = now.toLocaleTimeString();
      document.getElementById('live-date').textContent = now.toLocaleDateString('id-ID', {
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
      });
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
  </script>
</body>
</html>