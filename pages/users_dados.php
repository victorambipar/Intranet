<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grupo Ambipar - Intranet</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php

    session_start();
        $person_birthday = $_GET['id_person'];
        require_once("../connection/connection.php");
        $database = connection_db();
        $data = array();
        $query = mysqli_query($database,"SELECT users.name_user,users.second_name_user,users.ramal_user,users.phone_user,users.birthday_user,users.function_user,sectors.name_sector,users.email_user 
        FROM users INNER JOIN sectors ON sectors.id_sector = users.sector_user_id WHERE users.id_user = ".$person_birthday.";");
        while($row = mysqli_fetch_assoc($query))
        {
            $data = array('Select'=>$row);
        }
        $json = json_encode($data);
        $obj = json_decode($json,true);
        foreach($obj as $id)
        {
        $name = $id['name_user'];
        $second_name = $id['second_name_user'];
        $bd= $id['birthday_user'];
        $function = $id['function_user'];
        $sector = $id['name_sector'];
        $phone = $id['phone_user'];
        $email = $id['email_user'];
        $ramal = $id['ramal_user'];
        }

?>


<body style="background-color:#fff">

<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#243d5b">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right" style="background-color:#243d5b">
    <?php
                        if($_SESSION['permission'] == 2)
                        {
                            echo "<li class=\"dropdown\">
                            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                            <i class=\"fa fa-gear fa-fw\" ></i> <i class=\"fa fa-caret-down\"></i>
                        </a>
                        <ul class=\"dropdown-menu dropdown-user\" style=\"font-color:#fff\">
                            <li><a href=\"users.php\"><i class=\"fa fa-clock-o fa-fw\"></i> Atualizações</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li><a href=\"users_dados_admin.php\"><i class=\"fa fa-users fa-fw\"></i> Usuários</a></li>
                            <li class=\"divider\"></li>
                            <li><a href=\"../php/login/finalizeLogin.php\"><i class=\"fa fa-table fa-fw\"></i> Eventos</a></li>
                            <li class=\"divider\"></li>
                            <li><a href=\"mural_admin.php\"><i class=\"fa fa-comments fa-fw\"></i> Recados</a></li>
                            <li class=\"divider\"></li>
                            <li><a href=\"../php/login/finalizeLogin.php\"><i class=\"fa fa-phone fa-fw\"></i> Ramais</a></li>
                            <li class=\"divider\"></li>
                            <li><a href=\"../php/login/finalizeLogin.php\"><i class=\"glyphicon glyphicon-cutlery\"></i> Cardápio</a></li>
                        </ul>
                    <!-- /.dropdown-user -->
                </li>";
                        }
                        else{}

                    ?>
        <li class="dropdown">
    <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Voltar</a>
                </li>
                </li>
            </ul>
    <ul class="nav navbar-top-links navbar-right" style="background-color:#243d5b">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw" ></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user" style="font-color:#fff">
                <li><a href="../php/login/finalizeLogin.php"><i class="fa fa-sign-out fa-fw"></i> Sair
            </a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <div class="navbar-default sidebar" role="navigation">
                
    </nav>
    
    <!-- /.navbar-top-links -->
    <?php echo"<h1 class=\"page-header\" style=\"margin-left:10px;\">".$name." ".$second_name."</h1>";?>
    <form class="col-md-11">
    <?php
  echo "<div class=\"form-group\">
    <label for=\"exampleInputEmail1\" style=\"margin-left:50px;\">Email</label>
    <input type=\"email\" class=\"form-control\" value=\"$email\" disabled=\"disabled\" id=\"exampleInputEmail1\" style=\"margin-left:50px; margin-right:500px;\" aria-describedby=\"emailHelp\" placeholder=\"Email\">
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1\" style=\"margin-left:50px;\">Nome</label>
    <input type=\"text\" class=\"form-control\" value=\"$name\" disabled=\"disabled\" id=\"exampleInputEmail1\" style=\"margin-left:50px;\" aria-describedby=\"emailHelp\" placeholder=\"Nome\">
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1\" style=\"margin-left:50px;\">Sobrenome</label>
    <input type=\"text\" class=\"form-control\" value=\"$second_name\" disabled=\"disabled\" id=\"exampleInputEmail1\" style=\"margin-left:50px;\" aria-describedby=\"emailHelp\" placeholder=\"Sobrenome\">
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1\" style=\"margin-left:50px;\">Data de nascimento</label>
    <input type=\"date\" class=\"form-control\" id=\"exampleInputEmail1\" disabled=\"disabled\" value=\"$bd\" style=\"margin-left:50px;width:100%\" aria-describedby=\"emailHelp\" placeholder=\"Data de nascimento\">
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1\" style=\"margin-left:50px;\">Telefone</label>
    <input type=\"tel\" class=\"form-control\" id=\"exampleInputEmail1\" disabled=\"disabled\" value=\"$phone\" style=\"margin-left:50px;\" aria-describedby=\"emailHelp\" placeholder=\"Telefone\">
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1\" style=\"margin-left:50px;\">Ramal</label>
    <input type=\"ext\" class=\"form-control\" id=\"exampleInputEmail1\" disabled=\"disabled\" value=\"$ramal\" style=\"margin-left:50px;\" aria-describedby=\"emailHelp\" placeholder=\"Ramal\">
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1\" style=\"margin-left:50px;\">Função</label>
    <input type=\"text\" class=\"form-control\" id=\"exampleInputEmail1\" disabled=\"disabled\" value=\"$function\" style=\"margin-left:50px;\" aria-describedby=\"emailHelp\" placeholder=\"Função\">
  </div>
  <div class=\"form-group\">
    <label for=\"exampleInputEmail1\" style=\"margin-left:50px;\">Setor</label>
    <input type=\"text\" class=\"form-control\" id=\"exampleInputEmail1\" disabled=\"disabled\" value=\"$sector\" style=\"margin-left:50px;\" aria-describedby=\"emailHelp\" placeholder=\"Setor\">
  </div>";
  ?>
</form>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    

</body>

</html>