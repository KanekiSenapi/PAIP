<div class="login-container">
    <form class="form login" action="login" method="POST">
        <div class="messages" style="<?=(isset($messages)) ? 'display: block' : ''?>">
            <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
        </div>
        <label for="email-field">Email</label>
            <input name="email" id="email-field" type="email" placeholder="Email" required>
        <label for="password-field">Password</label>
            <input name="password" id="password-field" type="password" placeholder="Password" required>
        <button type="submit">LOGIN</button>
    </form>
</div>
