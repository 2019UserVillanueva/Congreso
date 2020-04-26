<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="shortcut icon" href="img/alexcgdesign.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/boostrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
	<title>Formulario</title>
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
	<?php
	    	  


    if(isset($_POST['enviar'] )){

    	

    	$arreglocheck =$_POST['check'];
    	$count =count($arreglocheck);


        $cuerpo = '
        <!DOCTYPE html>
        <html>
        <head>
         <title></title>
        </head>
        <body>
        '."<strong>Institución a la que pertenece: </strong> ".$_POST['cuerpo']."<br>".'
        '."<strong>Dirección Electrónica: </strong> ".$_POST['correo_alt']."<br>".'
        '."<strong>Dirección Postal: </strong> ".$_POST['postal']."<br>".' 

        '."<h3>Autor 1: </h3><br><strong>Nombre: </strong> ".$_POST['autor1']."<br>".'	
        '."<strong>Apellido del autor: </strong> ".$_POST['ape_au1']."<br>".'
        '."<strong>Institución a la que pertenece: </strong> ".$_POST['inst_au1']."<br>".' 
        '."<strong>Dirección Electrónica: </strong> ".$_POST['correo_au1']."<br>".' 


        '."<h3>Coautor 1: </h3><br><strong>Nombre: </strong> ".$_POST['name_coautor1']."<br>".'	
        '."<strong>Apellido del coautor: </strong> ".$_POST['ape_coautor1']."<br>".'
        '."<strong>Institución a la que pertenece: </strong> ".$_POST['inst_coautor1']."<br>".'
        '."<strong>Dirección Electrónica: </strong> ".$_POST['corre_coa1']."<br>".' 

        '."<h3>Coautor 2: </h3><br><strong>Nombre: </strong> ".$_POST['name_coautor2']."<br>".'	
        '."<strong>Apellido del coautor: </strong> ".$_POST['ape_coautor1']."<br>".'
        '."<strong>Institución a la que pertenece: </strong> ".$_POST['inst_coautor2']."<br>".'
        '."<strong>Dirección Electrónica: </strong> ".$_POST['corre_coa2']."<br>".' 

        '."<h3>Coautor 3: </h3><br><strong>Nombre: </strong> ".$_POST['name_coautor3']."<br>".'	
        '."<strong>Apellido del coautor: </strong> ".$_POST['ape_coautor3']."<br>".'
        '."<strong>Institución a la que pertenece: </strong> ".$_POST['inst_coautor3']."<br>".'
        '."<strong>Dirección Electrónica: </strong> ".$_POST['corre_coa3']."<br>".' 


        '."<strong>Archivo : </strong> "."<br>".' 

        '."<strong>Resumen: </strong> ".$_POST['resumen']."<br>".' 




       


        </body>
        </html>';

        //para el envío en formato HTML
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        //dirección del remitente
        $headers .= "From: ".$_POST['nombre']." <".$_POST['emisor'].">\r\n";

        //Una Dirección de respuesta, si queremos que sea distinta que la del remitente
        $headers .= "Reply-To: ".$_POST['emisor']."\r\n";

        //Direcciones que recibián copia
        //$headers .= "Cc: ejemplo2@gmail.com\r\n";

        //direcciones que recibirán copia oculta
        //$headers .= "Bcc: ejemplo3@yahoo.com\r\n";
        if(mail($_POST['receptor'],$_POST['titulo'],$cuerpo,$headers)){
    		echo "<script>alert('Función \"mail()\" ejecutada, por favor verifique su bandeja de correo.');</script>";
    	}else{
    		echo "<script>alert('No se pudo enviar el mail, por favor verifique su configuracion de correo SMTP saliente.');</script>";
    	}
    }
