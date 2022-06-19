<div class="navigation-bar">
    <div class="container">
        <a href="/" class="navigation-logo"><h1 class="navigation-logo-text">LIBRARY SYSTEM</h1></a>

        <nav class="navigation-menu">
            <a href="/" class="navigation-link <?php if(!isset($current) || $current == 'home') echo 'navigation-link-current' ?>">Home</a>
            <a href="/books" class="navigation-link <?php if(isset($current) && $current == 'books') echo 'navigation-link-current' ?>">Books</a>
            <a href="/about" class="navigation-link <?php if(isset($current) && $current == 'about') echo 'navigation-link-current' ?>">About</a>
            <?php
                if($_SESSION['created']) {
            ?>
            <a href="/logout" class="navigation-link">Logout</a>
            <?php
                } else {
            ?>
            <a href="/login" class="navigation-link <?php if(isset($current) && $current == 'login') echo 'navigation-link-current' ?>">Login</a>
            <a href="/register" class="navigation-link <?php if(isset($current) && $current == 'register') echo 'navigation-link-current' ?>">Register</a>
            <?php
                }
            ?>
        </nav>

        <div class="navigation-hamburger-button">
            <img src="./public/images/menu-burger.png" class="navigation-hamburger-icon"/>
        </div>
    </div>

</div>