function iterateRecords(data) {

	console.log(data);

	$.each(data.result.records, function(recordKey, recordValue) {
		
		var recordTitle = recordValue["Trading Name"];
		var recordStreet = recordValue["Street"];
		var recordSuburb = recordValue["Suburb"];
		var recordPostcode = recordValue["Postcode"];
		var recordPhoneNumber = recordValue["Phone Number"];
		var recordState = recordValue["State"];
		var recordSport = recordValue["1. Sport/recreation activity"];
		var recordSport2 = recordValue["2. Sport/recreation activity"];
		var recordSport3 = recordValue["3. Sport/recreation activity"];
		var recordSport4 = recordValue["4. Sport/recreation activity"];
		var recordSport5 = recordValue["5. Sport/recreation activity"];
		if (recordSport2 != "") {
			recordSport += ", " + recordSport2;
		}
		if (recordSport3 != "") {
			recordSport += ", " + recordSport3;
		}
		if (recordSport4 != "") {
			recordSport += ", " + recordSport4;
		}
		if (recordSport5 != "") {
			recordSport += ", " + recordSport5;
		}

		// var recordYear = getYear(recordValue["dcterms:temporal"]);
		// var recordImage = recordValue["150_pixel_jpg"];
		// var recordImageLarge = recordValue["1000_pixel_jpg"];
		// var recordDescription = recordValue["dc:description"];
		
		if(recordTitle && recordStreet && recordSuburb && recordPostcode && recordPhoneNumber) {

			if(recordState == "QLD") { // Only get records from the 19th century

				$("#records").append( 
					$('<div class="singleClub record mb-5">').append(
						$('<div class="clubTitle my-1">').append($('<h4>').text(recordTitle), $('<hr>')),
						$('<h6 class="street">').text(recordStreet),
						$('<h6 class="suburb">').text(recordSuburb),
						$('<h6 class="postcode">').text(recordPostcode),
						$('<h6 class="phoneNumber">').text(recordPhoneNumber),
						$('<h6 class="sport">').text(recordSport),

						// $("<a>").attr("href", recordImageLarge).addClass("strip").attr("data-strip-caption", recordTitle).append(
						// 	$('<img>').attr("src", recordImage)
						// ),

						// //$('<img>').attr("src", recordImage),
						// $('<p>').text(recordDescription)
					)
				);

			}

		}

		setTimeout(function () {
			$("body").addClass("loaded");
		}, 20);

		$("#filter-count strong").text($(".record:visible").length);

		$("#suburb").keyup(function(event) {
			var searchTerm = $(this).val();
			console.log(searchTerm);

			$(".record").hide();
			$(".suburb:contains('" + searchTerm + "')").parent().show();

			$("#filter-count strong").text($(".record:visible").length);
		});

	});

}
$(document).ready(function() {
	
	var slqData = JSON.parse(localStorage.getItem("slqData"));

	if (slqData) {
		console.log("Source: localStorage");
		iterateRecords(slqData);
	} else {
		console.log("Source: ajax call");
		var data = {
			resource_id: 'f07cb35c-ac11-448c-af6b-e61f8529a577', // the resource id
			limit: 100, // get 100 results
		  };

		$.ajax({
			url: "https://data.qld.gov.au/api/3/action/datastore_search",
			data: data,
			dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
			cache: true,
			success: function(data) {
				alert('Total results found: ' + data.result.total);
				localStorage.setItem("slqData", JSON.stringify(data));
				iterateRecords(data);
			}
		});

	}

});