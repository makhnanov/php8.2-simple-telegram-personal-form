<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Template</title>
    <style>
        .label-text {
            min-width: 77px;
            display: inline-block;
        }
    </style>
</head>
<body>
<form action="/src/server.php" method="POST">
    <div class="input-box">
        <label>
            <span class="label-text">
                ФИО:
            </span>
            <input type="text" name="user_name" placeholder="ФИО" required>
        </label>
    </div>
    <div class="input-box">
        <label>
            <span class="label-text">
                Почта:
            </span>
            <input type="email" name="user_email" placeholder="Email" required>
        </label>
    </div>
    <div class="input-box">
        <label>
            <span class="label-text">
                Телефон:
            </span>
            <input type="text" name="user_phone" placeholder="Телефон" required>
        </label>
    </div>
    <div class="button">
        <input class="button" type="submit" value="Отправить">
    </div>
</form>
</body>
</html>
