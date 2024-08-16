
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICATION</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
    <div class="container">
        <div class="cover-photo">
            <img src="{{ asset($employe->images) }}" alt="" class="profil">
        </div>
        <form method="POST" action="{{ route('admin.employes.update', $employe->numEmp) }}">
            <div class="profile-name">{{ $employe->Nom }} {{ $employe->Prenom }}</div>

            @csrf

            @method('PUT')

            <input value="{{ $employe->numEmp }}" name="numEmp" id="numEmp" class="about" type="text" placeholder="ID Employe" style="display: none">
            <input value="{{ $employe->Nom }}" name="Nom" id="Nom" class="about" type="text" placeholder="Nom">
            <input value="{{ $employe->Prenom }}" name="Prenom" id="Prenom" class="about" type="text" placeholder="Prenom">
            <input value="{{ $employe->poste }}" name="poste" id="poste" class="about" type="text" placeholder="Poste">
            <input value="{{ $employe->salaire }}" name="salaire" id="salaire" class="about" type="text" placeholder="Salaire">
            <!-- <p class="about">User interface Designe and <br> front-end developer</p> -->

            <button type="submit" class="msg-btn">MODIFIER</button>
            <button action{{ route('admin.employes.index') }} class="follow-btn">ANNULER</button>
        </form>

    </div>
</body>

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat');
    body{
        font-family: Montserrat, sans-serif;
        background-color: rgb(23, 27, 37);
    }

    .container{
        margin: 40px auto;
        background: rgb(23, 27, 37);
        color: #b3b8cd;
        border-radius: 5px;
        width: 450px;
        text-align: center;
        box-shadow: 0 10px 20px -10px rgba(59, 59, 59, 0.75);
    }

    .cover-photo{
        background: url({{ asset('assets/images/cvrtr.jpg') }});
        height: 160px;
        width: 100%;
        border-radius: 5px 5px 0 0;
    }

    .profil{
        height: 120px;
        width: 120px;
        border-radius: 50%;
        margin: 93px 0 0 -280px;
        border: 1px solid #1f1a32;
        padding: 7px;
        background: rgb(34, 40, 53);
        object-fit: cover;
    }

    .profile-name{
        font-size: 30px;
        font-weight: bold;
        margin: 27px 0 0 80px;
    }

    .about {
        margin-top: 35px;
        line-height: 30px;
        width: 380px;
        border-radius: 5px;
        font-size: 17px;
    }

    button{
        margin: 15px 0 15px 0;
        cursor: pointer;
    }

    .msg-btn, .follow-btn {
        background: #03bfbc;
        border: 1px solid #03bfbc;
        padding: 9px 60px;
        color: #231e39;
        border-radius: 5px;
        font-family: Montserrat, sans-serif;
    }

    .follow-btn{
        margin-left: 10px;
        background: transparent;
        color: #862507;
        border: 1px solid #862507;;
    }

    .follow-btn:hover{
        color: #f5f2ff;
        background: #862507;
        transition: .5s;
    }

    .msg-btn{
        margin-left: 10px;
        background: transparent;
        color: #02999c;
    }

    .msg-btn:hover{
        color: #000000;
        background: #03bfbc;
        transition: .5s;
    }
</style>
</html>
