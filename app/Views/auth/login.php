
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payroll App - Login</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container" style="max-width: 400px; margin-top: 50px">
      <h2 style="text-align: center; margin-bottom: 20px">Login</h2>
      <form action="/PMS/login" method="POST">
        <input type="text" placeholder="Username" name="username" required />
        <input
          type="password"
          placeholder="Password"
          name="password"
          required
        />
        <button type="submit">Login</button>
        <a
          href="#"
          style="
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #4f46e5;
          "
          >Forgot Password?</a
        >
      </form>
    </div>
  </body>
</html>
