<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="login3.css">

<script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin="anonymous"></script>

<title>login</title>

 </head>

<body>



<header class="header">

<nav class="nav">

<a href="#"> Home </a>

</nav>

<div class="search">

<i class="fa-solid fa-magnifying-glass"></i>

<i class="fa-solid fa-user"></i>

</div>

</header>

<div class="background"></div>

<section class="home">

<div class="content">


<a href="#" class="images/anh1.jpg"> <i class="fa-solid fa-paper-plane"></i>SYSTEM</a>

<h2> Welcome!</h2>

<h3> To Our Website </h3>

<pre> Hai Phong University 
    dormitory management system </pre>

<div class="icon">

<i class="fa-brands fa-instagram"></i>

<i class="fa-brands fa-facebook"></i>

<i class="fa-brands fa-twitter"></i>

<i class="fa-brands fa-github"></i> </div>

</div>

<div class="login"> <h2> Login </h2>

<div class="input">

<input type="text" class="input1" placeholder="Email" required>

<i class="fa-solid fa-envelope"></i>

</div>

<div class="input">

<input type="password" class="input1" placeholder="Password" required>

<i class="fa-solid fa-lock"></i>

</div>

<div class="check">

<label> <input type="checkbox">Remember me </label> <a href="#"> Forgot Password?</a>

</div>

<div class="button">

    <button class="btn" onclick="redirectToDanhsach()"> Login </button>


<div class="sign-up">





</div>

</div>
<script>
function redirectToDanhsach() {
    console.log("Button clicked");
    var email = document.querySelector('.input1[type="text"]').value;
    var password = document.querySelector('.input1[type="password"]').value;

    if ((email === "tranducduy@gmail.com" && password === "1234567yh") || (email === "Tomanh@gmail.com" && password === "Tomanh1234")) {
        window.location.href = "home.php";
    } else {
        alert('Mật khẩu hoặc tài khoản không đúng!');
    }
}
</script>

</body>

</html>
