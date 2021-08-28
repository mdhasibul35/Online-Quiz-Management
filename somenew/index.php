<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="./styles.css">
</head>

<body>
  <section>
    <div class="container">

      <div class="user signinbox">
        <div class="imgBx">
          <img src="./signin.jpeg" alt="signin.jpg">
        </div>
        <div class="formBx">
          <form>
            <h1>Sign in</h1>
            <input type="text" placeholder="Username">
            <input type="password" placeholder="Password">
            <input type="submit" value="Login">
            <p class="signup">register here Stupid <a href="#" onclick="toggleForm();">register</a> </p>
          </form>
        </div>
      </div>


      <div class="user signupBx">
        <div class="imgBx">
          <img src="./signup.jpg" alt="signup.jpg">
        </div>
        <div class="formBx">
          <form>
            <h1>Create an account</h1>
            <input type="text" placeholder="Username">
            <input type="text" placeholder="Email address">
            <input type="password" placeholder="Create Password">
            <input type="password" placeholder="Confirm Password">
            <input type="submit" value="Signup">
            <p class="signup">Already have an account? <a href="#" onclick="toggleForm();">Sign in.</a> </p>
          </form>
        </div>
      </div>


    </div>
  </section>

  <script>
    function toggleForm() {
      container = document.querySelector('.container');
      section = document.querySelector('section');
      container.classList.toggle('active');
      section.classList.toggle('active');
    }
  </script>

</body>

</html>
