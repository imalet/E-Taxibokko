<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesignup.css">
    <title>Document</title>
</head>
<body>
   
    <form action="traitement.php" method="post" class="formulaire">
        <h1>Bienvenue</h1>
        <h4>Finaliser votre inscription en renseignant les champs manqunates</h4>
        <br>
        <div class="test">
            <div>
                <Label>PRENOM</Label>
                <br>
                <input type="text" name="prenom" id="">
            </div>
            <div id="nom">
                <Label >NOM</Label>
                <br>
                <input type="text" name="nom">
            </div>
        </div>
        <br>
        <div >
            <Label>TELEPHONE</Label>
            <br>
            <input type="text" name="numero" id="tel">
        </div>
        <br>
        <div >
            <Label>EMAIL</Label>
            <br>
            <input type="text" name="email" id="email">
        </div>
        <br>
        <div >
            <Label>PASSWORD</Label> <br>
            <input type="password" name="password" id="mdp" placeholder="Entrer Votre Mot de passe">
        </div><br><br>
        <a href="">🎁Ajouter un code promo</a>
        <br><br>
        <button type="submit" name="valider" class="inscrire">S'inscrire ➡</button>
       
    </form>
</body>
</html>