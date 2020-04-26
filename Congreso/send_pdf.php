<?php
if (isset($_FILES) && (bool) $_FILES) {

    $allowedExtensions = array("pdf", "doc", "docx", "gif", "jpeg", "jpg", "png");

    $files = array();
    foreach ($_FILES as $name => $file) {
        $file_name = $file['name'];
        $temp_name = $file['tmp_name'];
        $file_type = $file['type'];
        $path_parts = pathinfo($file_name);
        $ext = $path_parts['extension'];
        if (!in_array($ext, $allowedExtensions)) {
            die("File $file_name has the extensions $ext which is not allowed");
        }
        array_push($files, $file);
    }

    // email fields: to, from, subject, and so on
    $to = $_POST['email'];
    $from = "lv428694@gmail.com";
    $subject = $_POST['sub'];
    $message = $_POST['msg'];
    $headers = "From: $from";

    // boundary 
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    // multipart boundary 
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    $message .= "--{$mime_boundary}\n";

    // preparing attachments
    for ($x = 0; $x < count($files); $x++) {
        $file = fopen($files[$x]['tmp_name'], "rb");
        $data = fread($file, filesize($files[$x]['tmp_name']));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $name = $files[$x]['name'];
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
                "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$mime_boundary}\n";

        

    }
    // send

    $ok = mail($to, $subject, $message, $headers);
    if ($ok) {
         echo "<script>alert('Formulario enviado exitosamente a $to');</script>";
    } else {
         echo "<script>alert('El Correo No Pudo Ser Enviado');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    
      <title>Subir Archivo</title>
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      

      <link rel="shortcut icon" href="img/alexcgdesign.png" type="image/x-icon">
      <link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="css/bulma.css">
      <link rel="stylesheet" href="css/boostrap.css">
 
    
  </head>
  
  <body>
    <header>
      <nav>
                  <a href="index.php">Inicio</a>
  				<a href="inf_gral.php">Información General</a>
  				<a href="programa.php">Programa</a>
  				<a href="areas.php">Áreas </a>
  				<a href="resumenes.php">Resúmenes </a>
  				<a href="congreso.php">El Congreso </a>
  				<a href="send_pdf.php">Afiche </a>
  				<a href="form.php">Registro </a>

      </nav>
      <section class="textos-header">
          <h1>X Congreso Latinoamericano de Ingeniería</h1>

      </section>
      <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
              style="height: 100%; width: 100%;">
              <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                  style="stroke: none; fill: #fff;"></path>
          </svg></div>
  </header>
  <br>

  <form method="post" action="" enctype="multipart/form-data">
  <div class="container">

      
   <h1 align="center">Subir Archivo</h1>  
    <div class="field">
      <label class="label">Email</label>
      <div class="control has-icons-left has-icons-right">
        <input class="input is-danger" type="email" name="email" required="" placeholder="Correo Electrónico" >
        <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
      </div>
     
    </div>

    <div class="field">
        <label class="label">Asunto</label>
        <div class="control">
          <input class="input" type="text" name="sub"  required="" placeholder="Ingrese Asunto Del Correo">
        </div>
     </div>

     <div class="field">
        <label class="label">Mensaje</label>
        <div class="control">
          <textarea class="textarea" name="msg" placeholder="Decriba Mensaje"></textarea>
        </div>
     </div>

     <div class="file">
  <label class="file-label">
    <input class="file-input" type="file" required="" name="attach1">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fas fa-upload"></i>
      </span>
      <span class="file-label">
        Seleccionar Archivo…
      </span>
    </span>
  </label>
</div>
<br>

   
    
    <div class="field is-grouped">
      <div class="control">
        <input type="submit" class="button is-primary" name="enviar" >
      </div>
      
    </div>
  </div>
</form>
        
      
    
    
   
    <footer>

    <h2 class="titulo-final">&copy; Universidad Autónoma De Campeche</h2>
</footer>

  </body>
</html>