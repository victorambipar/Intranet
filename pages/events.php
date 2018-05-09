
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

    <link href="../dist/css/events.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
  
#wrap {
  width: 1100px;
  margin: 0 auto;
  }
  
#external-events {
  float: left;
  width: 150px;
  padding: 0 10px;
  text-align: left;
  }
  
#external-events h4 {
  font-size: 16px;
  margin-top: 0;
  padding-top: 1em;
  }
  
.external-event { /* try to mimick the look of a real event */
  margin: 10px 0;
  padding: 2px 4px;
  background: #3366CC;
  color: #fff;
  font-size: .85em;
  cursor: pointer;
  }
  
#external-events p {
  margin: 1.5em 0;
  font-size: 11px;
  color: #666;
  }
  
#external-events p input {
  margin: 0;
  vertical-align: middle;
  }
#calendar {
/* 		float: right; */
      margin: 0 auto;
  width: 900px;
  background-color: #FFFFFF;
    border-radius: 6px;
      box-shadow: 0 1px 2px #C3C3C3;
  -webkit-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
-moz-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
  }
</style>


</head>

<body>

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
			 			session_start();
                        if($_SESSION['permission'] == 2)
                        {
                            echo "<li class=\"dropdown\">
                            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                            <i class=\"fa fa-gear    fa-fw\" ></i> <i class=\"fa fa-caret-down\"></i>
                        </a>
                        <ul class=\"dropdown-menu dropdown-user\" style=\"font-color:#fff\">
                            <li><a href=\"users.php\"><i class=\"fa fa-clock-o fa-fw\"></i> Atualizações</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li><a href=\"users_dados_admin.php\"><i class=\"fa fa-users fa-fw\"></i> Usuários</a></li>
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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw" ></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="font-color:#fff">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Minha conta</a>
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
                        
                            <img src="../img/img_grupoamb2.jpg">
							<br><br>
                        
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Painel</a>
                        </li>
                        
                        <li>
                            <a href="tables.html"><i class="fa fa-comments fa-fw"></i> Notificações</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-table fa-fw"></i> Eventos</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
		</nav>
		
		

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
					<h1 class="page-header">Eventos</h1>
					
					<center>
        				<div id='wrap'>
							<div id='calendar'></div>
							<div style='clear:both'></div>
						</div>
					</center>
			
                </div>			
            </div>
		</div>
	</div>
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
	<script src="../dist/js/events.js"></script>
	<script>

	$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		/*  className colors
		
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		
		*/		
		
		  
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',
			
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			},
			
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false,
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/',
					className: 'success'
				}
			],			
		});
		
		
	});

</script>

    

</body>

</html>
