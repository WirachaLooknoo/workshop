<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body>
    <table class="table table-dark table-hover table-bordered" border="1" align="center">
        <thead>
            <tr>
                <td style="font-weight: bold;">Name</td>
                <td style="font-weight: bold;">LastName</td>
                <td style="font-weight: bold;">Weight</td>
                <td style="font-weight: bold;">Height</td>
                <td style="font-weight: bold;">BMI</td>
                <td style="font-weight: bold;">Result</td>
            </tr>
        </thead>
        <?php
        @$data = file_get_contents('http://localhost:3001/user');
        $user_data = json_decode($data);

        $index = 0;

        if (!empty($user_data)) {
            foreach ($user_data as $user) {
                $weight = $user->weight;
                $height = $user->height;
                $total = $weight / (($height / 100) * ($height / 100));
                $total = number_format($total, 2);

                $result = "";
                if ($total < 18.5) {
                    $result = "UnderWeight";
                } elseif ($total <= 22.9) {
                    $result = "Normal weight";
                } elseif ($total <= 29.9) {
                    $result = "Overweight ";
                } else {
                    $result = "Obesity  ";
                }



        ?>
                <tr>
                    <td><?php echo $user->first_name; ?></td>
                    <td><?php echo $user->last_name; ?></td>
                    <td><?php echo $user->weight; ?></td>
                    <td><?php echo $user->height; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $result; ?></td>

                </tr>
        <?php
                $index++;
            }
        }
        ?>

    </table>
</body>

</html>