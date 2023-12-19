<?php
require_once 'src/Calculator.php';

use Calculator\Calculator;

$result = '';
$error = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $calculator = new Calculator();
    $num1 = $_POST['num1'] ?? 0;
    $num2 = $_POST['num2'] ?? 0;
    $operation = $_POST['operation'] ?? '';

    try {
        switch ($operation) {
            case 'add':
                $result = $calculator->add($num1, $num2);
                break;
            case 'subtract':
                $result = $calculator->subtract($num1, $num2);
                break;
            case 'multiply':
                $result = $calculator->multiply($num1, $num2);
                break;
            case 'divide':
                $result = $calculator->divide($num1, $num2);
                break;
        }
    } catch (\Exception $e) {
        $error = $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Simple Calculator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Calculator</h1>
        <form action="" method="post" class="mt-4">
            <div class="form-group">
                <label for="num1">Number 1:</label>
                <input type="number" class="form-control" id="num1" name="num1" required>
            </div>
            <div class="form-group">
                <label for="num2">Number 2:</label>
                <input type="number" class="form-control" id="num2" name="num2" required>
            </div>
            <div class="form-group">
                <label for="operation">Operation:</label>
                <select class="form-control" id="operation" name="operation">
                    <option value="add">Add</option>
                    <option value="subtract">Subtract</option>
                    <option value="multiply">Multiply</option>
                    <option value="divide">Divide</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        <?php if ($result !== '') : ?>
            <div class="alert alert-success mt-4">Result: <?php echo $result; ?></div>
        <?php endif; ?>

        <?php if ($error) : ?>
            <div class="alert alert-danger mt-4"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>