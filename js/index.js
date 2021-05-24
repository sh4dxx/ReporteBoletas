 $(document).ready(function() {

	var from = moment().startOf('month');
    var to = moment();

	$('#date').daterangepicker({
	      "startDate": from,
	      "endDate": to,
	      "maxDate": moment(),
	      locale: {
	        "format": "YYYY-MM-DD",
	        "separator": " to ",
	      },
	});

	//daterange
	date=$('#date').val();

 	var table = $('#tablaBoletas').DataTable( {
	    "ajax":{
	        "url": "./models/voucher.php?daterange="+date,
	        "dataSrc":"",
	    },
		"pageLength": 25,
	    "columns":[
	        {"data": "bol_fecha"},
	        {"data": "suc_id"},
	        {"data": "id_boleta"},
	        {"data": "bol_estado"},
	        //{"defaultContent": "<button type='button' title='' class='btn btn-success btn-sm'><i class='fas fa-running' aria-hidden='true'></i></button><button type='button' title='' class='btn btn-danger btn-sm'><i class='fas fa-skull' aria-hidden='true'></i></button>"}
	        {"defaultContent": "--"}
	    ],
	     "columnDefs": [
	      {
	        "targets": [0,1,2,3],
	        "className": "text-center",
	      },
	     ]
	});


});

$('#date').on('apply.daterangepicker', function(ev, picker) {
	date=$('#date').val();
	reload_datatable(date)
});

/**
 * Refresh datatable
 * @return {[type]}        [description]
 */
function reload_datatable(date)
{
	console.log("R " + date)
	new_url="./models/voucher.php?daterange="+date;
	$('#tablaBoletas').DataTable().ajax.url(new_url).load();
}