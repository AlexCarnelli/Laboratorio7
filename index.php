

<?php
session_start();
include("header.php");
include("RF.php");
if (isset($_POST['page'])) {
    $_SESSION['page'] = $_POST['page'];
    header("Location: " . $_SERVER['PHP_SELF']);
   }
        if (isset($_SESSION['page'])) {
        
            $page = $_SESSION['page'];

            switch ($page) {
                case 'Clientes':
                    include('clientes.php');
                    break;
                case 'Productos':
                    include('productos.php');
                    break;
                case 'Compras':
                    include('compras.php');
                    break;
                default:
                    echo "<p>Página no encontrada.</p>";
                    break;
            }
        } else {
            include('clientes.php');
        }
    
include("footer.php");


?>
