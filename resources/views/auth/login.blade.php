{{-- <form method="POST" action="{{ route('auth.verification') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Submit</button>
</form> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>LODERN LOGIN PAGE</title>
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Créer un compte</h1>
                <div class="social-icons">
                    <a href="https://www.google.com/" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="https://www.facebook.com/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://github.com/" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>
                    Enregistrer vos informations
                </span>
                @csrf
                <input type="text" placeholder="Nom">
                <input type="email" name="email" placeholder="Gmail">
                <input type="password" name="password" placeholder="Nouveau mot de passe">
                <button id="btnEnregistrer" onclick="callAlert('Seulement l\'Admin peut créer un nouvel utilisateur')">Enregistrer</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('auth.verification') }}">
                <h1>Connexion</h1>
                <div class="social-icons">
                    <a href="https://www.google.com/" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="https://www.facebook.com/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://github.com/" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>
                    Veuillez entrer vos informations.
                </span>
                @csrf
                <input type="email" name="email" placeholder="Gmail">
                <input type="password" name="password" placeholder="Mot de passe">
                <a href="#">Mot de passe oublié ?</a>
                <button type="submit" id="btnConnecter">Connecter</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>BIENVENU A VOUS</h1>
                    <P>Veuillez entrer vos informations. <br><br>-------- Ou --------</P>
                    <button class="hidden" id="register">Créer votre compte</button>
                </div>
                <div class="toggle-panel toggle-left">
                    <h1>BONJOUR</h1>
                    <P>Veuillez enregistrer vos informations. <br><br>-------- Ou --------</P>
                    <button class="register" id="login">Se Connecter</button>
                </div>
            </div>
        </div>
    </div>


    <!-- *********************** SCRIPT *********************** -->

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });

        function callAlert(msg){
            alert(msg, 10000);
        }

    </script>

    <!-- *********************** CSS *********************** -->

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        body{
            background-color: rgb(23, 27, 37);
            /* background: linear-gradient(to right, #e2e2e2, #c9d6ff); */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container{
            background-color: #8b8787;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.575);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        #btnConnecter{
            background: rgb(28, 25, 56);
            border: 1px solid rgb(28, 25, 56);
        }

        #btnEnregistrer{
            background: rgb(28, 25, 56);
            border: 1px solid rgb(28, 25, 56);
        }

        .container p{
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }

        .container span{
            font-size: 20px;
            text-align: center;
        }

        /* ICONE */
        .container a{
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin: 15px 0 10px;
        }

        .container button{
            background-color: transparent;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid white;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            /* MAJUSCULE */
            text-transform: uppercase;
            margin-top: 10PX;
            cursor: pointer;
        }

        .container button.hidden{
            background-color: transparent;
            border-color: #fff;
        }

        .container form{
            background-color: #8b8787;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
        }

        .container input{
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        .form-container{
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in{
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in{
            transform: translateX(100%);
        }

        .sign-up{
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up{
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }

        @keyframes move{
            0%, 49.99%{
                opacity: 0;
                z-index: 1;
            }
            50%, 100%{
                opacity: 1;
                z-index: 5;
            }
        }

        .social-icons{
            margin: 20px 0;
        }

        .social-icons a{
            font-size: 130%;
            border: 1px solid rgb(28, 25, 56);
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
        }

        /* //////////////// SIGN UP ////////////////// */

        .toggle-container{
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            border-radius: 150px 0 0 100px;
            z-index: 1000;
        }

        .container.active .toggle-container{
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .toggle{
            background-color: #512da8;
            height: 100%;
            background: rgb(28, 25, 56);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle{
            transform: translateX(50%);
        }

        .toggle-panel{
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left{
            transform: translateX(-200%);
        }

        .container.active .toggle-left{
            transform: translateX(0);
        }

        .toggle-right{
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right{
            transform: translateX(200%);
        }
    </style>
</body>
</html>
