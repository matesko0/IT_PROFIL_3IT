<?php
$jsonData = file_get_contents('profile.json');
$data = json_decode($jsonData, true);
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>IT Profil</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($data['name']); ?></h1>
    <h2>Dovednosti</h2>
    <ul>
        <?php foreach ($data['skills'] as $skill): ?>
            <li><?php echo htmlspecialchars($skill); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Zájmy</h2>
    <ul>
        <?php foreach ($data['interests'] as $interest): ?>
            <li><?php echo htmlspecialchars($interest); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
