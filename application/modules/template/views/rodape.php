                    </div>
                    <!-- Begin Page Footer-->
                    <footer class="main-footer">
                        <div class="row">
                            <div class="col-sm-12 m--align-center">
                                TAREFAS
                            </div>
                            <div class="col-sm-12 m--align-center">
                                <a target="" href="#">Site Institucional</a>
                                <a href="#">Fale Conosco</a>
                            </div>
                            <div class="col-sm-12 m--align-center">
                                <p>Rua xxx xxx, 01 - CEP: 99.500-000 - Carazinho / RS - Fones: (xx) xxxx-xxxx / (xx) xxxx-xxxx</p>
                            </div>
                        </div>
                    </footer>
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                </div>
                <!-- End Content -->
            </div>
            <!-- End Page Content -->
        </div>


        <script src="<?php echo base_url('assets/js/components/sweetalert2/sweetalert2.js');?>"></script>
        <?php if ($this->session->flashdata('mensagem_swal')) { $swal = $this->session->flashdata('mensagem_swal'); ?>
            <script type="text/javascript">Swal.fire ({  title: "<?php echo $swal['titulo'];?>" , html: "<?php echo $swal['mensagem'];?>" , type: "<?php echo $swal['tipo'];?>", confirmButtonClass: 'btn azul-principal' })</script>
        <?php } ?>

        <?php if (isset($js)) { foreach($js as $j) { ?>
            <script src="<?php echo $j;?>" type="text/javascript"></script>
        <?php } } ?>

    </body>

    
</html>