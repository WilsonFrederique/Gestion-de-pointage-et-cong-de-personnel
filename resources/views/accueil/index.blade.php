<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body{
        background-color: #0c1022;
        color: #fff;
    }
    .header{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 10%;
        background: transparent;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
    }
    .logo{
        font-size: 25px;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        pointer-events: none;
        opacity: 0;
        animation: slideTop 1s ease forwards;
    }
    .navbar a{
        display: inline-block;
        font-size: 18px;
        font-weight: 500;
        text-decoration: none;
        color: #fff;
        margin-left: 35px;
        opacity: 0;
        animation: slideTop .5s ease forwards;
        animation-delay: calc(.2s * var(--i));
    }

    .navbar a.active{
        /* background: linear-gradient(45deg, #f06, #c3f); */
        background: linear-gradient(45deg, rgb(184, 178, 178), #0329e7);
        -webkit-text-fill-color: transparent;
        -webkit-background-clip: text;
    }
    .navbar a:hover{
        /* background: linear-gradient(45deg, #f06, #c3f); */
        background: linear-gradient(45deg, rgb(184, 178, 178), #0329e7);
        -webkit-text-fill-color: transparent;
        -webkit-background-clip: text;
    }
    .home{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10%;
    }
    .home-content{
        max-width: 500px;
        margin-left: -30px;
    }
    .home-content h1{
        font-size: 56px;
        font-weight: 700;
        line-height: 1.2;
        opacity: 0;
        animation: slideRight 1s ease forwards;
        animation-delay: .7s;
    }

    .home-content h3{
        font-size: 32px;
        font-weight: 700;
        opacity: 0;
        animation: slideLefl 1s ease forwards;
        animation-delay: 1s;
    }
    .home-content p{
        font-size: 16px;
        margin: 20px 0 40px;
        opacity: 0;
        animation: slideLefl 1s ease forwards;
        animation-delay: 1.3s;
    }
    .btn{
        position: relative;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 180px;
        height: 48px;
        border-radius: 40PX;
        font-size: 19px;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        letter-spacing: 1px;
        z-index: 1;
        opacity: 0;
        animation: slideTop 1s ease forwards;
        animation-delay: 1.8s;
    }

    .btn::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        inset: 0;
        /* background: linear-gradient(45deg, #f06, #3cf, #f06); */
        background: linear-gradient(45deg, rgb(141, 137, 137), #000000);
        background-position: 0 0;
        z-index: -1;
        border-radius: 40px;
        background-size: 200%;
        filter: blur(5px);
        transition: .5s ease;
    }
    .btn:hover::before{
        background-position: 100% 0;
    }
    .btn::after{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        inset: 0;
        /* background: linear-gradient(45deg, #f06, #3cf, #f06); */
        background: linear-gradient(45deg, rgb(71, 66, 66), #000000);
        background-position: 0 0;
        z-index: -1;
        border-radius: 40px;
        background-size: 200%;
        transition: .5s ease;
    }
    .btn:hover::after{
        background-position: 100% 0;
    }
    .ico{
        width: 25px;
        height: 25px;
    }
    .gmail{
        width: 20px;
        height: 20px;
    }
    .youtube{
        width: 20px;
        height: 20px;
    }
    .home-aci a{
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        /* background: linear-gradient(45deg, #f06, #3cf); */
        background: linear-gradient(45deg, rgb(71, 66, 66), #000000);
        border-radius: 50%;
        font-size: 20px;
        color: #fff;
        text-decoration: none;
        margin: 20px 0;
        z-index: 1;
    }
    .home-aci a:nth-child(1){
        opacity: 0;
        animation: slideBottom 1s ease forwards;
        animation-delay: 2.1s;
    }
    .home-aci a:nth-child(3){
        opacity: 0;
        animation: slideTop 1s ease forwards;
        animation-delay: 2.1s;
    }
    .home-aci a:nth-child(2){
        opacity: 0;
        animation: slideRight 1s ease forwards;
        animation-delay: 2.1s;
    }
    .home-aci a::before{
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        /* background: linear-gradient(45deg, #f06, #3cf); */
        background: linear-gradient(45deg, rgb(153, 146, 146), #115566);
        border-radius: 50%;
        z-index: -1;
        transition: .5s ease;
    }
    .home-aci a:hover:before{
        filter: blur(5px);
    }
    .home-aci a::after{
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #0c1022;
        border-radius: 50%;
        transform: scale(.88);
        z-index: -1;
        transition: .5s ease;
    }
    .home-aci a:hover::after{
        transform: scale(0);
    }
    .home-img{
        width: 410px;
        height: 410px;
        opacity: 0;
        animation: zoomIn 1s ease forwards, floatImage 4s ease-in-out infinite;
        animation-delay: 2.1s, 3.1s;
    }
    .home-img .glowing-circle{
        position: relative;
        width: 100%;
        height: 100%;
        background: yellowgreen;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .home-img .glowing-circle::after{
        content: '';
        position: absolute;
        width: 380px;
        height: 380px;
        background: #0c1022;
        border-radius: 50%;
    }
    .glowing-circle span{
        position: absolute;
        width: 100%;
        height: 100%;
        /* background: linear-gradient(#f06, #3cf); */
        background: linear-gradient(rgb(88, 85, 85), #000000);
        border-radius: 50%;
    }
    .glowing-circle span:nth-child(1){
        filter: blur(10px);
    }
    .glowing-circle .image{
        /* background: linear-gradient(#f06, rgb(28, 38, 41)); */
        position: relative;
        width: 370px;
        height: 370px;
        border-radius: 50%;
        z-index: 1;
        overflow: hidden;
    }
    .image img{
        height: 85%;
        width: 85%;
        position: absolute;
        left: 50%;
        top: 20px;
        transform: translateX(-50%);
        max-width: 350px;
        object-fit: cover;
    }
    .p1{
        letter-spacing: 1px;
    }

    /* ////////////// ANIMATION ////////////////////// */

    @keyframes slideTop{
        0%{
            opacity: 0;
            transform: translateY(100px);
        }
        100%{
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideRight{
        0%{
            opacity: 0;
            transform: translateX(-100px);
        }
        100%{
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideLefl{
        0%{
            opacity: 0;
            transform: translateX(100px);
        }
        100%{
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideBottom{
        0%{
            opacity: 0;
            transform: translateY(-100px);
        }
        100%{
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes zoomIn{
        0%{
            opacity: 0;
            transform: scale(0);
        }
        100%{
            opacity: 1;
            transform: scale(1);
        }
    }
    @keyframes floatImage{
        0%{
            transform: translateY(0);
        }
        50%{
            transform: translateY(-24px);
        }
        100%{
            transform: translateY(0);
        }
    }

    /* .img{
        filter: invert(45%) saturate(1211%) hue-rotate(190deg) brightness(107%) contrast(106%);
    } */

</style>
<body>
    <header class="header">
        <a href="#" class="logo">GESTION DE POINTAGE</a>

        <nav class="navbar">
            <a href="index.php" style="--i:1;" class="active">ACCUEIL</a>
            <a href="{{ route('admin.employes.index') }}" style="--i:2;">EMPLOYE</a>
            <a href="{{ route('admin.pointages.index') }}" style="--i:3;">POINTAGE</a>
            <a href="{{ route('admin.conges.index') }}" style="--i:4;">CONGE</a>
        </nav>
    </header>

    <section class="home">
        <div class="home-aci">
            <a href="https://www.facebook.com"><i><img class="ico" src="{{ asset('assets/images/facebook7.png') }}" alt=""></i></a>
            <a href="#"><i><img class="gmail" src="{{ asset('assets/images/gmail.png') }}" alt=""></i></a>
            <a href="https://www.youtube.com"><i><img class="youtube" src="{{ asset('assets/images/youtube6.png') }}" alt=""></i></a>
        </div>

        <div class="home-content">
            <h1>WILL'S WEB SITE</h1>
            <h3>Application pour la Gestion de pointage et congé de personnel</h3>
            <p class="p1"></p>
            <a href="{{ route('admin.employes.index') }}" class="btn">OUVRIR</a>
        </div>

        <div class="home-img">
            <div class="glowing-circle">
                <span></span>
                <span></span>
                <div class="image">
                    <div class="center">
                        <img class="img" src="{{ asset('assets/images/WiFi.png') }}" alt="etudiant3" width="140">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function callAlert(msg){
            alert(msg, 3000);
        }

        window.alert = function(message, timeout=null){
            const alert = document.createElement('div');
            const alertButton = document.createElement('button');
            alertButton.innerText = 'OK';
            alert.classList.add('alert');
            alert.setAttribute('style',`
                position: fixed;
                top: 100px;
                left: 50%;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 10px 5px 0 #00805022;
                display: flex;
                flex-direction: column;
                border: 1px solid #333;
                transform: translateX(-50%);
            `);
            alertButton.setAttribute('style', `
                border: 1px solid #333;
                border-radius: 5px;
                background: white;
                padding: 5px;
                width: 13%;
                text-aligne: center;
            `);
            alert.innerHTML = `<span style="padding: 10px">${message}</span>`;
            alert.appendChild(alertButton);
            alertButton.addEventListener('click', (e)=>{
            alert.remove();
            })
            if(timeout != null){
                setTimeout(()=>{
                    alert.remove();
                }, Number(timeout))
            }
            document.body.appendChild(alert);
        }
    </script>
</body>
