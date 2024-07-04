<?php include_once "connect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white">
<style>
        /* Define styles for the mobile menu */
        .mobile-menu {
            display: none;
        }

        @media (max-width: 767px) {
            .mobile-menu {
                display: block;
            }

            .desktop-menu {
                display: none;
            }

            .mobile-menu-items {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                background-color: #111827;
                width: 100%;
                padding: 10px;
                z-index: 1;
            }

            .mobile-menu-items a {
                color: #ffffff;
                padding: 10px;
                text-decoration: none;
            }

            .mobile-menu-items a:hover {
                background-color: #1f2937;
            }
        }
    </style>

<body>
    <div class="flex items-center justify-between bg-gray-950 text-black py-3 px-4 fixed top-0 z-0 w-full">
        <div class="flex items-center">
            <div class="w-8 animate__animated animate__bounce">
                <img src="ic.png" class="w-full">
            </div>
        </div>
        <div class="flex items-center space-x-4 md:space-x-6 desktop-menu">
            <a href="index.php" class="text-blue-500 hover:text-white">Home</a>
            <?php
            $query = mysqli_query($connect, "select * from category");
            while ($row = mysqli_fetch_array($query)) :
            ?>
                <a href="index.php?cat_id=<?= $row['cat_id']; ?>" class="text-white hover:text-blue-500">
                    <?= $row['cat_title']; ?>
                </a>
            <?php endwhile; ?>

            <button>
                <a href="resume.php" class="text-blue-500 font-bold bg-transparent border border-white px-4 py-2 pt-2 pb-2 rounded hover:bg-blue-800">Resume</a>
            </button>
        </div>
        <!-- Mobile Menu Button -->
        <div class="mobile-menu">
            <button onclick="toggleMobileMenu()">
            <i class="bi bi-list text-white text-2xl"></i>
            </button>
            <div class="mobile-menu-items" id="mobileMenuItems">
                <a href="index.php" class="text-blue-500 hover:text-white">Home</a>
                <?php
                $query = mysqli_query($connect, "select * from category");
                while ($row = mysqli_fetch_array($query)) :
                ?>
                    <a href="index.php?cat_id=<?= $row['cat_id']; ?>" class="text-white hover:text-blue-500">
                        <?= $row['cat_title']; ?>
                    </a>
                <?php endwhile; ?>
                <a href="resume.php" class="text-blue-500 font-bold bg-transparent border border-white px-4 py-2 pt-2 pb-2 rounded hover:bg-blue-800">Resume</a>
            </div>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            var mobileMenu = document.getElementById("mobileMenuItems");
            mobileMenu.style.display === "none" ? mobileMenu.style.display = "flex" : mobileMenu.style.display = "none";
        }
    </script>




    <?php
include_once "connect.php";

// Check if cat_id is set in the URL
if(isset($_GET['cat_id'])){
    // If cat_id is set, fetch projects based on the category
    $cat_id = $_GET['cat_id'];
    $query = mysqli_query($connect, "SELECT * FROM third_table JOIN category ON third_table.categories = category.cat_id WHERE cat_id='$cat_id'");
} else {
    // If cat_id is not set, fetch all projects
    $query = mysqli_query($connect, "SELECT * FROM third_table JOIN category ON third_table.categories = category.cat_id");
}

// Check if the query executed successfully
if (!$query) {
    // If query failed, display the error message and terminate
    die("Query failed: " . mysqli_error($connect));
}

// Fetch and display project details
while ($data = mysqli_fetch_array($query)):
    // Your HTML code to display project details goes here
    ?>


