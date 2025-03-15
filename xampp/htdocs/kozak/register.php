<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka Uczelni WSB</title>

<style>
    @import URL("styl.css");
</style>
</head>
<body>
    

<div class="banner">
    <h1>WSB MERITO BIBLIOTEKA</h1>
</div>
  <div id="form">
  <form method="POST" action="reg_pdo.php" onsubmit="return validate()">

    <h2>Login</h2>
      <input type="text" name="username" id="username" placeholder="PODAJ SWÓJ LOGIN">

      <h2>Adres email</h2>
      <input type="email" name="email" id="email" placeholder="PODAJ SWÓJ EMAIL">

      <h2>Hasło</h2>
      <input type="password" name="password" id="password" placeholder="PODAJ SWOJE HASŁO">

      <h2>Powtórz hasło</h2>
      <input type="password" name="password_confirm" id="password_confirm" placeholder="PODAJ PONOWNIE SWOJE HASŁO">
        
      <br><br>
      <input type="submit" id="log_button" value="Login">
      <?php if (isset($_GET['error'])): ?>
            <p class="error_message"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

      <h4>Masz już konto?</h4><a id ="register_link" href="login.php">Zaloguj się</a>
      <p id="error-message" style="color: red; font-weight: bold; display: <?php echo isset($_GET['error']) ? 'block' : 'none'; ?>;">
    <?php if (isset($_GET['error'])) echo htmlspecialchars($_GET['error']); ?>
</p>

</form>
  
<script>
      function validate(){
      var pass = document.getElementById("password").value;
        var conf = document.getElementById("password_confirm").value;
      var error = document.getElementById("error-message");
        if(pass == conf){
          error.style.display = "none";
          return true;
        }else{
          error.style.display = "block";
          error.textContent= "Hasła muszą się zgadzać";
          return false;
        }
      }
    </script>
</div>
</body>
</html>
