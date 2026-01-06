<?php
session_start();

$error = "";

// Check form submission
if (isset($_POST['login'])) {
    $admin_id = $_POST['registrar_id'];

    // Hardcoded Admin ID
    if ($admin_id === "registrar1234") {
        $_SESSION['registrar'] = true;
        header("Location: registrar.php");
        exit();
    } else {
        $error = "Invalid Registrar ID";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Universal University</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            height: 100vh;
        }


        .container {
            display: flex;
            height: 100vh;
        }


        .image-section {
            position: relative;
            width: 60%;
            height: 100vh;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transform: scale(1.05);
            transition: opacity 1s ease, transform 1s ease;
        }

        .slide.active {
            opacity: 1;
            transform: scale(1);
        }


        .dots {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
        }

        .dot.active {
            background: #fff;
            transform: scale(1.4);
        }


        .content-section {
            width: 40%;
            background-color: #e6d7bd;
            padding: 40px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .header {
            position: absolute;
            top: 30px;
            left: 40px;
            font-size: 20px;
        }


        .back-btn {
            position: absolute;
            top: 25px;
            right: 40px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #6b3b36;
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-btn img {
            width: 50px;
        }

        .login-box {
            text-align: center;
            width: 100%;
            max-width: 320px;
        }


        .user-icon {
            width: 200px;
            margin-bottom: 10px;
        }


        .login-box h1 {
            font-size: 30px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .login-box p {
            margin-bottom: 40px;
        }


        .login-box input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 25px;
            border: 1px solid #999;
        }


        .login-box button {
            background-color: #6b3b36;
            color: white;
            border: none;
            padding: 10px;
            width: 140px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.3s ease;
        }

        .login-box button:hover {
            background-color: #552e2a;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="image-section">
            <img class="slide active" src="Assets/university.png">
            <img class="slide" src="Assets/students.png">
            <img class="slide" src="Assets/students2.png">

            <div class="dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>

        <div class="content-section">

            <div class="header">Hello Registrar,</div>

            <a href="homepage.php">
                <button class="back-btn">
                    <img src="Assets/back.png" alt="Back">
                </button>
            </a>


            <div class="login-box">
                <img class="user-icon" src="Assets/registrar.png" alt="Student Icon">

                <h1>Universal University</h1>
                
            </div>

            <form method="post">
                <input type="text" name="registrar_id" placeholder="Registrar ID Number" required>
                <button type="submit" name="login">Sign In</button>
            </form>

            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </div>

    </div>

    <script>
        const slides = document.querySelectorAll(".slide");
        const dots = document.querySelectorAll(".dot");
        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach(s => s.classList.remove("active"));
            dots.forEach(d => d.classList.remove("active"));
            slides[index].classList.add("active");
            dots[index].classList.add("active");
            currentIndex = index;
        }

        setInterval(() => {
            showSlide((currentIndex + 1) % slides.length);
        }, 4000);
    </script>

</body>

</html>
message.txt
6 KB