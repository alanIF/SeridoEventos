 <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://4bsi.000webhostapp.com" class="btn btn-social btn-facebook btn-simple">4teto company ©</a>
                        </li>
                        
                    
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> Desenvolvido por Janailton Galvão e Alan Tavares</a>
                </div>
            </div>
        </footer>
    </div>
</div>

        <div class="collapse navbar-collapse off-canvas-sidebar" data-background-color="white" data-active-color="danger"><div class="sidebar-wrapper"><div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Seridó Eventos Universitários
                </a>
            </div>
             <ul class="nav">
                <li class="active">
                    <a href="Menu.php">
                        <i class="ti-panel"></i>
                        <p>Painel de Controle</p>
                    </a>
                </li>
                <li>
                    <a href="Evento_listar.php">
                        <i class=" ti-view-list-alt"></i>
                        <p>Meus Eventos</p>
                    </a>
                </li>
                <?php
                if(permissao()==TRUE){
                   echo'
                <li>
                    <a href="Usuario_listar.php">
                        <i class=" ti-user"></i>
                        <p>Usuários</p>
                    </a>
                </li>';
                }
              ?>
                     <li>
                    <a href="profile.php">
                        <i class=" ti-panel"></i>
                        <p>Meus Dados</p>
                    </a>
                </li>
            </ul>
            
            
            
            
            
            </div></div>
</body>

     

	

</html>