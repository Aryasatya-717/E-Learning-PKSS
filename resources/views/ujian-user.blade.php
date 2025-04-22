<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKSS e-learning - Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('pkss/style.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Left Sidebar (Same as index.html) -->
        <aside class="w-full md:w-64 bg-white p-4 space-y-8 shadow-md md:h-screen">
            <div class="text-center">
              
                <img class="w-full h-full object-contain" src="/pkss/img/logo-1.png" alt="Logo" />
              
            </div>
            <nav class="space-y-4">
              <a href="{{ route('dashboard.user') }}" class="flex items-center space-x-2 text-gray-600">
                <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">🏠</div>
                <span>Dashboard</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[#1d4ed8] font-medium">
                <div class="w-10 h-10 bg-[#1d4ed8] text-white rounded grid place-items-center">📘</div>
                <span>Ujian</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-gray-600">
                <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📜</div>
                <span>Sertifikat</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-gray-600">
                <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">📆</div>
                <span>Jadwal</span>
              </a>
            </nav>
          </aside>

        <!-- Middle Content (Course Categories) -->
        <div class="flex-1 p-8 overflow-y-auto">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Ujian</h2>
                <p class="text-gray-600 mt-2">Harap Baca Materi Sebelum Memulai Ujian..</p>
            </div>

            <!-- Course Grid -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Web Development -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-4">
                    <div class="aspect-video rounded-lg overflow-hidden mb-4">
                        <img src="https://images.pexels.com/photos/270404/pexels-photo-270404.jpeg" 
                             alt="Web Development" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                    <p class="text-gray-600 mb-4">belajar cara mendevelopment website dengan framework laravel 11</p>
                    <a href="test-2.html" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-right"></i>
                        <span>Begin</span>
                    </a>
                </div>

                <!-- Data Science -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-4">
                    <div class="aspect-video rounded-lg overflow-hidden mb-4">
                        <img src="https://images.pexels.com/photos/669615/pexels-photo-669615.jpeg" 
                             alt="Data Science" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Data Science</h3>
                    <p class="text-gray-600 mb-4">Master data analysis, machine learning, and statistical modeling.</p>
                    <a href="{{ route('ujian.materi') }}" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-right"></i>
                        <span>Begin</span>
                    </a>
                </div>

                <!-- Mobile Development -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-4">
                    <div class="aspect-video rounded-lg overflow-hidden mb-4">
                        <img src="https://images.pexels.com/photos/1092644/pexels-photo-1092644.jpeg" 
                             alt="Mobile Development" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Mobile Development</h3>
                    <p class="text-gray-600 mb-4">Build iOS and Android applications using modern mobile frameworks.</p>
                    <a href="test-2.html" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-right"></i>
                        <span>Begin</span>
                    </a>
                </div>

                <!-- UI/UX Design -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-4">
                    <div class="aspect-video rounded-lg overflow-hidden mb-4">
                        <img src="https://images.pexels.com/photos/196644/pexels-photo-196644.jpeg" 
                             alt="UI/UX Design" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">UI/UX Design</h3>
                    <p class="text-gray-600 mb-4">Learn design principles, user research, and prototyping tools.</p>
                    <a href="test-2.html" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-right"></i>
                        <span>Begin</span>
                    </a>
                </div>

                <!-- Cloud Computing -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-4">
                    <div class="aspect-video rounded-lg overflow-hidden mb-4">
                        <img src="https://images.pexels.com/photos/1181467/pexels-photo-1181467.jpeg" 
                                alt="Cloud Computing" 
                                class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Cloud Computing</h3>
                    <p class="text-gray-600 mb-4">Master cloud platforms, serverless architecture, and DevOps practices.</p>
                    <a href="test-2.html" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-right"></i>
                        <span>Begin</span>
                    </a>
                </div>

                <!-- Cybersecurity -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-4">
                    <div class="aspect-video rounded-lg overflow-hidden mb-4">
                        <img src="https://images.pexels.com/photos/5380642/pexels-photo-5380642.jpeg" 
                                alt="Cybersecurity" 
                                class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Cybersecurity</h3>
                    <p class="text-gray-600 mb-4">Learn network security, ethical hacking, and security best practices.</p>
                    <a href="test-2.html" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-right"></i>
                        <span>Begin</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Sidebar (Same as index.html) -->
        <aside class="right-sidebar">
            <div class="text-center mb-10">
              <!-- Profile Image -->
              <div class="profile-img w-24 h-24 mx-auto rounded-full overflow-hidden mb-4">
                <img src="/pkss/img/pp.png" alt="Profile" class="w-full h-full object-cover">
              </div>
              <h1>Joshua</h1>
              <p>IT division</p>
             
            </div>
            <div class="mb-6">
              <a href="{{ route ('logout') }}">
                <button class="w-full bg-red-500 text-white py-2 rounded-xl font-semibold">Log out</button>
              </a>
            </div>
            
            <!-- Exam Reminders -->
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

    
</body>
</html>
