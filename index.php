<!doctype html>
<html lang="en">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <title>Reporte Boletas</title>

  </head>
  <body>
    
    <div class="container">
      <h3 class="text-left" style="margin: 30px 0px 30px 0px">Reporte boletas electronicas</h3>
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaBoletas" class="table-striped table-bordered row-border" style="width:100%">
                <thead>
                 <tr>
                    <th>Emp Rut</th>
                    <th>Emp Nombre</th>
                    <th>Suc id</th>
                    <th>fecha boleta</th>                                
                    <th>emp_nro_sucursales</th>  
                    <th>emp_nombre</th>
                    <th>boleta_activa</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
           </div>
       </div> 
    </div>
   
    
    <!-- JavaScript -->
    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    <!-- Datatables y app -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
    <script type="text/javascript" src="./js/index.js"></script>  
      
  </body>
</html>