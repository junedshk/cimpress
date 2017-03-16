$(document).ready(function() {
	$('#calculate').click(function(){
		var err_flag = false;
		$("input").removeClass('red');
		if ($('#ozc').val() == '') {			
			$('#ozc').addClass('red');
			err_flag = true;
		}
		if ($('#dzc').val() == '') {			
			$('#dzc').addClass('red');
			err_flag = true;
		}
		if ($('#weight').val() == '') {			
			$('#weight').addClass('red');
			err_flag = true;
		}
		if ($('#cog').val() == '') {			
			$('#cog').addClass('red');
			err_flag = true;
		}
		if ($('#width').val() == '') {			
			$('#width').addClass('red');
			err_flag = true;
		}
		if ($('#height').val() == '') {			
			$('#height').addClass('red');
			err_flag = true;
		}
		if ($('#length').val() == '') {			
			$('#length').addClass('red');
			err_flag = true;
		}
		if ($('#ozc').val() != '' || $('#dzc').val() != '') {
			if ($('#ozc').val() == $('#dzc').val()) {
				alert ('Original zip code and Destination zipcode cannot be same');
				err_flag = true;
			}
		}

		if (err_flag != true) {

			var ozc = $('#ozc').val();
			var dzc = $('#dzc').val();
			var weight = $('#weight').val();
			var cog = $('#cog').val();
			var width = $('#width').val();
			var height = $('#height').val();
			var length = $('#length').val();
			
		    $.ajax({
		        type: 'GET',
		        url: 'ajax.php',
		        data: { ozc: ozc, dzc: dzc, weight: weight, cog: cog, width: width, height: height, length: length },
		        success: function(data) {
		        	alert (data);
		        	if (data == 'False') {
		        		alert ('Sorry the api could not return value. Please try after some time');
		        	} else {
		        		var tbl=$("<table/>").attr("id","mytable");
					    $("#div1").append(tbl);
					    for(var i = 0; i < delivery_options.length; i++) {
					        var tr="<tr>";
					        //var td0 = "<td><input type='checkbox' id="' + i '" class='chk'></td>";
						    //var td1 = "<td class=rc1"' + i +'">" + delivery_options[i]["delivery_estimate_business_days"] + "</td>";
					        //var td2 = "<td class=rc2"' + i +'">" + delivery_options[i]["final_shipping_cost"] + "</td>";
					        //var td3 = "<td class=rc3"' + i +'">" + delivery_options[i]["description"] + "</td></tr>";
					       //$("#mytable").append(tr + td1 + td2 +t d3); 
					    }

		        	}
		        }
		    });
		}
	});

	$(".chk" ).on( "click", function() {
		$id = $('.chk').id();
		$var1 = $('.rc1' + $id).text();
		$var2 = $('.rc2' + $id).text();
		$var3 = $('.rc3' + $id).text();
		alert($var1 + ', ' + $var2, + ', '+$var3);
	});
});