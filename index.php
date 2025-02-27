<?php
require_once('connection/connection.php');
require_once('helper/helper-func.php');
//require_once('layouts/header.php');
//update_visitors(null,null,get_user_ip());

?>
<?php
$route = explode('/', trim($_GET['r'], '/'));
if($route[0]== null){redirect('home');}
switch ($route[0])
{
    case 'home':
    case 'index':
        require_once ('home.php');
        break;
    case 'porto':
        require_once ('porto.php');
        break;
    case 'pric':
        require_once ('pric.php');
        break;
    case 'faq':
        require_once ('faq.php');
        break;
    case 'g':
        require_once ('g.php');
        break;
    default:
        $article=$route[0];
        require_once ('profile.php');
        break;
}
//require_once('layouts/footer.php');
?>

