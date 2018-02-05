$(function() {
	$("#amount").keyup(function(e){
		var base = $("#base").val();
		e.preventDefault();
		var base = $ ("#base").val();
		var amount = $ ("#amount").val();
		var convert = $ ('#convert').val();

		$.ajax({
			url :"https://api.fixer.io/latest?base="+base,
			dataType : "json",
			type : 'GET',
			success : function(data) {
				var converted_value = amount*data.rates[convert];
				$("#display").html(
					'<table class="table"><thead><td>BASE<td>'+
					'<td>amount</td><td>CONVERT</td><td>converted value</td></thead>'+
					'<tbody><tr><td>'+base+'</td><td>'+amount+'</td><td>'+[convert]+'</td><td>'+converted_value+
					'</td></tr></tbody></table>'
					);
			}
	});
});

});	