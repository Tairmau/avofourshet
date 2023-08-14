<?php
$action = $_REQUEST['action'];
$pdo = PdoAvofourshet::getPdoAvofourshet();

switch($action){

    case 'envoiemail':
        {
            if($_SESSION['login']){
                $msgcli = $_POST['climessage'];
                if($msgcli != ""){
                    $compteinfo = $pdo->infocompte($email);
                    $envoiemail = $pdo->sendmail($climail,$msgcli);
                    header('Location: index.php?uc=connexionBonne&ucconn=contact');
                }
                else{
                    echo"Veuillez remplir tous les champs";
                }
            }else{
                $climail = $_POST['climail'];
                $msgcli = $_POST['climessage'];
                
                if($msgcli != "" && $climail !=""){
                    $envoiemail = $pdo->sendmail($climail,$msgcli);
                    header('Location: index.php?uc=contact');
                }
                else{
                    echo"Veuillez remplir tous les champs";
                }

            }

            break; 
        }
        
}



?>