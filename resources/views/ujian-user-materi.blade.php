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
        <aside class="w-full md:w-64 bg-white px-4 pt-4 pb-6 space-y-8 shadow-md md:h-screen">
          <div class="w-40 h-20 object-contain mx-auto mb-0">
            <img class="w-full h-full object-contain" src="/pkss/img/logo-1.png" alt="Logo" />
          </div>
          <nav class="space-y-4 mt-0">
            <a href="{{ route('dashboard.user') }}" class="flex items-center space-x-2 text-gray-600">
              <div class="w-10 h-10 bg-gray-200 rounded grid place-items-center">🏠</div>
              <span>Dashboard</span>
            </a>
            <a href="" class="flex items-center space-x-2 text-[#1d4ed8] font-medium">
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
            <div class="mb-10 mt-6 ">

              <!--fitur kembali-->
              <a href="{{ route('ujian.user') }}" class="inline-flex item-center text-indigo-600 hover:underline mb-6 font-bold text-lg">⬅️ Kembali </a>
                
                <h2 class="text-3xl font-bold text-gray-800">Web Development</h2>
                <p class="text-black mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus tempore vitae, eum fuga harum voluptates dicta repellat, at libero alias nemo perspiciatis perferendis officiis iure, pariatur recusandae. Nihil, perferendis. Nemo!</p>
            </div>

            <!-- Course Grid -->
            
            
            <div class="grid grid-cols-2 gap-6">
                <!-- Web Development -->
                
                <div class="mb-6">
                  <div class="flex items-center bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow p-4 w-full max-w-2xl">
                    <div class="text-4xl bg-indigo-100 text-indigo-600 w-16 h-16 flex items-center justify-center rounded-full mr-4">
                      📥
                    </div>
        
                    <div>
                      <h3 class="text-lg font-semibold text-gray-800">Web Development</h3>
                      <p class="text-gray-500 text-sm mt-1">Download course material</p>
                    </div>
                  </div>
                </div>
                
                    
                    
              </div>
              <a href="{{ route('ujian.user.test') }}" class="inline-flex item-center text-indigo-600 hover:underline mb-6 font-bold text-lg">mulai ujian </a>

               

    
</body>
</html>
