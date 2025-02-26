<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap');
    *{
        padding: 0;
        margin: 0;
        list-style: none;
        font-family: "Poppins", serif;
        box-sizing: border-box;
        overflow: hidden;
    }

    .container {
        display: flex;
        justify-content: center;
    }
    .header {
        display: flex;
        justify-content: left;
        flex-direction: column;
    }
    .wrapper {
        display: flex;
        justify-content: center;
        width: 100vw;
        height: 100vh;
        align-items: center;
    }

    h1 {
        font-size: 2.4rem;
        font-weight: 600;
        color: #000957;
    }

    li {
        background-color: #000957;
        border: 1px solid #000957;
        padding: .8em 4em;
        margin: 1em 8em 1em 0;
        text-align: center;
        border-radius: 3em;
        color: #fff;
        cursor: pointer;
   }

   li a {
    text-decoration: none;
    color: #fff;
    
   }

   li:hover {
    opacity: 80%;
    transition: ease .2s;
   }

   .wrapper img {
    width: 40em;
    margin-right: -15em;
   }
   
</style>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <h1>LOGGING IN AS</h1>
                <p>Choose role to login. If you have problem encountered, 
                <br> contact administrator. Thank you!</p> <br>
                <div class="role">
                <ul>
                    <li><a href="login.php">TEACHER</a></li>
                    <li><a href="stud-login.php">STUDENT</a></li>
                </ul>
            </div>
            </div>
            <img src="assets/img/role.jpg" alt="">
        </div>
    </div>
    <footer><center>All rights reserved &copy; elidvlpr</center></footer>
</body>
</html>