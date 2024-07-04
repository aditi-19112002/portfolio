<?php include_once "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <!-- External CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto py-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-blue-500">SUBMITTED MESSAGES</h2>
            <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="bi bi-arrow-clockwise"></i>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-700 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">First Name</th>
                        <th class="px-6 py-3 border-b border-gray-700 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Last Name</th>
                        <th class="px-6 py-3 border-b border-gray-700 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 border-b border-gray-700 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($connect, "SELECT first_name, last_name, email, message FROM comment ORDER BY id DESC");
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td class='px-6 py-4 border-b border-gray-700 text-sm text-white'>{$row['first_name']}</td>";
                        echo "<td class='px-6 py-4 border-b border-gray-700 text-sm text-white'>{$row['last_name']}</td>";
                        echo "<td class='px-6 py-4 border-b border-gray-700 text-sm text-gray-400'>{$row['email']}</td>";
                        echo "<td class='px-6 py-4 border-b border-gray-700 text-sm text-white'>{$row['message']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
