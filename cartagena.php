<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cartagena.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <title>Cartagena</title>
</head>
<body>
    <header>
            <!--header de inicio o menu de busqueda-->
         <nav class="navbar"><!--navegacion para mostrar contenido en la pagina, class para referenciarlo y llamarlo en el css -->

                <div class="nav-top">
                    
                    <ul class="Menu">
                        <li>
                            <a href="http://127.0.0.1:3000/index.html"> 
                                <img src="img/917154bf-c925-4b03-94c0-d906ba80fe0e-removebg-preview copy.png" alt="Escudo de Cartagena" class="escudo">
                            </a>
                        </li>
                    </ul>
            
                    <!-- Barra de búsqueda fuera del ul -->
                    <form class="buscar" action="/buscar" method="GET">
                        <div class="barra">
                            <button><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"><circle cx="11" cy="11" r="8"/><path d="m21 21l-4.3-4.3"/></g></svg></button>
                        </div>
                        <input type="text" placeholder="" name="query">
                    </form> 
                </div>
            
                <ul class="Menu">
                    <li class="link">
                        <a href="#actividades">Explora Cartagena de Indias</a>
                    </li>
                    <li class="link">
                        <a href="#exp" class="link">Experiencias</a>
                    </li>
                    <li class="link">
                        <a href="http://127.0.0.1:3000/contenido.html" class="link">Historia de Cartagena</a>
                    </li>
                    <li class="link">
                        <a href="formuContacto.php" class="link">Contacto</a>
                    </li>
                </ul>
            </nav>
             

    </header>
    <!--cuerpo de la pagina -->
    <main>
        <div class="intro">
            <h2 class="cosas"> <!--Segundo titulo-->
                Cosas que hacer en:
            </h2>          
            <h1 class="huno">Cartagena de <br> Indias <img src="img/F7Scribble.svg" alt="garabato" class="garabato"></h1><!--Primer titulo de la pagina-->
            <p class="pa"><!--parrafo de entrada de la pagina-->
                Piérdete en callejuelas laberínticas y pasa junto a muros históricos durante tu visita a este tesoro caribeño.
            </p>
        </div>

        <nav>
            <div class="galery">
                <div class="galeria">
                    <div class="imagen uno">
                        <a href="#actividades">
                            <p class="pe">Mejores Lugares</p>
                        </a>
                    </div>
                </div>
        
                <div class="galeria">
                    <div class="imagen dos">
                        <a href="blog.html">
                            <p class="pe">Ciudad</p>
                        </a>
                    </div>
                </div>
        
                <div class="galeria">
                    <div class="imagen tres">
                        <p class="pe">Aventura Marina</p>
                    </div>
                </div>
        
                <div class="galeria">
                    <div class="imagen cuatro">
                       <a href="cocina.html">
                        <p class="pe">Gastronomia</p>
                       </a> 
                    </div>
                </div>
        
                <div class="galeria">
                    <div class="imagen cinco">
                        <p class="pe">Turismo</p>
                    </div>
                </div>
        
                <div class="galeria">
                    <div class="imagen seis">
                        <p class="pe">Historia y Cultura</p>
                    </div>
                </div>
            </div>        
        </nav>

        <section class="division">
            <h2 id="actividades">Actividades destacadas</h2>
           
        <nav>
            <div class="pictures-container">

                <div class="card">
                    <div class="imge container-0"></div>
                        <div class="card-contenido">
                            <h3 class="rellenar">Recorrido nocturno centro y bares</h3>
                            <div class="relleno">
                                <p class="duration">7,5 horas</p>
                                <div class="rating">
                                   <p class="estrella">&#9733; </p>
                                        <p>4.7</p> 
                                   <p class="parentesis">(984)</p> 
                         </div>
                    </div>
                </div>
            </div>

                <div class="card">
                    <div class="imge container-1"></div>
                        <div class="card-contenido">
                            <h3 class="rellenar">Cartagena islas del Rosario y Snorkel</h3>
                            <div class="relleno">
                                <p class="duration">7,5 horas</p>
                                <div class="rating">
                                    <p class="estrella">&#9733; </p>
                                        <p>4.5 </p>
                                    <p class="parentesis">(1694)</p>
                            </div>
                        </div>
                </div>
            </div>
                

                <div class="card">
                    <div class="imge container-2"></div>
                        <div class="card-contenido">
                            <h3 class="relleno">Cartagena: Tour 5 Islas del Rosario</h3>
                            <div class="relleno">
                                <p class="duration">2,5 horas</p>
                                <div class="rating">
                                    <p class="estrella">&#9733; </p> 
                                        <p>4.9</p> 
                                    <p class="parentesis">(874)</p>
                            </div>
                        </div>
                </div>
            </div>
                

                <div class="card">
                    <div class="imge container-3"></div>
                        <div class="card-contenido">
                            <h3 class="rellenar"> Atracciones Acuaticas y comidas </h3>
                        <div class="relleno">
                            <p class="duration">10 horas - 2 días</p>
                                <div class="rating">
                                    <p class="estrella"> &#9733; </p>
                                        <p>3.4</p>
                                    <p class="parentesis">(71)</p>
                                </div>
                        </div>
                 </div>
            </div>
        </nav>
        </section>

     
        <section>
            <h2 id="exp">
                Experiencias Cautivadoras
            </h2>
        <nav>
                <div class="experiencias">
                        <div class="contenedor">
                            <div class="imag contenedores-1">
                                <div class="contexto">
                                    <p class="conte">Playa</p>
                                </div>
                            </div>
                        </div>        

                        <div class="contenedor">
                                <div class="imag contenedores-2">
                                    <div class="contexto">
                                        <p class="conte">Yate</p>
                                </div>
                            </div>
                        </div>


                        <div class="contenedor">
                                <div class="imag contenedores-3">
                                    <div class="contexto">
                                        <p class="conte">Snorkel</p>
                                </div>
                            </div>
                        </div>


                        <div class="contenedor">
                                <div class="imag contenedores-4">
                                    <div class="contexto">
                                        <p class="conte">Jet Ski</p>
                                </div>
                            </div>
                        </div>


                        <div class="contenedor">
                                <div class="imag contenedores-5">
                                    <div class="contexto">
                                        <p class="conte">Arquitectura</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </nav>
        </section>

    </main>
    <footer>
        <div class="footer-section">
            <ul >
                <li><a href="formuContacto.php">Contacto</a></li>
                <li><a href="blog.html">Ciudad</a></li>
                <li><a href="contenido.html">Mas sobre Cartagena</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Redes Sociales</h3>
            <ul class="social-links">
                <li><a href="#"><img src="https://api.iconify.design/mdi:facebook.svg" alt="Facebook"></a></li>
                <li><a href="#"><img src="https://api.iconify.design/simple-line-icons:social-instagram.svg" alt="Instagram"></a></li>
                <li><a href="#"><img src="https://api.iconify.design/typcn:social-twitter.svg" alt="Twitter"></a></li>
            </ul>
        </div>
       
            <div class="footer-boton">
                <div class="copy">
                    <p>&copy; 2024-septiembre, Cartagena/Bolivar, Ocaña/Norte de Santander </p>
                </div>
            </div>

            
    
    </footer>
</body>
</html>