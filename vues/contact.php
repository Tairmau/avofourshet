<section class="contact">
    <div class="container3">
        <div class="blockicon">
            <a href="https://www.instagram.com/" target="_blank"><img src="images/instagram.png" alt=""></a>
            <a href="https://twitter.com/?lang=fr" target="_blank"><img src="images/logo-twitter.png" alt="" ></a>
            <a href="https://fr-fr.facebook.com/" target="_blank"><img src="images/facebook.png" alt="" ></a>
        </div>
        <h1>Un message? Juste ici !</h1>
        <div class="blockform">
            <form action="index.php?uc=contact&action=envoiemail" method="POST">
                <?php
                    if($_SESSION['login']){

                    }else{
                        echo "<input type='text' placeholder='  votre mail' id='climail' name='climail'>";
                    }
                ?>
                <input type="textarea" placeholder="  votre messsage" id="climessage" name="climessage">
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</section>