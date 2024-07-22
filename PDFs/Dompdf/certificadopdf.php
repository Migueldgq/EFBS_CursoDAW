<?php
    
    function damemes($m)
    {
      switch($m) {
        case '1':
          echo "enero";
          break;

        case '2':
          echo "febrero";
          break;

        case '3':
          echo "marzo";
          break;    
        
        case '4':
          echo "abril";
          break;
        case '5':
          echo "mayo";
          break;
        case '6':
          echo "junio";
          break;
        case '7':
          echo "julio";
          break;    
        case '8':
          echo "agosto";
          break;
        case '9':
          echo "septiembre";
          break;
        case '10':
          echo "octubre";
          break;
        case '11':
          echo "noviembre";
          break;
        case '12':
          echo "diciembre";
          break;          
      }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Certificado finalización de formación</title>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
      body{
        font-family: 'Poppins', sans-serif;
      }
      .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 10px;
        border-right: : 1px solid #6888ac;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 12px;
        line-height: 14px;
        font-family: 'Poppins', sans-serif;
        color: #555;
        

      }

      .recuadro {
        max-width: 800px;
        margin: auto;
        margin-top:10px;
        padding: 10px;
        border-left: 10px solid #6888ac;
        border-bottom: 10px solid #6888ac;
        /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);*/
        font-size: 10px;
        line-height: 10px;
        font-family: 'Poppins', sans-serif;
        color: #555;
        text-align:justify;
      }

      .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;

      }

      .invoice-box table td {
        padding: 2px;
        vertical-align: top;
      }

      .invoice-box table tr td:nth-child(2) {
        text-align: right;
      }

      .invoice-box table tr.top table td {
        padding-bottom: 10px;
      }

      .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
      }

      .invoice-box table tr.information table td {
        padding-bottom: 40px;
      }

      .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        text-align:left;
      }

      .invoice-box table tr.details td {
        padding-bottom: 20px;
        text-align:left;
      }

      .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
        text-align:left;
      }

      .invoice-box table tr.item.last td {
        border-bottom: none;
      }

      .invoice-box table tr.total td:nth-child(2) {
        
        
        font-weight: bold;
      }

      @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
          width: 100%;
          display: block;
          text-align: center;
        }

        .invoice-box table tr.information table td {
          width: 100%;
          display: block;
          text-align: center;
        }
      }

      /** RTL **/
      .invoice-box.rtl {
        direction: rtl;
        font-family: 'Poppins', sans-serif;
      }

      .invoice-box.rtl table {
        text-align: right;
      }

      .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
      }
    </style>
  </head>

  <body>
    <div class="invoice-box">
      <div class="recuadro">
      <table cellpadding="0" cellspacing="0">
        <tr class="information">
          <td colspan="7">
            <table>
              <tr>
                <td style="text-align: center;width:100%;">
                <b><h2 style="color: #6888ac">Certificado de finalización de formación</h2></b><br />
                
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr class="details">
          <td colspan="7">
            <table>
              <tr>
                <td style="text-align: center;width:100%;" colspan="7">
                <h4><b><font color="#6888ac"><?php echo $nombrealumno ?></font></b>, con dni <b><font color="#6888ac"><?php echo $dni?></font>, </b></h4>
                <h5>ha finalizado satisfactoriamente la formación: </h5>
                  <h3><b><font color="#6888ac"><i><?php echo $codificacioncurso."</i> - ".$nomcur ?></font></b></h3>
                  <h5>con una duración total de: <b><?php echo $horascur ?></b> horas</h5>
                  <h5>realizado entre las fechas  <b><?php echo $fechaini[2]."/".$fechaini[1]."/".$fechaini[0]?></b> y <b><?php echo $fechafin[2]."/".$fechafin[1]."/".$fechafin[0]?></b> en modalidad <i>online</i></h5>
                  <h6>Contenidos superados:</h6>
                  <h6>
                  <?php
                      foreach($datostema as $regtema)
                      {
                        echo $regtema["nom_tem"]."<br>";
                      }

                  ?>
                </h6>
                </td>
              </tr>
              
            </table>
          </td>
        </tr>
                        <tr class="details" style="text-align: center;">

                          <td style="width:100%;text-align: center;" colspan="7"><h6>
                                  <img src="http://formacion.camaraminera.org/formacion/alumno/acreditacion/firma.png" style="width: 20%">
                                  <br>
                                Venancio Salcines</h6>
                          </td>             
                        </tr>
                        <tr class="details" style="margin-top: 10px">
                          <td style="width:33.33%; margin-top: 10px;" colspan="2"><img src="http://formacion.camaraminera.org/formacion/alumno/acreditacion/camara.png" style="width: 80%;margin-left: 20%"></td>
                          <td style="width:33.33%; margin-top: 10px;" colspan="3"><img src="http://formacion.camaraminera.org/formacion/alumno/acreditacion/xunta.png" style="width: 80%;margin-left: 10%"></td>
                          <td style="width:33.33%; margin-top: 10px;" colspan="2"><img src="http://formacion.camaraminera.org/formacion/alumno/acreditacion/efbs.png" style="width: 80%;margin-left: 0%"></td>
                          
                        </tr>
                    
                        <tr class="details" style="margin-top: 10px">
                          <td style="width:100%;text-align: center; margin-top: 10px;" colspan="7"><h6>En A Coruña, a <?php echo date("d")?> de <?php damemes(date("m"))?> del <?php echo date("Y")?> </h6></td>
                          
                          
                        </tr>

      </table>
      
      
    </div>
  </body>
</html>