<div class="container mx-auto">
    <div class="flex flex-col md:flex-row items-center justify-between px-4 py-10 md:py-20">
      <div class="md:w-1/2 text-center md:text-left mb-4 md:mb-0 mt-2">
          <h1 class="text-2xl md:text-4xl font-bold">Hi, I'm <span class=" text-blue-500"><?=$data['name'];?></span></h1>
          <p class="text-lg md:text-xl mb-6"><?=$data['description'];?> <br><a href="about.php" class="text-blue-500">Read More</a></p>
          <div class="flex mb-5">
            <a href="https://github.com/aditi-19112002" class="circle-link text-white bg-blue-600"><i class="bi bi-github"></i></a>
            <a href="https://www.linkedin.com/in/aditi-keshri-a27050283?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="circle-link text-white bg-blue-600"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="circle-link text-white bg-blue-600"><i class="bi bi-envelope-fill"></i></a>
            <a href="https://www.instagram.com/aditikeshri__?igshid=YzAwZjE1ZTI0Zg==" class="circle-link text-white bg-blue-600"><i class="bi bi-instagram"></i></a>
          
          </div>
          <button>
              <a href="https://github.com/aditi-19112002" class="text-blue-500 bg-transparent border border-white px-4 py-2 pt-2 pb-2 rounded hover:bg-blue-800 mt-6">Check out my project!</a>
          </button>
      </div>
      <div class="md:w-2/2">
        <img src="<?="images/".$data['cover_image'];?>" alt="Your Image" class="w-full md:max-w-md mx-auto md:mx-0 mb-8 sway-custom mt-10" />
    </div>
  </div>
  <?php endwhile ?>

 </div> 
 
  
 
    <?php
include_once "connect.php";

// Check if cat_id is set in the URL
if(isset($_GET['cat_id'])){
    // If cat_id is set, fetch projects based on the category
    $cat_id = $_GET['cat_id'];
    $query = mysqli_query($connect, "SELECT * FROM my JOIN category ON my.categories = category.cat_id WHERE cat_id='$cat_id'");
} else {
    // If cat_id is not set, fetch all projects
    $query = mysqli_query($connect, "SELECT * FROM my JOIN category ON my.categories = category.cat_id");
}

// Check if the query executed successfully
if (!$query) {
    // If query failed, display the error message and terminate
    die("Query failed: " . mysqli_error($connect));
}

// Fetch and display project details
while ($data = mysqli_fetch_array($query)):
    // Your HTML code to display project details goes here
    ?>
<div class="container mx-auto">
    <div class="flex flex-col md:flex-row items-center justify-between px-4 py-10 md:py-20">
        <div class="md:w-1/2">
            <div class="image-container">
                <img src="<?="images/".$data['cover_image'];?>" alt="Image" class="w-full md:max-w-md mx-auto md:mx-0" />
            </div>
        </div>
        <div class="md:w-1/2 text-center md:text-left mb-4 md:mb-0">
            <h2 class="text-xl md:text-2xl font-bold mb-10"> <span class="text-blue-500"><?= $data['name']; ?></span><hr></h2>
            <p class="text-base md:text-lg">Hello there! I'm <span class="text-blue-500">Aditi Keshri</span>, a BCA graduate with a passion for web development and design. Over the years, I've honed my skills in creating dynamic and visually appealing websites and web applications.. My educational background has equipped me with a solid foundation, and I am eager to apply my knowledge and contribute effectively to this role.</p>
        </div>
</div>
<?php endwhile ?>
</div>
    </div>

    <?php
include_once "connect.php";

// Check if cat_id is set in the URL
if(isset($_GET['cat_id'])){
    // If cat_id is set, fetch projects based on the category
    $cat_id = $_GET['cat_id'];
    $query = mysqli_query($connect, "SELECT * FROM extra JOIN category ON extra.categories = category.cat_id WHERE cat_id='$cat_id'");
} else {
    // If cat_id is not set, fetch all projects
    $query = mysqli_query($connect, "SELECT * FROM extra JOIN category ON extra.categories = category.cat_id");
}

// Check if the query executed successfully
if (!$query) {
    // If query failed, display the error message and terminate
    die("Query failed: " . mysqli_error($connect));
}

// Fetch and display project details
while ($data = mysqli_fetch_array($query)):
    // Your HTML code to display project details goes here
    ?>
    <div  class="flex flex-col items-center justify-center"> 
    <h2 class="text-2xl font-bold mt-12">
        <span class="text-blue-500"><?=$data['name'];?></span>
    </h2>
    <p class="text-center text-gray-400 mt-2 "><?=$data['discription'];?></p>
  <?php endwhile;?>

</div>

    <?php
include_once "connect.php";

