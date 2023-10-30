<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form action="traitement.php" method="post" class="formulaire">
        <div>
            <h1>Login</h1>
            <h4>Votre chauffeur en un clic !</h4>
            <button type="submit" class="facebook">Continuer avec facebook</button>
        </div>
        <div class="separateur">
            <h4>--------------------------------- OU ---------------------------------</h4>
        </div>
        <div class="email">
            <Label>Email</Label>
            <input type="text" name="email" id="" placeholder="Entre Votre E-mail">
        </div>
        <div class="pwd">
            <Label>Mot de passe</Label>
            <input type="password" name="password" id="" placeholder="Entre Votre mot de passe">
        </div>
        <div class="link_submit">
            <a href="">J'ai deja un compte</a>
            <button type="submit" name="inscrire" class="inscrire">S'inscrire ➡</button>
        </div>
    </form>
</body>

</html>