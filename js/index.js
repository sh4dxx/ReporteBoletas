 $(document).ready(function() {

    var from = moment();
    var to = moment();

    $('#reportrange').daterangepicker({
      "startDate": from,
      "endDate": to,
      "maxDate": moment(),
      locale: {
        "format": "DD-MM-YYYY",
        "separator": " - ",
      },
    });

    $('#reportrange span').html(from.format('DD-MM-YYYY') + ' to ' + to.format('DD-MM-YYYY'));

 	var table = $('#tablaBoletas').DataTable( {
	    "ajax":{
	        "url": "./models/voucher.php",
	        "data": {
	        	"from": from.format('YYYY-MM-DD'),
	        	"to": to.format('YYYY-MM-DD'),
	        },
	        /*"data": function(d){
        	   d.from = from.format('YYYY-MM-DD'),
        	   d.to = to.format('YYYY-MM-DD')
        	},*/
	        "dataSrc":"",
	    },
		"pageLength": 25,
	    "columns":[
	        {"data": "emp_rut"},
	        {"data": "emp_nombre"},
	        {"data": "bol_fecha"},
	        {"data": "bol_cantidad"},
	        {"data": "bol_estado"},
	        {"defaultContent": "<button type='button' title='' class='btn btn-success btn-sm'><i class='fas fa-running' aria-hidden='true'></i></button><button type='button' title='' class='btn btn-danger btn-sm'><i class='fas fa-skull' aria-hidden='true'></i></button>"}
	    ],
	     "columnDefs": [
	      {
	        "targets": [0,2,3,4,5],
	        "className": "text-center",
	      },
	     ]
	});
});

$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
	//console.log(ev);
	//console.log(picker);
	//console.log(from);
	//$('#reportrange span').html(from.format('MMMM D, YYYY') + ' - ' + to.format('MMMM D, YYYY'));
	//console.log(picker);
	//$("#tablaBoletas").DataTable().ajax.reload();
  	//reload_datatable(from, to);
});



/**
 * Refresh datatable
 * @return {[type]}        [description]
 */
function reload_datatable()
{
	//table.ajax.reload();
	new_url="./models/voucher.php";
	$('#tablaBoletas').DataTable().ajax.url(new_url).load();
}