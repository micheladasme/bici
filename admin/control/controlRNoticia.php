  <?php //agrega noticias
        if(isset($_POST['añadir'])) // Si el boton de "añadir" fué presionado ejecuta el resto del código

        {
            $titulo = $_POST['titulo']; // Recibimos el valor del <input name="titulo"...
            $texto = $_POST['cuerpo'];   // Recibimos el valor de la <textarea name="titulo"...
            if(!empty($titulo) && !empty($texto)) // Comprobamos que los valores recibidos no son NULL
            {
                $query_NuevaNoticia = mysql_query("INSERT INTO noticias SET no_titulo = '".$titulo."', no_fecha = SYSDATE(),no_cuerpo = '".$texto."'"); // Realizamos una consulta a la base de datos para insertar la nueva notica

                if($query_NuevaNoticia)
                {
                  
   
                    echo  "<script>alert('Noticia Publicada!');</script>";  // Si el registro (la noticia) se insertó en la base de datos, mostramos este mensaje
                }
                else
                {
                   echo  "<script>alert('Noticia NO Publicada!');</script>"; // Si el registro (la noticia) no se insertó en la base de datos, mostramos este mensaje
                }
            }

        }
    ?>