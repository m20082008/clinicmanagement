<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    <div class="sidebar-wrapper" id="sideLinks">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    مدریت کلینیک
                </a>
            </div>
            <ul class="nav">
                <li class="" id="dashboard">
                    <a href="index.php" class="menu-link">
                        <i class="ti-dashboard"></i>
                        <p>داشبورد</p>
                    </a>
                </li>
                <li class="" id="adminPage">
                    <a href="admins.php" class="menu-link">
                        <i class="ti-dashboard"></i>
                        <p>مدیریت ادمین ها</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

<div class="main-panel">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bar1"></span>
					<span class="icon-bar bar2"></span>
					<span class="icon-bar bar3"></span>
				</button>
				<a class="navbar-brand" href="#">سیستم یکپارچه مدیریت کلینیک مکتب</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="ti-user"></i>
						<p class="notification"></p>
						<p><strong><?php echo $_SESSION["admin"]."خوش آمدید"; ?></strong></p>
						<b class="caret"></b>   
						</a>
						<ul class="dropdown-menu">
						<li>
						<a href="logout.php"><i class="fa fa-power-off"></i> <strong>خروج</strong></a>
						</li>
						</ul>
					</li>
				</ul>
				</li>
				</ul>
			</div>
		</div>
	</nav>