<?php include_once "connect.php";?>

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
                            <label for="name" class="block text-black"> Name</label>
                            <input type="text" id="name" name="name"
                                class="form-input w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-3">
                            <label for="discription" class="block text-black">Description:</label>
                            <textarea rows="6" name="discription" id="discription"
                                class="form-textarea w-full px-3 py-2 border rounded-lg"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="categories" class="block text-black">Categories:</label>
                            <select name="categories" id="categories"
                                class="form-select w-full px-3 py-2 border rounded-lg">
                                <option value="">Select category here</option>
                                <?php
              $query=mysqli_query($connect,"select * from category");
              while($row = mysqli_fetch_array($query)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo"<option value='$cat_id'>$cat_title</option>"; 
              }
              ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cover_image" class="block text-black">Cover Image:</label>
                            <input type="file" id="cover_image" name="cover_image" class="form-input">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="create"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                                value="Insert detail">
                        </div>
                    </form>
                    <?php


            if(isset($_POST['create'])){
                $_name=$_POST['name'];
                $_discription=$_POST['discription'];
                $_categories=$_POST['categories'];
                $_cover_image=$_FILES['cover_image']['name']; 
              $_tmp_cover_image=$_FILES['cover_image']['tmp_name']; 

          move_uploaded_file($_tmp_cover_image,"images/$_cover_image");
          
          $query=mysqli_query($connect,"INSERT INTO my(name,discription,categories,cover_image)
          VALUE('$_name','$_discription','$_categories','$_cover_image')");
           if($query){
            echo"<script>window.open('index.php','_self')</script>";
          }
          else{
            echo "<script>alert('Failed: " . mysqli_error($connect) . "')</script>";


          }

            }
            ?>
                </div>
            </div>

            <div class="bg-white text-black shadow-md p-4 mb-8">
                <div class="mt-4">
                    <a href="#" class="block px-4 py-2 bg-blue-500 text-white rounded mb-2">Insert category detail</a>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="cat_title" class="block text-black font-semibold">Category name:</label>
                            <input type="text" id="cat_title" name="cat_title" placeholder="Enter category name"
                                class="form-input w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="create_category"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                                value="Insert category">
                        </div>
                        </form>
                        <?php
            if(isset($_POST['create_category'])){
             
                $cat_title = $_POST['cat_title'];

                $query = mysqli_query($connect, "INSERT INTO category(cat_title) VALUE('$cat_title')");
                if($query){
                    echo "<script>window.open('insert.php','_self')</script>";
                } else {
                    echo "<script>alert('Failed: " . mysqli_error($connect) . "')</script>";
                }
                
            }
            ?>
        </div>
            </div>
            </div>
    </div>
                    
        </body>
</html>