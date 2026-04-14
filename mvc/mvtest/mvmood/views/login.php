<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>MVMood - Home</title>
</head>
<body class="light-mode">
    <header>
        <div class="header-content">
            <img id="languaje-icon" src="tierra.png" alt="Mode icon" width="32" height="32">
            <img id="mode-icon" src="modo-oscuro.png" alt="Mode icon" width="32" height="32">
        </div>
    </header>

    <div class="div_container">

        <section class="left_section">
            <img src="imgLogo.png"/>
        </section>

        <section class="right_section">

            <form action="index.php?controller=Auth&action=loginProcess" method="POST">
                <input type="text" name="email" placeholder="email" class="imputs"/><br/>
                <input type="password" name="password" placeholder="password" class="imputs"/><br/><br/>
                <input type="submit" name="logIn" value="log in" class="logIn_button"/><br/>
                <input type="submit" name="signUp" value="sign up" class="signUp_button"/><br/><br/>
            </form>

            <a href="views/forgotPassword.php">forgot password?</a><br/>

        </section>

    </div>

    <footer>
        <p>MVMood 2026</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
