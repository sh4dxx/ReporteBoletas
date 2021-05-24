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

	//parameters
	rut=$('#business_rut').val();
	date=$('#date').val();
	voucher_status=$('#voucher_status').val();

 	var table = $('#tablaBoletas').DataTable( {
	    "ajax":{
	        "url": "./models/voucher.php?rut="+rut+"&daterange="+date+"&status="+voucher_status,
	        "dataSrc":"",
	    },
		"pageLength": 25,
	    "columns":[
	        {"data": "bol_fecha"},
	        {"data": "suc_id"},
	        {"data": "id_boleta"},
	        {"data": "bol_estado"},
	        {"defaultContent": "--"}
	    ],
	     "columnDefs": [
	      {
	        "targets": [0,1,2,3,4],
	        "className": "text-center",
	      },
	     ]
	});


});

$('#date').on('apply.daterangepicker', function(ev, picker) {
	date=$('#date').val();
	rut=$('#business_rut').val();
	voucher_status=$('#voucher_status').val();
	reload_datatable(rut,date,voucher_status);
});

$('#voucher_status').on('change', function (e) {
	date=$('#date').val();
	rut=$('#business_rut').val();
    voucher_status = $('#voucher_status').val();
  	reload_datatable(rut,date,voucher_status);
});

/**
 * Refresh datatable
 * @return {[type]}        [description]
 */
function reload_datatable(rut,date,voucher_status)
{
	console.log(date)
	new_url="./models/voucher.php?rut="+rut+"&daterange="+date+"&status="+voucher_status;
	$('#tablaBoletas').DataTable().ajax.url(new_url).load();
}