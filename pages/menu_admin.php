<?php           session_start();         if(@$_SESSION['id'] == null)         {             echo "<body onLoad=\"window.location='login.php'\">";         }         else{                                  }         ?> <!DOCTYPE html>
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

        
        
        require_once("../connection/connection.php");
        $database = connection_db();
        $data = array();
        $query = mysqli_query($database,"SELECT * FROM menu ORDER BY date_menu ASC;");
        

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
                            <i class=\"fa fa-gear fa-fw\"></i> <i class=\"fa fa-caret-down\"></i>
                        </a>
                        <ul class=\"dropdown-menu dropdown-user\" style=\"font-color:#fff\">
                            <li><a href=\"users.php\"><i class=\"fa fa-clock-o fa-fw\"></i> Atualizações</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li><a href=\"users_dados_admin.php\"><i class=\"fa fa-users fa-fw\" ></i> Usuários</a></li>
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
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down" ></i>
            </a>
            <ul class="dropdown-menu dropdown-user>
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
        <img src="../img/img_grupoamb2.jpg" onClick="window.location.href='index.php'"  style="margin-left:30px">    
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
                               
                            </span>
                            
                            </div>
                            <button style="margin-top:10px" onClick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-success">Adicionar</button>
                            
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
        <th>Data</th>
        <th>Prato 1</th>
        <th>Prato 2</th>
        <th>Prato 3</th>
        <th>Guarnição 1</th>
        <th>Guarnição 2</th>
        <th>Opção</th>
        <th>Salada</th>
        <th>Sobremesas</th>
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
    $id_menu = $id['id_menu'];
    $date = $id['date_menu'];
    $dish1 = $id['dish1_menu'];
    $dish2 = $id['dish2_menu'];
    $dish3 = $id['dish3_menu'];
    $garrison1 = $id['garrison1_menu'];
    $garrison2 = $id['garrison2_menu'];
    $option = $id['option_menu'];
    $salad = $id['salad_menu'];
    $dessert = $id['dessert_menu'];
  
    }
      echo "<tr>
        <td>$date</td>
        <td>$dish1</td>
        <td>$dish2</td>
        <td>$dish3</td>
        <td>$garrison1</td>
        <td>$garrison2</td>
        <td>$option</td>
        <td>$salad</td>
        <td>$dessert</td>
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
        <h2>Adicionar - Cardápio</h2>
      </header>
      <div class="w3-container">
      <form action="../php/menu/insertMenu.php" method="POST">
      <br>
      Data: <input type="date" name="date" class="form-control" id="date">
                    Prato 1: <input type="text" name="dish1" class="form-control" id="dish1">
                    Prato 2: <input type="text" name="dish2" class="form-control" id="dish2">
                    Prato 3: <input type="text" name="dish3" class="form-control" id="dish3">
                    Guarnição 1: <input type="text" name="garrison1" class="form-control" id="garrison1">
                    Guarnição 2: <input type="text" name="garrison2" class="form-control" id="garrison2">
                    Opção: <input type="text" name="option" class="form-control" id="option">
                    Salada: <input type="text" name="salad" class="form-control" id="salad">
                    Sobremesas: <input type="text" name="dessert" class="form-control" id="dessert">
                    <br>
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