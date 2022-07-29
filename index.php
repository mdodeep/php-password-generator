<?php
if (isset($_POST['generate'])) {
    $string = $_POST['string'];
    $num = $_POST['number'];
    $len = $_POST['length'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Password Generator</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col col-lg col-md">
                <div class="card">
                    <h5 class="card-header">Password Generator</h5>
                    <div class="card-body">
                        <form method="post" action="">
                            <label class="form-label">Input String</label>
                            <input type="text" class="form-control" name="string" value="<?php if (!empty($string)) {
                                                                                                echo $string;
                                                                                            } else {
                                                                                                echo "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                                                                                            } ?>">
                            <hr>
                            <div class="row">
                                <div class="col col-lg col-md">
                                    <label class="form-label">Number of String</label>
                                    <input type="number" min="1" max="99" class="form-control" name="number" value="<?php if (!empty($num)) {
                                                                                                                        echo $num;
                                                                                                                    } else {
                                                                                                                        echo 1;
                                                                                                                    } ?>">
                                </div>
                                <div class="col col-lg col-md">
                                    <label class="form-label">Length of String</label>
                                    <input type="number" min="1" max="99" class="form-control" name="length" value="<?php if (!empty($len)) {
                                                                                                                        echo $len;
                                                                                                                    } else {
                                                                                                                        echo 16;
                                                                                                                    } ?>">
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <a href=""><button class="btn btn-danger px-4">Reset</button></a>
                                <button type="submit" class="btn btn-primary px-4" name="generate">Generate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (!isset($_POST['generate'])) {
            "";
        } else {
        ?>
            <div class="row mt-4">
                <div class="col col-lg col-md">
                    <div class="card">
                        <h5 class="card-header">Generated Password</h5>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                    <?php for ($x = 1; $x <= $num; $x++) { ?>
                                        <?php $rand = substr(str_shuffle($string), $num, $len); ?>
                                        <tr>
                                            <th scope="row"><?php echo $x; ?></th>
                                            <td><input type="text" readonly value="<?php echo $rand; ?>" class="form-control" id="glink<?php echo $x; ?>"></td>
                                            <td class="text-end"><a class="btn btn-primary px-4" onclick="copyclip<?php echo $x; ?>()">Copy</a></td>
                                        </tr>
                                        <script type="text/javascript">
                                            function copyclip<?php echo $x; ?>() {
                                                document.getElementById("glink<?php echo $x; ?>").select();
                                                document.execCommand("copy");
                                            }
                                        </script>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>