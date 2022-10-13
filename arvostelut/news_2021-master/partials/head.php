<!DOCTYPE html>
<html lang="fi">
<head>
    <title>PHP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/uutiset.css" type="text/css">
</head>
<body>

    <header>
        <h1>Elokuva arvionti</h1>
    </header>
<nav>
    <ul class="navbar">
        <li class="navbutton"><a href="/">Lue elokuva arvosteluja</a></li>
      
        <?php if(!isLoggedIn()): ?>
           <li class="navbutton"><a href="/login">Kirjaudu sisään</a></li> 
           <li class="navbutton"><a href="/register">Rekisteröidy</a></li> 
        <?php else: ?>
           <li class="navbutton"><a href="/movie">Uusi elokuva</a></li>
           <li class="navbutton"><a href="/review">Uusi arvio</a></li>
           <li class="navbutton"><a href="/logout">Kirjaudu ulos</a></li>
        <?php endif ?>

    </ul>
</nav>