<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <style>
        :root {
            --input-focus: #2d8cf0;
            --font-color: #323232;
            --font-color-sub: #666;
            --bg-color: #fff;
            --bg-color-alt: #666;
            --main-color: #323232;
        }

        /* Style untuk latar belakang di luar halaman */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #2d8cf0, #f0f0f0); /* Background luar halaman */
        }

        /* Wrapper untuk konten utama */
        .content {
            background-color: #fff; /* Warna latar belakang untuk konten login/signup */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title, .glowing-text {
            font-size: 36px;
            font-weight: 900;
            color: var(--main-color);
            margin-bottom: 20px;
            text-align: center;
            animation: glow 1.5s ease-in-out infinite alternate;
        }

        .glowing-text {
            font-size: 24px;
            margin-bottom: 10px;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #2d8cf0, 0 0 20px #2d8cf0, 0 0 35px #2d8cf0, 0 0 40px #2d8cf0, 0 0 50px #2d8cf0;
            }
            to {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #2d8cf0, 0 0 40px #2d8cf0, 0 0 70px #2d8cf0, 0 0 80px #2d8cf0, 0 0 100px #2d8cf0;
            }
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            margin-bottom: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--input-focus);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .card-side {
            position: relative;
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .card-side span {
            margin: 0 20px;
            font-weight: 600;
        }

        .flip-card__inner {
            width: 300px;
            height: 350px;
            position: relative;
            background-color: transparent;
            perspective: 1000px;
            transform-style: preserve-3d;
            transition: transform 0.8s;
        }

        .flip-card__front, .flip-card__back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: lightgrey;
            border-radius: 10px;
            border: 2px solid var(--main-color);
            box-shadow: 4px 4px var(--main-color);
        }

        .flip-card__back {
            transform: rotateY(180deg);
        }

        .flip-card__form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .flip-card__input {
            width: 250px;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
            font-size: 15px;
            font-weight: 600;
            color: var(--font-color);
            padding: 5px 10px;
            outline: none;
        }

        .flip-card__btn {
            width: 120px;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
            font-size: 17px;
            font-weight: 600;
            color: var(--font-color);
            cursor: pointer;
        }

        .flip-card__btn:active {
            box-shadow: 0px 0px var(--main-color);
            transform: translate(3px, 3px);
        }
    </style>
</head>
<body>
<!-- Bungkus konten utama dalam elemen content -->
<div class="content">
    <div class="wrapper">
        <div class="card-side">
            <span>Log in</span>
            <label class="switch">
                <input type="checkbox" class="toggle">
                <span class="slider"></span>
            </label>
            <span>Sign up</span>
        </div>
        <div class="flip-card__inner">
            <div class="flip-card__front">
                <form class="flip-card__form">
                    <div class="glowing-text">SHADOW</div>
                    <input type="email" class="flip-card__input" placeholder="Email">
                    <input type="password" class="flip-card__input" placeholder="Password">
                    <button class="flip-card__btn" type="submit">LOGIN</button>
                </form>
            </div>
            <div class="flip-card__back">
                <form class="flip-card__form">
                    <div class="glowing-text">SHADOW</div>
                    <input type="name" class="flip-card__input" placeholder="Name">
                    <input type="email" class="flip-card__input" placeholder="Email">
                    <input type="password" class="flip-card__input" placeholder="Password">
                    <button class="flip-card__btn">Sign up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const toggle = document.querySelector('.toggle');
    const flipCardInner = document.querySelector('.flip-card__inner');

    toggle.addEventListener('change', function() {
        if (this.checked) {
            flipCardInner.style.transform = 'rotateY(180deg)';
        } else {
            flipCardInner.style.transform = 'rotateY(0deg)';
        }
    });
</script>
</body>
</html>
