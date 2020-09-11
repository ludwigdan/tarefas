<body id="page-top">
	<div class="page">
            <header class="header">
                <nav class="navbar fixed-top">
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="<?php echo base_url('inicial'); ?>" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    TAREFAS
                                </div>
                            </a>
                            <a id="toggle-btn" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right cor-verde">
              
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                <div class="icone-perfil ">D</div>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url('inicial/alterar_senha')?>" class="dropdown-item"> 
                                            Meus Dados
                                        </a>
                                    </li>

                                    <li class="separator"></li>
                                    <li><a rel="nofollow" href="<?php echo base_url('login/sair')?>" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                                </ul>
                            </li>
                            <!-- End User -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <div class="page-content d-flex align-items-stretch">
            	<div class="default-sidebar">
            		<nav class="side-navbar box-scroll sidebar-scroll">
            			<ul class="list-unstyled">
                            <li><a href="#dropdown-workflow" aria-expanded="false" data-toggle="collapse"><i class="la la-home"></i><span>Tarefas</span></a>
                            <ul id="dropdown-workflow" class="collapse list-unstyled pt-0">
                                <li><a href="#">Minhas Tarefas</a></li>
                                <li><a href="#">Minhas Solicitações</a></li>
                            </ul>
                            <li><a href="#dropdown-cadastro" aria-expanded="false" data-toggle="collapse"><i class="la la-edit"></i><span>Cadastros</span></a>
                            <ul id="dropdown-cadastro" class="collapse list-unstyled pt-0">
                                <li><a href="#">Grupos</a></li>
                                <li><a href="#">Funcionários</a></li>
                                <li><a href="#">Setores</a></li>
                            </ul>
            			</ul>
            		</nav>
            	</div>

                <div class="content-inner">
                    <div class="container-fluid container-mobile" id="corpo">