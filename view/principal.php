<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <title>Soporte T&eacute;cnico</title>
        <meta http-equiv="content-type" content="text/html" />
        <meta name="author" content="gencyolcu" />
        <link rel="stylesheet" type="text/css" href="../css/stylemenu.css" />        
        <script>
            function grand(h) {
                iframe = document.getElementById("fram")
                iframe.height = h;
            }
        </script>
    </head>
    <body>
        <?php
        $uid = $_SESSION['id_tipousuario'];
        if ($uid == 1) {
            ?>
            <center>
                <div class="Navigation" align="center">
                    <div id="NavigationInside">

                        <ul>
                            <!--           home                  -->
                            <li><a href="home.php" target="fram">Home</a></li>
                            <!--           home                  -->

                            <li></li>

                            <!--           Mantenimiento         -->
                            <li><a href="">Mantenimiento</a>
                                <ul class="horizontal">
                                    <li><a href="manusuario.php" target="fram">Usuario</a>
                                        <!--div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Usuario</h2>
                                            <img src="../img/usuario.png" alt="Mac Mini" width="20%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href="areas.php" target="fram">&Aacute;reas</a></li>
                                                <li><a href="distrito.php" target="fram">Distrito</a></li>
                                                <li><a href="tusuario.php" target="fram">Tipo Usuario</a></li>
                                                <li><a href="persona.php" target="fram">Persona</a></li>
                                                <li><a href="usuario.php" target="fram">Usuarios</a></li>
                                            </ul>
                                        </div-->
                                    </li>
                                    <li><a href="manbien.php" target="fram">Bien</a>
                                        <!--div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Bien</h2>
                                            <img src="../img/producto.png" alt="iMac" width="20%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href="catb.php" target="fram">Categor&iacute;a Bien</a></li>
                                                <li><a href="marca.php" target="fram">Marca</a></li>
                                                <li><a href="modelo.php" target="fram">Modelo</a></li>
                                                <li><a href="bien.php" target="fram">Bien</a></li>
                                            </ul>
                                        </div-->
                                    </li>
                                    <li><a href="manincidencia.php" target="fram">Incidencia</a>
                                        <!--div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Incidencia</h2>
                                            <img src="../img/soporte.png" alt="Mac Pro" width="20%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href="catinc.php" target="fram">Categor&iacute;a Incidencia</a></li>
                                                <li><a href="estado.php" target="fram">Estado</a></li>
                                                <li><a href="prioridad.php" target="fram">Prioridad</a></li>
                                                <li><a href="asuinc.php" target="fram">Asunto Incidencia</a></li>
                                            </ul>
                                        </div-->
                                    </li>
                                </ul>
                            </li>
                            <!--           Mantenimiento         -->
                            <li></li>
                            <!--           Incidecnias           -->
                            <li><a href="">Incidencia</a>
                                <ul class="horizontal">
                                    <li><a href="incidencia.php" target="fram">Incidencia</a>
                                        <div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Incidencia</h2>
                                            <img src="../img/incidencia.png" alt="Mac Mini" width="20%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href="incidencia.php" target="fram">Incidencia</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--           Incidecnias           -->
                            <li style="display: none;"></li>
                            <!--           Requerimiento           -->
                            <li style="display: none;"><a href="">Requerimiento</a>
                                <ul class="horizontal">
                                    <li><a href="requerimiento.php" target="fram">Requerimiento</a>
                                        <div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Requerimiento</h2>
                                            <img src="../img/requerimiento.png" alt="Mac Mini" width="20%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href="requerimiento.php" target="fram">Requerimiento</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--           Requerimiento           -->
                            <li style="display: none;"></li>
                            <!--           Estados               -->
                            <li style="display: none;"><a href="">Estado</a>
                                <ul class="horizontal">
                                    <li><a href="controlestados.php" target="fram">Estado</a>
                                        <div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Estado</h2>
                                            <img src="../img/estados.png" alt="Mac Mini" width="20%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href="controlestados.php" target="fram">Estado</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--           Estados               -->
                            <li></li>
                            <!--           Reportes              -->
                            <li><a href="">Reportes</a>
                                <ul class="horizontal">
                                    <li><a href="reportes.php" target="fram">Reportes</a>
                                        <!--div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Reportes</h2>
                                            <img src="../img/reportes.jpg" alt="Mac Mini" width="30%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href="reportes.php" target="fram">Reportes</a></li>
                                            </ul>
                                        </div-->
                                    </li>
                                </ul>
                            </li>
                            <!--           Reportes              -->
                            <li></li>
                            <!--           Salir                 -->
                            <li><a href="../index.php">Salir</a></li>
                            <!--           Salir                 -->
                            <li></li>
                            <!--           Usuario               -->
                            <li><a href="">User</a>
                                <ul class="horizontal">
                                    <li><a href="">Usuario</a>
                                        <div class="extended">
                                            <h2>Usuario:</h2>
                                            <img src="../img/usuarios.png" alt="Mac Mini" width="30%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href=""><? echo $_SESSION["tipoadm"]; ?></a></li>
                                                <li><a href=""><? echo $_SESSION["user"]; ?></a></li>
                                                <li><a href="../index.php">Salir</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li> 
                            <!--           Usuario               -->
                        </ul>
                    </div>
                </div>
                <!-- -->		
                <?php
            } else if ($uid == 2) {
                ?>
                <!-- otro menu -->
                <div class="Navigation" align="center">
                    <div id="NavigationInside">

                        <ul>
                            <li></li><li></li><li></li><li></li>
                            <li></li><li></li><li></li><li></li>
                            <li></li><li></li><li></li><li></li>
                            <!--           home                  -->
                            <li><a href="home.php" target="fram">Home</a></li>
                            <!--           home                  -->

                            <li></li>

                            <!--           Incidecnias           -->
                            <?php $dato = $_SESSION["idusu"]; ?>
                            <li><a href="incidenciatec.php?id=<? echo $dato; ?>" target="fram">Incidencia</a>
                                <ul class="horizontal">
                                    <li><a href="incidenciatec.php?id=<? echo $dato; ?>" target="fram">Incidencia</a>
                                        <div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Incidencia</h2>
                                            <img src="../img/incidencia.png" alt="Mac Mini" width="20%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href="incidenciatec.php?id=<? echo $dato; ?>" target="fram">Incidencia</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--           Incidecnias           -->
                            <li style="display: none;"></li>
                            <!--           Requerimiento           -->
                            <li style="display: none;"><a href="">Requerimiento</a>
                                <ul class="horizontal">
                                    <li><a href="">Requerimiento</a>
                                        <div class="extended">
                                            <div class="arrow-up"></div>
                                            <h2>Requerimiento</h2>
                                            <img src="../img/requerimiento.png" alt="Mac Mini" width="20%" height="80%"/>
                                            <ul class="smallNav"><?php $dato = $_SESSION["idusu"]; ?>
                                                <li><a href="requerimientotec.php?id=<? echo $dato; ?>" target="fram">Requerimiento</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--           Requerimiento           -->
                            <li></li>
                            <!--           Salir                 -->
                            <li><a href="../index.php">Salir</a></li>
                            <!--           Salir                 -->
                            <li></li>
                            <!--           Usuario               -->
                            <li><a href="">User</a>
                                <ul class="horizontal">
                                    <li><a href="">Usuario</a>
                                        <div class="extended">
                                            <h2>Usuario:</h2>
                                            <img src="../img/usuarios.png" alt="Mac Mini" width="30%" height="80%"/>
                                            <ul class="smallNav">
                                                <li><a href=""><? echo $_SESSION["tipoadm"]; ?></a></li>
                                                <li><a href=""><? echo $_SESSION["user"]; ?></a></li>
                                                <li><a href="../index.php">Salir</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li> 
                            <!--           Usuario               -->
                        </ul>
                    </div>
                </div>
                <!-- otro menu -->
            </center>
            <!-- -->
            <?  } else {?>
            <!-- otro menu -->
            <div class="Navigation" align="center">
                <div id="NavigationInside">

                    <ul>
                        <li></li><li></li><li></li><li></li>
                        <li></li><li></li><li></li><li></li>
                        <li></li><li></li><li></li><li></li>
                        <!--           home                  -->
                        <li><a href="home.php" target="fram">Home</a></li>
                        <!--           home                  -->

                        <li></li>

                        <!--           Incidecnias           -->
                        <?php $dato = $_SESSION["idusu"]; ?>
                        <li><a href="incidenciatec.php?id=<? echo $dato; ?>" target="fram">Incidencia</a>
                            <ul class="horizontal">
                                <li><a href="incidenciatec.php?id=<? echo $dato; ?>" target="fram">Incidencia</a>
                                    <div class="extended">
                                        <div class="arrow-up"></div>
                                        <h2>Incidencia</h2>
                                        <img src="../img/incidencia.png" alt="Mac Mini" width="20%" height="80%"/>
                                        <ul class="smallNav">
                                            <li><a href="incidenciatec.php?id=<? echo $dato; ?>" target="fram">Incidencia</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!--           Incidecnias           -->
                        <li style="display: none;"></li>
                        <!--           Requerimiento           -->
                        <li style="display: none;"><a href="">Requerimiento</a>
                            <ul class="horizontal">
                                <li><a href="">Requerimiento</a>
                                    <div class="extended">
                                        <div class="arrow-up"></div>
                                        <h2>Requerimiento</h2>
                                        <img src="../img/requerimiento.png" alt="Mac Mini" width="20%" height="80%"/>
                                        <ul class="smallNav"><?php $dato = $_SESSION["idusu"]; ?>
                                        <li><a href="requerimientotec.php?id=<? echo $dato; ?>" target="fram">Requerimiento</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!--           Requerimiento           -->
                    <li></li>
                    <!--           Salir                 -->
                    <li><a href="../index.php">Salir</a></li>
                    <!--           Salir                 -->
                    <li></li>
                    <!--           Usuario               -->
                    <li><a href="">User</a>
                        <ul class="horizontal">
                            <li><a href="">Usuario</a>
                                <div class="extended">
                                    <h2>Usuario:</h2>
                                    <img src="../img/usuarios.png" alt="Mac Mini" width="30%" height="80%"/>
                                    <ul class="smallNav">
                                        <li><a href=""><? echo $_SESSION["tipoadm"]; ?></a></li>
                                        <li><a href=""><? echo $_SESSION["user"]; ?></a></li>
                                        <li><a href="../index.php">Salir</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li> 
                    <!--           Usuario               -->
                </ul>
            </div>
        </div>
        <!-- otro menu -->
    </center>
    <!-- -->
    <? } ?>
    <div style="text-align:center;">
        <iframe name="fram" src="home.php" width="1335" height="1500" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" border="0"></iframe>
    </div>
</body>
</html>