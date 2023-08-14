
<section>
    <div class="container3">
        <div class="block-img">
            <table border="1">
                <tr>
                    <th>Mail</th>
                    <th>Message</th>

                </tr>
<?php 
    foreach( $lesCommentaires as $unCommentaire) {
        echo '<tr>';
        echo '<th>'.($unCommentaire['mails'].'$</th>');
        echo '<th>'.($unCommentaire['messages'].'</th>');
        echo '</tr>';
    }

?>
            </table>
        </div>
    </div>
</section>