?>
	<form method="post" enctype="multipart/form-data">
	<div class="container">

		<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Para: </label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <div class="control">
	        <input class="input is-danger" required="email" type="email" name="receptor"type="text" placeholder="Ingrese Email Destinatario">
	      </div>
	     
	    </div>
	  </div>
	</div>

		<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Título</label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <div class="control">
	        <input class="input is-danger" required="" name="titulo"type="text" placeholder="Ingrese Título">
	      </div>
	      <p class="help is-danger">
	        ¡Este Dato Es Obligatorio!
	      </p>
	    </div>
	  </div>
	</div>


		<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Autor Corresponsal</label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" name ="nombre" type="text" required="" placeholder="Nombre Del Autor">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>
	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input is-success" name ="emisor" type="email" required="email" placeholder="Ingrese Correo Electrónico" value="">
	        <span class="icon is-small is-left">
	          <i class="fas fa-envelope"></i>
	        </span>
	        <span class="icon is-small is-right">
	          <i class="fas fa-check"></i>
	        </span>
	      </p>
	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" name ="cuerpo" required="required" type="text" placeholder="Institución  a la que pertenece">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>
	    </div>
	  </div>


	</div>

	<div class="field is-horizontal">
  <div class="field-label"></div>
  <div class="field-body">
    <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">

          <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input is-success" type="email" name="correo_alt" placeholder="Ingrese Dirección Electrónica" value="">
	        <span class="icon is-small is-left">
	          <i class="fas fa-envelope"></i>
	        </span>
	        <span class="icon is-small is-right">
	          <i class="fas fa-check"></i>
	        </span>
	      </p>

        </p>

      </div>
    </div>
  </div>

</div>
<div class="field is-horizontal">
  <div class="field-label"></div>
  <div class="field-body">
    <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">

          <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input " type="text" required="required" name="postal" placeholder="Ingrese Dirección Postal" value="">

	      </p>

        </p>

      </div>
    </div>
  </div>

</div>


<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Primer Autor</label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" type="text" required="required" name="autor1" placeholder="Nombre Del Autor">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>

	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input " type="text" required="" name="ape_au1" placeholder="Apellido Del Autor" value="">

	      </p>
	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" type="text" required="" name="inst_au1" placeholder="Institución  a la que pertenece">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>
	    </div>
	  </div>


	</div>

<div class="field is-horizontal">
  <div class="field-label"></div>
  <div class="field-body">
    <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">

          <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input is-success" type="email" required="email" name="correo_au1" placeholder="Ingrese Dirección Electrónica" value="">
	        <span class="icon is-small is-left">
	          <i class="fas fa-envelope"></i>
	        </span>
	        <span class="icon is-small is-right">
	          <i class="fas fa-check"></i>
	        </span>
	      </p>

        </p>

      </div>
    </div>
  </div>

</div>

<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Coautor 1</label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" type="text" required=""  name="name_coautor1" placeholder="Nombre Del Coautor ">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>

	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input " type="text" required=""  name="ape_coautor1" placeholder="Apellido Del Coautor" value="">

	      </p>
	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" type="text"  name="inst_coautor1"" placeholder="Institución  a la que pertenece">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>
	    </div>
	  </div>

</div>

<div class="field is-horizontal">
  <div class="field-label"></div>
  <div class="field-body">
    <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">

          <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input is-success" type="email" required="" name="corre_coa1" placeholder="Ingrese Dirección Electrónica" value="">
	        <span class="icon is-small is-left">
	          <i class="fas fa-envelope"></i>
	        </span>
	        <span class="icon is-small is-right">
	          <i class="fas fa-check"></i>
	        </span>
	      </p>

        </p>

      </div>
    </div>
  </div>

</div>


<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Coautor 2</label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" type="text" required="" name="name_coautor2" placeholder="Nombre Del Coautor ">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>

	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input " type="text" required="" name="ape_coautor2" placeholder="Apellido Del Coautor" value="">

	      </p>
	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" type="text" required="" name="inst_coautor2" placeholder="Institución  a la que pertenece">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>
	    </div>
	  </div>

