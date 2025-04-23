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

               

    
</body>
</html>
