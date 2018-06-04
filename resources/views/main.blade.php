<!DOCTYPE html>
@include("pages.head")
<style>
.nav-sidebar { 
	width: 100%;
	padding: 8px 0; 
	border-right: 1px solid #ddd;
}
.nav-sidebar a {
	color: #333;
	-webkit-transition: all 0.08s linear;
	-moz-transition: all 0.08s linear;
	-o-transition: all 0.08s linear;
	transition: all 0.08s linear;
	-webkit-border-radius: 4px 0 0 4px; 
	-moz-border-radius: 4px 0 0 4px; 
	border-radius: 4px 0 0 4px; 
}
.nav-sidebar .active a { 
	cursor: default;
	background-color: #428bca; 
	color: #fff; 
	text-shadow: 1px 1px 1px #666; 
}
.nav-sidebar .active a:hover {
	background-color: #428bca;   
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
	white-space: nowrap;
	overflow: hidden;
	-o-text-overflow: ellipsis;
	text-overflow: ellipsis; 
}

/* Right-aligned sidebar */
.nav-sidebar.pull-right { 
	border-right: 0; 
	border-left: 1px solid #ddd; 
}
.nav-sidebar.pull-right a {
	-webkit-border-radius: 0 4px 4px 0; 
	-moz-border-radius: 0 4px 4px 0; 
	border-radius: 0 4px 4px 0; 
}
</style>
<body style="padding-top: 50px">
	<div class="container-full">
		<div class="container-fluid">
			<nav class="navbar navbar-default navbar-fixed-top">

				<div class="navbar-header">
					<p class="navbar-text navbar-right">Controle de tarefas - IENE - release 5</p>
				</div>
			</nav>	
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<nav class="nav-sidebar">
							<ul class="nav">
								<li class="active"><a href="javascript:;">Menu</a></li>
								<li><a href="/tarefas">Tarefas</a></li>
								<li><a href="javascript:;">Blocks</a></li>
								<li><a href="javascript:;">Usuários</a></li>
								<li><a href="javascript:;">Burndown</a></li>
								<li class="nav-divider"></li>
								<li><a href="javascript:;">Trocar time</a></li>
								<li class="nav-divider"></li>
								<li><a href="javascript:;"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-10">
						@yield("content")
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
@yield("post-script")
</html>