</div>
<div class="field is-horizontal">
  <div class="field-label"></div>
  <div class="field-body">
    <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">

          <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input is-success" type="email" required="" name="corre_coa2" placeholder="Ingrese Dirección Electrónica" value="">
	        <span class="icon is-small is-left">
	          <i class="fas fa-envelope"></i>
	        </span>
	        <span class="icon is-small is-right">
	          <i class="fas fa-check"></i>
	        </span>
	      </p>

        </p>

      </div>
    </div>
  </div>

</div>

<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Coautor 3</label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" type="text" required="" name="name_coautor3" placeholder="Nombre Del Coautor ">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>

	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input " type="text" required="" name="ape_coautor3" placeholder="Apellido Del Coautor" value="">

	      </p>
	    </div>
	    <div class="field">
	      <p class="control is-expanded has-icons-left">
	        <input class="input" type="text" required="" name="inst_coautor3" placeholder="Institución  a la que pertenece">
	        <span class="icon is-small is-left">
	          <i class="fas fa-user"></i>
	        </span>
	      </p>
	    </div>
	  </div>

</div>

	<div class="field is-horizontal">
  <div class="field-label"></div>
  <div class="field-body">
    <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">

          <p class="control is-expanded has-icons-left has-icons-right">
	        <input class="input is-success" type="email" required="" name="corre_coa3" placeholder="Ingrese Dirección Electrónica" value="">
	        <span class="icon is-small is-left">
	          <i class="fas fa-envelope"></i>
	        </span>
	        <span class="icon is-small is-right">
	          <i class="fas fa-check"></i>
	        </span>
	      </p>

        </p>

      </div>
    </div>
  </div>

</div>


<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Palabras Clave (Máx. 5)</label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <div class="control ">
	      	<label class="checkbox">
	      		<input type="checkbox" name="check[]" value="1">
	      		 Diseño de elementos de máquinas
	      		 <input type="checkbox" name="check[]"  value="2">
	      		 Máquinas y herramientas
	      		 <input type="checkbox" name="check[]" value=" 3">
	      		 Sistemas mecatrónicos
	      		 <input type="checkbox" name="check[]" value="4">
	      		 Automatización
	      		 <input type="checkbox" name="check[]" value="5">
	      		 Flujo de fluidos
	      		 <input type="checkbox" name="check[]" value="6">
	      		 Sistemas térmicos
	      		 <input type="checkbox" name="check[]" value="7">
	      		 Modelado y simulación
	      		 <input type="checkbox" name="check[]" value="8">
	      		 Robótica
	      		 <input type="checkbox" name="check[]" value=" 9">
	      		 Energías renovables
	      		 <input type="checkbox" name="check[]" value="10">
	      		 Eficiencia energética
	      		 <input type="checkbox" name="check[]" value="11">
	      		Instrumentación y control
	      		 <input type="checkbox" name="check[]" value="12">
	      		 Mecánica automotriz
	      		 <input type="checkbox" name="check[]" value="13">
	      		Refrigeración y aire acondicionado
	      		 <input type="checkbox" name="check[]" value="14">
	      		Máquinas mecánicas y motores
	      		 <input type="checkbox" name="check[]" value="15">
	      		 Procesos de manufactura y materiales

	      	</label>

	      </div>

	    </div>

	  </div>

</div>








	<div class="field is-horizontal">
	  <div class="field-label is-normal">
	    <label class="label">Resumen</label>
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <div class="control">
	        <textarea class="textarea" name="resumen" required="" placeholder="200 Palabras Máximo"></textarea>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="field is-horizontal">
	  <div class="field-label">
	    <!-- Left empty for spacing -->
	  </div>
	  <div class="field-body">
	    <div class="field">
	      <div class="control">
	        <input type="submit" class="button is-primary" name="enviar" value="enviar"> 
	      </div>
	    </div>
	  </div>
	</div>
	<br>


</div>
</form>
<footer>

		<h2 class="titulo-final">&copy; Universidad Autónoma De Campeche</h2>
</footer>


</body>
</html>
