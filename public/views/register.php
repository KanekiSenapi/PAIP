<div class="login-container">
    <form class="form register" action="register" method="POST">
        <div class="messages" style="<?=(isset($messages)) ? 'display: block' : ''?>">
            <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
        </div>
        <label for="email-label">Email</label>
        <input name="email" id="email-label" type="text" placeholder="Email">
        <label for="password-label">Password</label>
        <input name="password" id="password-label" type="password" placeholder="Password">
        <label for="password2-label">Repeat Password</label>
        <input name="password2" id="password2-label" type="password" placeholder="Repeat Password">
        <label for="name-label">Name</label>
        <input name="name" id="name-label" type="text" placeholder="Name">
        <label for="surname-label">Surname</label>
        <input name="surname" id="surname-label" type="text" placeholder="Surname">
        <button type="submit">Register</button>
    </form>
</div>
