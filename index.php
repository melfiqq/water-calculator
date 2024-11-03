<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Glasses Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        .glass {
            width: 50px;
            height: 150px;
            display: inline-block;
            margin: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Water Glasses Calculator</h1>
        <form action="process.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" min="40" max="150" required>
            
            <label for="glasses">Glasses of Water per Day:</label>
            <input type="number" id="glasses" name="glasses" min="0" max="20" required>
            
            <button type="submit">Calculate</button>
        </form>
    </div>
</body>
</html>