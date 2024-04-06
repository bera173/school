<head>
<link rel="stylesheet" href="./styles/indexlogin.css">    
</head>
<form class="login" method="POST" action="login_process.php"> <!-- Forma šalje podatke na login_process.php -->
  <input type="text" name="username" placeholder="Username"> <!-- Dodajemo atribut name kako bismo mogli dohvatiti podatak -->
  <input type="password" name="password" placeholder="Password"> <!-- Dodajemo atribut name kako bismo mogli dohvatiti podatak -->
  <button type="submit">Login</button> <!-- Dodajemo type="submit" kako bismo omogućili slanje forme -->
</form>
