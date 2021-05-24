<!doctype html>
<html lang="en">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <title>Reporte Boletas</title>

    <style>
      .btn-acctions button{
        margin: 5px;
        width: 50px;
      }

    </style>
  </head>
  <body>
    
    <div class="container" style="max-width: 80%">

      <div class="content-heading">
        <h3 class="text-left" style="margin: 30px 0px 30px 0px">Reporte boletas electronicas</h3>
      </div>
      <div class="clearfix" style="margin-bottom: 1em;">
        <div class="pull-left ">

            <div class="row">

              <div class="col-md-12 pull-left form-inline">
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
              </div>
            </div>

        </div>
      </div>

         <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="table-responsive b0">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="tablaBoletas">
                        <thead>
                           <tr>
                              <th width="10%"><center>Rut Empresa</center></th>
                              <th><center>Nombre Empresa</center></th>
                              <th><center>Fecha boleta</center></th>                                
                              <th><center>Cantidad boletas</center></th>  
                              <th><center>Estado</center></th>
                              <th><center>Acciones</center></th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                  </div>
                </div>
             </div>
         </div> 
    </div>
   
    
    <!-- JavaScript -->
    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Datatables y app -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
    <script type="text/javascript" src="./js/index.js"></script>  
      
  </body>
</html>