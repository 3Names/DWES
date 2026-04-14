<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MVMood - Sign Up</title>
</head>
<body>
    <header>
        <div class="header-content">
            <img id="languaje-icon" src="tierra.png" alt="Mode icon" width="32" height="32">
            <img id="mode-icon" src="modo-oscuro.png" alt="Mode icon" width="32" height="32">
        </div>
    </header>

    <div class="div_container">

        <section class="left_section">
            <!--<img class="logoSignUp" src="imgLogo.png"/>-->
            <div style="width: 250px; height: 300px; background-color: azure; text-align: center;">Terms & Conditions</div><br/><br/>

            <form action="" method="POST">
                <input type="checkbox" name="signUp"/>
                <input type="submit" name="signUp" value="Accept" class="signUp_button"/><br/><br/>
            </form>
        </section>

        <section class="right_section">

            <img class="logoSignUp" src="imgLogo.png"/>

            <form action="" method="POST">
                <input type="text" name="username" placeholder="username" class="imputs"/><br/>
                <input type="text" name="email" placeholder="email" class="imputs"/><br/>
                <input type="password" name="password" placeholder="password" class="imputs"/><br/>
                <input type="password" name="repeat-password" placeholder="repeat password" class="imputs"/><br/>
                <input type="password" name="date-of-birth" placeholder="date of birth" class="imputs"/><br/>
                <input type="submit" name="signUp" value="sign up" class="signUp_button"/><br/><br/>
            </form>

        </section>

    </div>

    <footer>
        <p>MVMood 2026</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>