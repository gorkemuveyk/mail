<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Soyad Gönder</title>
</head>
<body>
    <h2>Ad Soyad Gönder</h2>
    <form action="send_email.php" method="post">
        <label for="name">Ad:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="surname">Soyad:</label><br>
        <input type="text" id="surname" name="surname" required><br><br>

        <input type="submit" value="Gönder">
    </form>
</body>
</html>
