<?php include_once "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-gray-900">

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Form for inserting data into the second_table -->
            <div class="bg-white text-black shadow-md p-4 mb-8">
                <div class="mt-4">
                    <a href="#" class="block px-4 py-2 bg-blue-500 text-white rounded mb-2">Insert Project Detail</a>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="frontend" class="block text-black">Frontend</label>
                            <input type="text" id="frontend" name="frontend" class="form-input w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-3">
                            <label for="backend" class="block text-black">Backend</label>
                            <input type="text" id="backend" name="backend" class="form-input w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-3">
                            <label for="database" class="block text-black">Database</label>
                            <input type="text" id="database" name="database" class="form-input w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-3">
                            <label for="programming" class="block text-black">Programming</label>
                            <input type="text" id="programming" name="programming" class="form-input w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-3">
                            <label for="categories" class="block text-black">Categories</label>
                            <select name="categories" id="categories" class="form-select w-full px-3 py-2 border rounded-lg">
                                <option value="">Select category here</option>
                                <?php
                                    $query=mysqli_query($connect,"SELECT * FROM category");
                                    while($row = mysqli_fetch_array($query)){
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "<option value='$cat_id'>$cat_title</option>"; 
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="project_image" class="block text-black">Project Image</label>
                            <input type="file" id="project_image" name="project_image" class="form-input">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="create_project"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                                value="Insert Project Detail">
                        </div>
                    </form>
                    <?php
include_once "connect.php";

if(isset($_POST['create_project'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $frontend = $_POST['frontend'];
    $backend = $_POST['backend'];
    $database = $_POST['database'];
    $programming = $_POST['programming'];
    $categories = $_POST['categories'];

    // Image Upload Handling
    $projectImage = $_FILES['project_image']['name'];
    $tmpProjectImage = $_FILES['project_image']['tmp_name'];
    $uploadDirectory = "images/"; // Directory to store uploaded images

    // Move uploaded file to desired location
    if(move_uploaded_file($tmpProjectImage, $uploadDirectory . $projectImage)) {
        // Insert data into second_table
        $query = mysqli_query($connect, "INSERT INTO second_table (name, description, frontend, backend, database_field, programming, categories, project_image) VALUES ('$name', '$description', '$frontend', '$backend', '$database', '$programming', '$categories', '$projectImage')");
        
        if($query) {
            echo "<script>alert('Data inserted successfully.')</script>";
        } else {
            echo "<script>alert('Failed to insert data: " . mysqli_error($connect) . "')</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.')</script>";
    }
}
?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
