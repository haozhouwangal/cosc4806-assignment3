<?php require_once '../templates/headerPublic.php' ?>

<div class="container">
  <h2>Login</h2>
  <form method="POST" action="/login/submit">
    <label>Username:</label><input type="text" name="username" required><br>
    <label>Password:</label><input type="password" name="password" required><br>
    <input type="submit" value="Login">
  </form>

  <h2>Create Account</h2>
  <form method="POST" action="/login/create">
    <label>Username:</label><input type="text" name="username" required><br>
    <label>Password:</label><input type="password" name="password" required><br>
    <input type="submit" value="Register">
  </form>
</div>

<?php require_once '../templates/footer.php' ?>
