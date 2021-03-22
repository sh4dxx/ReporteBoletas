 $(document).ready(function() {
          $('#tablaBoletas').DataTable( {
            "ajax":{
                "url": "database/consulta.php",
                "dataSrc":""
            },
            "columns":[
                {"data": "fac_numero"},
                {"data": "fac_fecha"},
                {"data": "fac_fecha"},
                {"data": "fac_fecha"},
                {"data": "fac_fecha"},
                {"data": "fac_fecha"},
                {"data": "fac_fecha"}
            ]  
          });
      });