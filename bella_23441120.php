<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .calculator {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        input[type="number"] {
            width: 120px;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        select {
            padding: 10px;
            font-size: 16px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

    <div class="calculator-container">
        <h2>Kalkulator Sederhana</h2>
        <div class="calculator">
            <form method="post">
                <input type="number" name="num1" placeholder="Angka pertama" required>
                
                <select name="operator" required>
                    <option value="add">+</option>
                    <option value="sub">-</option>
                    <option value="mul">*</option>
                    <option value="div">/</option>
                </select>

                <input type="number" name="num2" placeholder="Angka kedua" required>
                
                <button type="submit" name="submit" value="submit">Hitung</button>
            </form>
            
        </div>
        <div class="result">
            <?php
            if (isset($_POST['submit'])) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $operator = $_POST['operator'];
                $result = '';

                switch ($operator) {
                    case 'add':
                        $result = $num1 + $num2;
                        break;
                    case 'sub':
                        $result = $num1 - $num2;
                        break;
                    case 'mul':
                        $result = $num1 * $num2;
                        break;
                    case 'div':
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                        } else {
                            $result = 'Tidak bisa dibagi dengan 0';
                        }
                        break;
                    default:
                        $result = 'Operator tidak valid';
                        break;
                }

                if (is_numeric($result)) {
                    echo "<h3>Hasil: $result</h3>";
                } else {
                    echo "<h3 class='error'>$result</h3>";
                }
            }
            ?>
        </div>
        
    </div>

</body>
</html>