// Check if cat_id is set in the URL
if(isset($_GET['cat_id'])){
    // If cat_id is set, fetch projects based on the category
    $cat_id = $_GET['cat_id'];
    $query = mysqli_query($connect, "SELECT * FROM second_table JOIN category ON second_table.categories = category.cat_id WHERE cat_id='$cat_id'");
} else {
    // If cat_id is not set, fetch all projects
    $query = mysqli_query($connect, "SELECT * FROM second_table JOIN category ON second_table.categories = category.cat_id");
}

// Check if the query executed successfully
if (!$query) {
    // If query failed, display the error message and terminate
    die("Query failed: " . mysqli_error($connect));
}
?>


<div style="display: flex; justify-content: center; align-items: flex-start; padding: 20px;">
    <div style="flex: 1 1 auto;margin-top:10px; max-width: 600px; padding-right: 20px;">
        <table style="width: 100%; border: 1px solid #3490dc; border-collapse: collapse;">
        <thead>
      
            <tr>
        <th style="border: 1px solid #3490dc; padding: 8px;">Frontend</th>
        <th style="border: 1px solid #3490dc; padding: 8px;">Backend</th>
        <th style="border: 1px solid #3490dc; padding: 8px;">Database</th>
        <th style="border: 1px solid #3490dc; padding: 8px;">Programming</th>
</tr>

            </thead>
           


            <tbody>
                <?php
                  while ($row = mysqli_fetch_array($query)) {
                    $frontend = $row['frontend'];
                    $backend = $row['backend'];
                    $database = $row['database_field'];
                    $programming = $row['programming'];
                    $image = $row['project_image'];
                ?>
                    <tr>
                        <td style="border: 1px solid #3490dc; padding: 8px;"><?php echo $frontend; ?></td>
                        <td style="border: 1px solid #3490dc; padding: 8px;"><?php echo $backend; ?></td>
                        <td style="border: 1px solid #3490dc; padding: 8px;"><?php echo $database; ?></td>
                        <td style="border: 1px solid #3490dc; padding: 8px;"><?php echo $programming; ?></td>
                    </tr>
               <?php
                  }
               ?>
            </tbody>
        </table>
    </div>
    <div style="flex: 1 1 auto; max-width: 600px; padding-top: 20px;">
    <img src="images/<?php echo $image; ?>" alt="" style="max-width: 80%;" class="sway-custom" />
</div>
</div> 



