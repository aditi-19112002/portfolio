<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-gray-200">
<div class="flex flex-col md:flex-row bg-black text-white py-3 px-4 items-center justify-between w-full">
  <div class="flex items-center space-x-2 text-white mb-4 md:mb-0">
    <img src="images/aditi.jpg" alt="User Profile" class="h-16 w-16 rounded-full">
  </div>
  <div class="flex flex-col md:flex-row items-center gap-4 md:gap-8">
    <a href="index.php" class="text-blue-500 font-bold">Home</a>
    <a href="skill.php" class="text-white font-bold">Skills</a>
    <a href="work.php" class="text-white font-bold">Work</a>
    <button>
      <a href="resume.php" class="text-blue-500 font-bold bg-transparent border border-white px-4 py-2 rounded hover:bg-blue-800">Resume</a>
    </button>
  </div>
</div>


  <div class="container mx-auto mt-8 p-8 bg-gray-900 rounded-lg shadow-lg">
    <div class="flex flex-col lg:flex-row items-center lg:items-start">
      <div class="lg:w-1/3">
        <img src="images/aditi.jpg" alt="Image" class="w-full h-auto lg:max-w-xs mx-auto lg:mx-0 rounded-lg">
      </div>
      <div class="lg:w-2/3 mt-4 lg:mt-0 lg:ml-8">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-bold text-blue-500">Aditi Keshri</h2>
          <a href="index.php" class="bg-gray-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded ml-4">
            <i class="bi bi-arrow-clockwise"></i>
          </a>
        </div>
        <p class="mt-4 text-white">
          Hi I am <span class="text-blue-500">Aditi Keshri</span>,<br>
          I am a passionate beginner web developer. As a fresher, I bring a fresh perspective and a strong willingness to learn. My educational background has equipped me with a solid foundation, and I am eager to apply my knowledge and contribute effectively to this role.
        </p>
        <button class="mt-4 text-blue-500 bg-transparent border border-white px-4 py-2 rounded hover:bg-blue-800">HIRE ME</button>
      </div>
    </div>
  </div>
</body>

</html>
