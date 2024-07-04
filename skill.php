<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-gray-900">
  <div class="container mx-auto px-4 py-8">
    <div class="flex items-center mb-8 relative">
      <h1 class="text-3xl font-bold text-center mb-8 text-blue-500 absolute left-1/2 transform -translate-x-1/2">My Skills</h1>
      <a href="about.php" class="ml-auto bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">
        <i class="bi bi-arrow-clockwise"></i>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <div class="bg-white p-6 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-4">HTML & CSS</h2>
        <p class="text-gray-700">Proficient in creating responsive and visually appealing web pages using <span class="text-blue-500">HTML CSS</span>. Experience with modern CSS frameworks like <span class="text-blue-500">Tailwind CSS</span>.</p>
      </div>

      <div class="bg-white p-6 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-4">JavaScript</h2>
        <p class="text-gray-700">Strong understanding of <span class="text-blue-500">JavaScript</span> fundamentals. Skilled in building interactive web applications and dynamic user <span class="text-blue-500">experience</span>.</p>
      </div>

      <div class="bg-white p-6 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-4">PHP & Laravel</h2>
        <p class="text-gray-700">Proficient in PHP programming language. Experience in building web applications using <span class="text-blue-500">Laravel</span> framework, including database integration with <span class="text-blue-500">MySQL</span>.</p>
      </div>
    </div>
  </div>
</body>

</html>
