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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-start p-5">
    <div class="flex-1 mt-2 max-w-lg pr-5">
        <div class="p-5 bg-white border border-gray-300 rounded-lg shadow-lg">
            <table class="w-full border border-blue-500 border-collapse">
                <thead>
                    <tr>
                        <th class="p-2">Frontend</th>
                        <th class="p-2">Backend</th>
                        <th class="p-2">Database</th>
                        <th class="p-2">Programming</th>
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
                            <td class="border border-blue-500 p-2"><?php echo $frontend; ?></td>
                            <td class="border border-blue-500 p-2"><?php echo $backend; ?></td>
                            <td class="border border-blue-500 p-2"><?php echo $database; ?></td>
                            <td class="border border-blue-500 p-2"><?php echo $programming; ?></td>
                        </tr>
                   <?php
                      }
                   ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex-1 max-w-lg pt-5">
        <img src="images/<?php echo $image; ?>" alt="" class="max-w-4/5 sway-custom mx-auto" />
    </div>
</div>

<style>
    @media (max-width: 767px) {
        .flex {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .flex-1 {
            max-width: 100%;
        }
    }
</style>

</body>
</html>
