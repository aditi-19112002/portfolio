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
            <div class="bg-white text-black shadow-md p-4 mb-8">
                <div class="mt-4">
                    <a href="#" class="block px-4 py-2 bg-blue-500 text-white rounded mb-2">Insert detail</a>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="block text-black">Name</label>
                            <input type="text" id="name" name="name" class="form-input w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div class="mb-3">
                            <label for="discription" class="block text-black">Description</label>
                            <textarea rows="4" name="discription" id="discription" class="form-textarea w-full px-3 py-2 border rounded-lg" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="categories" class="block text-black">Categories</label>
                            <select name="categories" id="categories" class="form-select w-full px-3 py-2 border rounded-lg" required>
                                <option value="">Select category here</option>
                                <?php
                                $query = mysqli_query($connect, "SELECT * FROM category");
                                while ($row = mysqli_fetch_array($query)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cover_image" class="block text-black">Cover Image</label>
                            <input type="file" id="cover_image" name="cover_image" class="form-input" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" value="Insert detail">
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['create'])) {
                        $name = mysqli_real_escape_string($connect, $_POST['name']);
                        $discription = mysqli_real_escape_string($connect, $_POST['discription']);
                        $categories = mysqli_real_escape_string($connect, $_POST['categories']);
                        $cover_image = $_FILES['cover_image']['name'];
                        $tmp_cover_image = $_FILES['cover_image']['tmp_name'];
                        $target_dir = "images/";

                        if (move_uploaded_file($tmp_cover_image, $target_dir . $cover_image)) {
                            $query = "INSERT INTO fifth_table (name, discription, categories, cover_image) VALUES ('$name', '$discription', '$categories', '$cover_image')";
                            if (mysqli_query($connect, $query)) {
                                echo "<script>alert('Data inserted successfully.');</script>";
                            } else {
                                echo "<script>alert('Failed to insert data: " . mysqli_error($connect) . "');</script>";
                            }
                        } else {
                            echo "<script>alert('Failed to upload image.');</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
