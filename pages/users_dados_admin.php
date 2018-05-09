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

    <link rel="stylesheet" href="../css/style_modal.css">

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
        require_once("../connection/connection.php");
        $database = connection_db();
        $data = array();
        $query = mysqli_query($database,"SELECT users.id_user,users.name_user,users.second_name_user,users.birthday_user,users.function_user,
        sectors.name_sector,users.email_user,users.phone_user,users.ramal_user,permissions.name_permission FROM users 
        INNER JOIN sectors ON sectors.id_sector = users.sector_user_id INNER JOIN permissions ON 
        permissions.id_permission = users.permission_user ORDER BY users.name_user ASC;");
        

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
                            <i class=\"fa fa-gear fa-fw\" style=\"color:#fff\"></i> <i class=\"fa fa-caret-down\" style=\"color:#fff\"></i>
                        </a>
                        <ul class=\"dropdown-menu dropdown-user\" style=\"font-color:#fff\">
                            <li><a href=\"users.php\"><i class=\"fa fa-clock-o fa-fw\"></i> Atualizações</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li><a href=\"users_dados_admin.php\"><i class=\"fa fa-users fa-fw\" ></i> Usuários</a></li>
                            <li class=\"divider\"></li>
                            <li><a href=\"../php/login/finalizeLogin.php\"><i class=\"fa fa-table fa-fw\"></i> Eventos</a></li>
                            <li class=\"divider\"></li>
                            <li><a href=\"../php/login/finalizeLogin.php\"><i class=\"fa fa-comments fa-fw\"></i> Recados</a></li>
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
    <li><a href="index.php" style="color:#fff"><i class="fa fa-sign-out fa-fw" style="color:#fff"></i> Voltar</a>
                </li>
                </li>
            </ul>
    <ul class="nav navbar-top-links navbar-right" style="background-color:#243d5b">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw" style="color:#fff" ></i> <i class="fa fa-caret-down" style="color:#fff"></i>
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
    <div class="sidebar-nav navbar-collapse">  
    <ul class="nav" id="side-menu">
    <br>
        <img src="../img/img_grupoamb2.jpg" style="margin-left:30px">    
        <br><br>
    <li class="col-md-12" style="margin-left:25px">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Pesquisar...">
                                <span class="input-group-btn">
                                <button onclick="window.location.href='index.php'" class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>&bnsp
                                
                            </span>
                            </div>
                            <div class="input-group custom-search-form">
                            <span class="input-group-btn">
                            <button style="margin-top:10px" onClick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-success">Adicionar</button>
                               
                            </span>
                            
                            </div>
                            
                            <!-- /input-group -->
                        </li>
                        <br><br>
    </ul>
                        </div>
    <br>
<div class="container float-right">
<div class="col-lg-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Email</th>
        <th>Data de nascimento</th>
        <th>Função</th>
        <th>Setor</th>
        <th>Ramal</th>
        <th>Permissão</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php
    while($row = mysqli_fetch_assoc($query))
    {
        $data = array('Select'=>$row);
    
    $json = json_encode($data);
    $obj = json_decode($json,true);
    foreach($obj as $id)
    {
    $id_user = $id['id_user'];
    $name = $id['name_user'];
    $second_name = $id['second_name_user'];
    $bd= $id['birthday_user'];
    $function = $id['function_user'];
    $phone = $id['phone_user'];
    $email = $id['email_user'];
    $ramal = $id['ramal_user'];
    $sector = $id['name_sector'];
    $permission = $id['name_permission'];
    }
      echo "<tr>
        <td>$name</td>
        <td>$second_name</td>
        <td>$email</td>
        <td>$bd</td>
        <td>$function</td>
        <td>$sector</td>
        <td>$ramal</td>
        <td>$permission</td>
        <td><button type=\"button\" onClick=\"document.getElementById('id01').style.display='block'\" class=\"btn btn-success\">Editar</button>
        <td><button type=\"button\" onClick=\"document.getElementById('id01').style.display='block'\" class=\"btn btn-danger\">Remover</button>               
      </tr>";
    }
      ?>
    </tbody>
  </table>
</div>
    </div>

    <!--MODAL-->
    <div class="w3-container">
    <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>Adicionar - Usuário</h2>
      </header>
      <div class="w3-container">
      <form action="../php/user/insertUser.php" method="POST">
      Nome: <input type="text" name="name" class="form-control" id="name">
                    Sobrenome: <input type="text" name="second_name" class="form-control" id="second_name">
                    Data de nascimento: <input type="date" name="date" class="form-control" id="date">
                    Email: <input type="email" name="email" class="form-control" id="email">
                    Função: <input type="text" name="function" class="form-control" id="function">
                    <br>
                    <div class="row">
                      <div class="col-md-6">

                    Setor: <select name="sector">
                        <?php
                            
                            $query2 = mysqli_query($database,"SELECT * FROM sectors ORDER BY name_sector ASC;");
                            while($row = mysqli_fetch_assoc($query2))
                            {
                             $data = array('Select'=>$row);

                            $json = json_encode($data);
                            $obj = json_decode($json,true);
                        foreach($obj as $id2)
                        {
                        $sectors = $id2['name_sector'];
                        $id_sector= $id2['id_sector'];
                        }
                        echo "<option value=\"$id_sector\">$sectors</option>";
                        }
                        ?>
                    </select>
                      </div>
                      <br>
                      <br>
                      <div class="col-md-6">
                      Telefone: <input type="tel" name="tel" class="form-control" id="tel">
                      Ramal: <input type="number" name="ramal" class="form-control" id="ramal">
                      Permissão: <select name="permission_user">
                              <option value="1">Usuário</option>
                              <option value="2">Gestor/administrador</option>
                    </select>
                      </div>
                    </div>
                    <br>
                    
  <button type="submit" class="btn btn-success">SALVAR</button>
  <br><br>
</form>

      </div>
      <footer class="w3-container w3-teal">
       <br>
       <br>
      </footer>
      
      
    </div>
  </div>
  </div>
           

<!---->

    </nav>
    
    <!-- /.navbar-top-links -->
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