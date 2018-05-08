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

<body style="background-color:#fff">

    <?php

        session_start();
    ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 50; background-color:#243d5b">
        <div class="container">    
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
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
                            <li><a href=\"../php/login/finalizeLogin.php\"><i class=\"fa fa-comments fa-fw\"></i> Notificações</a></li>
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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw" ></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="font-color:#fff">
                        <li><a href="users.php"><i class="fa fa-user fa-fw"></i> Minha conta</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../php/login/finalizeLogin.php"><i class="fa fa-sign-out fa-fw"></i> Sair
                    </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <br>
                            <img src="../img/img_grupoamb2.jpg">
                        <br><br>
                        <!--<li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Painel</a>
                        </li>
                        
                        <li>
                            <a href="index.php"><i class="fa fa-comments fa-fw"></i> Notificações</a>
                        </li>-->
                       
                        <li>
                            <a href="events.php"><i class="fa fa-dashboard fa-fw"></i> Painel</a>
                        </li>
                        <li>
                            <a href="events.php"><i class="fa fa-comments fa-fw"></i> Notificações</a>
                        </li>
                        <li>
                            <a href="events.php"><i class="fa fa-table fa-fw"></i> Eventos</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <br><br>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    echo "<h1 class=\"page-header\">Bem vindo, ".$_SESSION['name']."</h1>";
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Atualizações
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline">
                            <?php

                            require_once("../connection/connection.php");
                            $database = connection_db();
                            $query = mysqli_query($database,"SELECT * FROM notifications ORDER BY time_notification DESC LIMIT 5;");
                            while($row = mysqli_fetch_assoc($query))
                            {       
                                $data = array('Select'=>$row);
                            
                            $json = json_encode($data);
                            $obj = json_decode($json,true);
                            foreach($obj as $id)
                            {
                            $title = $id['title_notification'];
                            $text = $id['text_notification'];
                            }
                            
                            echo " <li>
                            <div class=\"timeline-badge\"><i class=\"fa fa-clock-o\"></i>
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <h4 class=\"timeline-title\">$title</h4>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>$text</p>
                                </div>
                            </div>
                            
                        </li>";
                        }
                            ?> 
                               
                              
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <i class="fa fa-cloud fa-fw"></i> Clima atual
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                            <div class="list-group">
                            
                                
                            </div>
                            
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    

                <!-- /.col-lg-4 -->
            </div>
            <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <i class="fa fa-birthday-cake fa-fw"></i> Aniversariantes do mês
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                            <div class="list-group">
                                
                                    <?php
                                        require_once("../connection/connection.php");
                                        $database = connection_db();
                                        $today = date('m');
                                        $date1 = "";
                                        $name = "";
                                        $data = array();
                                        $query = mysqli_query($database,"SELECT * FROM users WHERE MONTH(birthday_user) = '$today' ORDER BY birthday_user ASC;");
                                        while($row = mysqli_fetch_assoc($query))
                                        {
                                            $data = array('Select'=>$row);
                                            $json = json_encode($data);
                                        $obj = json_decode($json,true);
                                        foreach($obj as $id)
                                        {
                                        $id_person = $id['id_user'];
                                        $name = $id['name_user'];
                                        $second_name = $id['second_name_user'];
                                        $date1 = $id['birthday_user'];
                                        }
                                
                                        $date = preg_split('[-]', $date1);
                                        
                                        echo "<a href=\"users_dados.php?id_person=$id_person\" class=\"list-group-item\">
                                        <i class=\"fa fa-bithday fa-fw\"></i>".$name." ".$second_name."<b><span class=\"pull-right text-muted small\"><em>$date[2]/$date[1]</em>
                                        </span></b>
                                        </a>";
                                        }
                                        
                                    ?>
                                
                                
                            </div>
                            
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    

                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
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
