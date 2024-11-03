<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $weight = (int)$_POST['weight'];
    $glassesDrank = (int)$_POST['glasses'];

    /* here im calculating daily water needs in litres and then in glasses */
    $dailyWaterML = $weight * 30; // 30 ml per kg
    $dailyWaterGlasses = round($dailyWaterML / 250); // 250 ml per glass

    /* here is block where all the info about users stored in user_data.txt */
    $dataToStore = "$name | $weight kg | $glassesDrank glasses\n";
    file_put_contents('user_data.txt', $dataToStore, FILE_APPEND);

    echo "<h1>Water Needs Calculation</h1>";
    echo "<p>Name: $name</p>";
    echo "<p>Weight: $weight kg</p>";
    echo "<p>Glasses Drank: $glassesDrank</p>";
    echo "<p>Daily Water Requirement: $dailyWaterML ml ($dailyWaterGlasses glasses)</p>";

    $glassesToShow = [];
    
    /* here is how to calculate how many glasses and what glasses are going to be displayed */
    if ($glassesDrank < $dailyWaterGlasses) {
        /* if not enough glasses: */
        for ($i = 0; $i < $glassesDrank; $i++) {
            $glassesToShow[] = "<img src='green-glass-02.png' class='glass' alt='Green Glass'>";
        }
        for ($i = 0; $i < $dailyWaterGlasses - $glassesDrank; $i++) {
            $glassesToShow[] = "<img src='empty-glass-02.jpg' class='glass empty' alt='Empty Glass' style='width: 60px; height: 100px;'>";
        }
    } else {
        /* ша утўгпр ўк еўў ьфтн пдфыыуы */
        for ($i = 0; $i < $dailyWaterGlasses; $i++) {
            $glassesToShow[] = "<img src='green-glass-02.png' class='glass' alt='Green Glass'>";
        }
        if ($glassesDrank > $dailyWaterGlasses) {
            for ($i = 0; $i < $glassesDrank - $dailyWaterGlasses; $i++) {
                $glassesToShow[] = "<img src='red-glass-02.png' class='glass' alt='Red Glass'>";
            }
        }
    }

    echo "<div>" . implode("", $glassesToShow) . "</div>";
    
    /* also as in previous homework ive made the button which sends user back to the maun */
    echo "<form action='index.php' method='get'>";
    echo "<button type='submit'>Another User</button>";
    echo "</form>";

} else {
    echo "No data submitted.";
}
?>