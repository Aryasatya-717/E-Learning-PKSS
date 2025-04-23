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
        @include('sidebar-kiri-user')

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
                    <p class="text-gray-600 mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem ratione atque culpa rerum, molestiae reiciendis et aperiam delectus iure ea tenetur corrupti consequatur ipsam iusto eligendi, iste explicabo pariatur reprehenderit!</p>
                    <a href="{{ route('ujian.materi') }}" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
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
                    <a href="" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
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
        @include('sidebar-kanan-user')

        <!-- Clock Script -->
        <script src="/pkss/main.js"></script>

        <!-- Calendar Script -->
        <script src="/pkss/main.js"></script>

    
</body>
</html>