<style>
    @media (max-width: 767px) {
        div[style^="display: flex;"] {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        div[style^="flex: 1 1 auto;"] {
            max-width: 100%;
        }
    }
</style>







<?php
include_once "connect.php";

// Check if cat_id is set in the URL
if(isset($_GET['cat_id'])){
    // If cat_id is set, fetch projects based on the category
    $cat_id = $_GET['cat_id'];
    $query = mysqli_query($connect, "SELECT * FROM fifth_table JOIN category ON fifth_table.categories = category.cat_id WHERE cat_id='$cat_id'");
} else {
    // If cat_id is not set, fetch all projects
    $query = mysqli_query($connect, "SELECT * FROM fifth_table JOIN category ON fifth_table.categories = category.cat_id");
}

// Check if the query executed successfully
if (!$query) {
    // If query failed, display the error message and terminate
    die("Query failed: " . mysqli_error($connect));
}

// Fetch and display project details
while ($data = mysqli_fetch_array($query)):
    // Your HTML code to display project details goes here
    ?>
    <div class="flex flex-col items-center justify-center"id="section-projects" >
    <h2 class="text-2xl font-bold ">
        <span class="text-blue-500"><?=$data['cat_title'];?><hr></span>
    </h2>
</div> 

<div class="container mx-auto">
    <div class="flex flex-col md:flex-row items-center justify-between px-4 py-10 md:py-20 gap-10">
        <div class="md:w-1/2">
            <div class="rounded-lg overflow-hidden">
                <div class="flex-1 flex justify-center items-center bg-gray-200 border-4 border-blue-500 border-opacity-50 p-4 rounded-lg">
                    <img class="object-cover h-full w-auto rounded" src="<?php echo "images/" . $data['cover_image']; ?>" alt="Image">
                </div>
            </div>
        </div>
        <div class="md:w-1/2 text-center md:text-left mb-4 md:mb-0">
            <div class="uppercase tracking-wide text-2xl text-white font-semibold"><?=$data['name'];?><span class="text-blue-500"> | Web Application</span> <a href="https://github.com/aditi-19112002"> <i class="bi bi-box-arrow-up-right"></i></a></div>
            <p class="mt-2 text-gray-200"><?php echo $data['discription']; ?></p>        
            <div class="mt-4">
                <div class="inline-block bg-indigo-300 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">HTML</div>
                <div class="inline-block bg-indigo-300 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">CSS</div>
                <div class="inline-block bg-indigo-300 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Tailwind CSS</div>
                <div class="inline-block bg-indigo-300 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">PHP</div>
                <div class="inline-block bg-indigo-300 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">MySQL</div>
            </div>
        </div>
    </div>
</div> 
<?php endwhile; ?>
  


<?php
include_once "connect.php";
if(isset($_GET['cat_id'])){
    // If cat_id is set, fetch projects based on the category
    $cat_id = $_GET['cat_id'];
    $query = mysqli_query($connect, "SELECT * FROM forth_table JOIN category ON forth_table.categories = category.cat_id WHERE cat_id='$cat_id'");
} else {
    // If cat_id is not set, fetch all projects
    $query = mysqli_query($connect, "SELECT * FROM forth_table JOIN category ON forth_table.categories = category.cat_id");
}

// Check if the query executed successfully
if (!$query) {
    // If query failed, display the error message and terminate
    die("Query failed: " . mysqli_error($connect));
}

$rows = array(); // Array to store fetched rows

// Fetch all rows and store them in the $rows array
while ($row = mysqli_fetch_array($query)) {
    $rows[] = $row;
}
?>
<div class="flex flex-col items-center justify-center">
    <h2 class="text-2xl font-bold mt-12">
        <span class="text-blue-500">Education<hr></span>
    </h2>
</div> 

<div style="display: flex; justify-content: center; align-items: flex-start; padding: 20px; flex-wrap: wrap;">
    <div style="flex: 1 1 auto; max-width: 600px; padding-top: 20px;">
        <?php foreach ($rows as $row) { ?>
            <img src="<?="images/".$row['project_image'];?>" alt="" style="max-width: 80%; height: auto; max-height: 350px; margin-bottom: 20px;" class="sway-custom" />
        <?php } ?>
    </div>
    <div style="flex: 1 1 auto; max-width: 600px; margin-top: 20px; padding-left: 20px;">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border: 1px solid #3490dc; border-collapse: collapse;">
                <thead>
                <tr>
                        <th style="border: 1px solid #3490dc; padding: 8px;">Class/Standard</th>
                        <th style="border: 1px solid #3490dc; padding: 8px;">School/University</th>
                        <th style="border: 1px solid #3490dc; padding: 8px;">Year</th>
                        <th style="border: 1px solid #3490dc; padding: 8px;">Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td style='border: 1px solid #3490dc; padding: 8px; color: #3490dc;'><?php echo $row['class']; ?></td>
                            <td style='border: 1px solid #3490dc; padding: 8px;'><?php echo $row['school']; ?></td>
                            <td style='border: 1px solid #3490dc; padding: 8px; color: #3490dc;'><?php echo $row['year']; ?></td>
                            <td style='border: 1px solid #3490dc; padding: 8px; color: #3490dc;'><?php echo $row['marks']; ?>%</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<style>
    @media (max-width: 767px) {
        div[style^="display: flex;"] {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        div[style^="flex: 1 1 auto;"] {
            max-width: 100%;
            padding-left: 0 !important;
        }
        img.sway-custom {
            max-width: 100% !important;
            max-height: none !important;
        }
        div[style="overflow-x: auto;"] {
            width: 100%;
        }
    }
</style>
<section id="contact" class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
            <div class="lg:col-span-1">
                <h2 class="text-3xl font-extrabold text-blue-500 sm:text-4xl">CONTACT ME</h2>
                <p class="mt-4 text-lg leading-6 text-white">We'd love to hear from you! Reach out to us using the form, or contact us directly:</p>
                <div class="mt-8">
                    <p class="mt-2 text-lg text-gray-500"><i class="bi bi-send-fill text-blue-500"></i> aditikeshri21@gmail.com</p>
                    <p class="mt-2 text-lg text-gray-500"><i class="bi bi-telephone-fill text-blue-500"></i> +1 9955147014</p>
                    <div class="mt-4 flex space-x-4">
                       <a href=""><i class="bi bi-facebook text-blue-500 text-2xl"></i></a>
                       <a href=""> <i class="bi bi-twitter text-blue-500 text-2xl"></i></a>
                       <a href="https://www.instagram.com/aditikeshri__?igshid=YzAwZjE1ZTI0Zg=="></a> <i class="bi bi-instagram text-blue-500 text-2xl"></i></a>
                        <a href="https://www.linkedin.com/in/aditi-keshri-a27050283?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="bi bi-linkedin text-blue-500 text-2xl"></i></a>
                    </div>
                    <div class="mt-8">
                    <button>
              <a href="commentpage.php" class="text-blue-500 bg-transparent border border-white px-4 py-2 pt-2 pb-2 rounded hover:bg-blue-800 mt-6">Check out message!</a>
          </button>
    </div>
                </div>
            </div>
            <div class="mt-12 lg:mt-0 lg:col-span-1">
                <form action="#" method="POST" class="bg-gray-900 p-4 rounded-lg shadow-lg space-y-3">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-blue-500">First name</label>
                        <div class="mt-1">
                            <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="py-1 px-3 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-black">
                        </div>
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-blue-500">Last name</label>
                        <div class="mt-1">
                            <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="py-1 px-3 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-black">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-blue-500">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" autocomplete="email" class="py-1 px-3 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-black">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-blue-500">Message</label>
                        <div class="mt-1">
                            <textarea id="message" name="message" rows="4" class="py-1 px-3 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-black"></textarea>
                        </div>
                    </div>
                    <div>
    <button class="submit w-full inline-flex items-center justify-center px-4 py-2 border border-white text-base font-medium rounded-md shadow-sm text-blue-600 bg-transparent hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="create">Submit</button>
</div>

                </form>
                <?php
                if(isset($_POST['create'])){
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];

                    // Make sure to sanitize your inputs to prevent SQL injection
                    $first_name = mysqli_real_escape_string($connect, $first_name);
                    $last_name = mysqli_real_escape_string($connect, $last_name);
                    $email = mysqli_real_escape_string($connect, $email);
                    $message = mysqli_real_escape_string($connect, $message);

                    // Corrected SQL query to use the variable values
                    $query = mysqli_query($connect,"INSERT INTO comment(first_name, last_name, email, message) VALUES ('$first_name', '$last_name', '$email', '$message')");
                    if($query){
                        echo "<script>alert('Message inserted successfully.');</script>";
                        echo "<script> window.open('index.php','_self')</script>";
                    } else {
                        echo "<script>alert('failed')</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<footer class="bg-gray-800 text-blue-500 py-4">
        <div class="container mx-auto text-center px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="mb-2 md:mb-0">&copy; 2024 Portfolio. All rights reserved.</p>
                <!-- <ul class="flex space-x-4">
                    <li><a href="#" class="text-white hover:text-gray-400">Privacy Policy</a></li>
                    <li><a href="#" class="text-white hover:text-gray-400">Terms of Service</a></li>
                    <li><a href="#" class="text-white hover:text-gray-400">Contact Us</a></li>
                </ul> -->
            </div>
        </div>
    </footer>
</body>
</html>
<style>
    @keyframes sway {
        0% {
            transform: translateX(-5px);
        }
        50% {
            transform: translateX(5px);
        }
        100% {
            transform: translateX(-5px);
        }
    }

    .sway-custom {
        animation: sway 2s ease-in-out infinite;
    }
    
    .circle-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px; 
    } 
  
    .circle-link:hover {
        background-color: gray; 
    }
    .image-container {
    width: 300px; 
    height: 300px;
    overflow: hidden;
    border-radius: 50%; 
    border: 10px solid transparent;
    background: linear-gradient(to bottom right, #0074d9 ,#001f3f); 
    
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
    border-radius: 50%; 
}


</style>







