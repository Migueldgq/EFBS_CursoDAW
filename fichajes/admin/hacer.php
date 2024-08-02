<?php
	
	$opcion = $_GET["op"];
	include("conexion.php");
	switch($opcion)
	{
		case "r":	
					//vamos a tener que registrar
					$nom = $_POST["nombre"];
					$ema = $_POST["correo"];
					$pas = password_hash($_POST["contra"],PASSWORD_DEFAULT);
					$sql = "INSERT INTO administradores (nom_adm, email_adm, pass_adm) VALUES ('$nom','$ema','$pas')";
					if($conexion->query($sql))
					{
						echo "<script>
								alert('Administrador grabado');
								window.location.href='index.html';
							</script>";
					}
					else
					{
						echo "<script>
							alert('Ocurrió un error');
							window.location.href='index.html';	
						</script>";
					}

					break;

		case "l":
					//vamos a tener que loguear
					$ema = $_POST["correo"];
					$pas = $_POST["contra"];
					$sql = "SELECT * FROM administradores WHERE email_adm = '$ema'";
					$ejecutar = $conexion->query($sql);
					if($ejecutar->num_rows > 0)
					{
						//SE ENCONTRÓ EL EMAIL
						foreach($ejecutar as $registro)
						{
							$id = $registro["id_adm"];
							$pasbd = $registro["pass_adm"];
						}
						if(password_verify($pas, $pasbd))
						{
							session_start();
							$_SESSION['administrador'] = $id;
							header("location:indexprivado.php");
						}
						else
						{
							//contraseña mal
							echo "<script>
									alert('Datos mal')
									window.location.href='index.html'
							</script>";
						}
					}
					else
					{
						//no se encontró el email. ERROR de EMAIL
						echo "<script>
									alert('Datos mal')
									window.location.href='index.html'
							</script>";
					}
					break;

		case "h":
					//alta de horarios
					$hora = $_POST["hor"];
					$min = $_POST["min"];
					$hi = "$hora:$min:00";
					$hf = $_POST['horaf'];
					$hm = $_POST['horam'];
					$sql = "INSERT INTO horarios (ini_hor,fin_hor,max_hor) VALUES ('$hi','$hf','$hm')";
					if($conexion->query($sql))
					{
						echo "<script>
							alert('Horario registrado');
							window.location.href='indexprivado.php';
						</script>";
					}
					else
					{
						echo "<script>
							alert('Ocurrió un error');
							window.location.href='formhorario.php';
						</script>";
					}
					break;

		case "t":
					//alta trabajadores
					$nom = $_POST['nombre'];
					$ape = $_POST['apellidos'];
					$dni = $_POST['dni'];
					$hor = $_POST['horario'];
					$sql = "INSERT INTO trabajadores (nom_tra, ap_tra, dni_tra, id_hor) VALUES ('$nom','$ape','$dni','$hor')";
					if($conexion->query($sql))
					{
						echo "<script>
							alert('Trabajador registrado');
							window.location.href='indexprivado.php';
						</script>";
					}
					else
					{
						echo "<script>
							alert('Ocurrió un error');
							window.location.href='formtrabajador.php';
						</script>";
					}
					break;

		case "dh":
					$sql = "SELECT * FROM horarios";
					$ejecutar = $conexion->query($sql);
					foreach($ejecutar as $registro)
					{
						$id = $registro["id_hor"];
						$ini = $registro["ini_hor"];
						$fin = $registro["fin_hor"];
						echo "<option value='$id'>Inicio: $ini Fin: $fin</option>";
					}
					break;

		case "i":
					$des = $_POST['descripcion'];
					$sql = "INSERT INTO incidencias (descripcion_inc) VALUES ('$des')";
					
					if($conexion->query($sql))
					{
						echo "
								<script>
									alert('Incidencia registrada');
									window.location.href='indexprivado.php';
								</script>	
						";
					}
					else
					{
						echo "
							<script>
								alert('Ocurrió un error');
								window.location.href='formincidencia.php';
							</script>
						";
					}
					
					break;


	}
	




?>