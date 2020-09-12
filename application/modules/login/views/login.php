<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tarefas</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="assets/css/animate/animate.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body class="bg-white">
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 my-auto no-padding">
                    <div class="authentication-form-2 mx-auto">
						<div class="logo-centered" style="margin-bottom: 50px;">
                            <h2 style="font-size: 50px;">Tarefas</h2>
                        </div>
                        <div class="tab-content" id="animate-tab-content">
                            <div role="tabpanel" class="tab-pane show active" id="singin" aria-labelledby="singin-tab">
                                <h3>Entrar no Sistema</h3>
                                <form method="post" action="<?php echo base_url('login/autenticar');?>">
                                    <div class="group material-input">
        							    <input type="text" required name="login" value="<?php if ($this->session->flashdata('login')) { echo $this->session->flashdata('login'); } ?>">
        							    <span class="highlight"></span>
        							    <span class="bar"></span>
        							    <label>Usuário</label>
                                    </div>
                                    <div class="group material-input">
        							    <input type="password" required name="senha">
        							    <span class="highlight"></span>
        							    <span class="bar"></span>
        							    <label>Senha</label>
                                    </div>
                                    <div class="sign-btn text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-2">
                                            Entrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <script src="assets/vendors/js/app/app.min.js"></script>
        <script src="assets/js/components/tabs/animated-tabs.min.js"></script>
        <script src="<?php echo base_url('assets/js/components/sweetalert2/sweetalert2.js');?>"></script>
        <?php if ($this->session->flashdata('mensagem_swal')) { $swal = $this->session->flashdata('mensagem_swal'); ?>
            <script type="text/javascript">Swal.fire ({  title: "<?php echo $swal['titulo'];?>" , html: "<?php echo $swal['mensagem'];?>" , type: "<?php echo $swal['tipo'];?>", confirmButtonClass: 'btn azul-principal' })</script>
        <?php } ?>
    </body>
</html>