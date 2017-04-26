
var newform = $('#create-station-form')
var span = [$('#station-info'), $('.name-error'), $('.total_votes-error'), $('.ward-error')]
var url = window.location.origin

for (var i = span.length - 1; i >= 0; i--) {
	span[i].css('color','red')
}

newform.submit(function(e){
	e.preventDefault()
	sendNewStation()
})

$('.content a').on('click',function(e){
	e.preventDefault();
	var station_page = $(this).attr('href')

	$.ajax({
		url: station_page,

		success: function(data){
			$('.content').html(data)
		},
		error: function(data){
			$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
		}
	})
})


function sendNewStation(){
	var formdata = newform.serialize()

	$.ajax({
		type: "POST",
		data: formdata,
		url: url+"/stations",

		success: function(data){
			// console.log(data)
			newform[0].reset()
			$('.help.block').empty()
			$('#station-info').empty().append('<div class="alert alert-info">New Station Created. <strong>'+data.name+' from '+data.ward.name+' total registered voters '+data.total_votes+'</strong></div>')
			$('tbody').append('<tr><td>#</td><td><a href="http://localhost:8000/stations/'+data.id+'">'+data.name+'</a></td><td>'+data.ward.name+'</td><td>'+data.expected_votes+'</td><td></td></tr>')
		},
		error: function(data){
			var obj = $.parseJSON(data.responseText)
			
			if (obj.name) {
				for (var i = obj.name.length - 1; i >= 0; i--) {
					$('.name-error').empty().append('<li>'+obj.name[i]+'</li>')
				}
			}
			if (obj.total_votes) {
				for (var i = obj.total_votes.length - 1; i >= 0; i--) {
					$('.total_votes-error').empty().append('<li>'+obj.total_votes[i]+'</li>')
				}
			}

			if (obj.ward) {
				for (var i = obj.ward.length - 1; i >= 0; i--) {
					$('.ward-error').empty().append('<li>'+obj.ward[i]+'</li>')
				}
			}
		}
	})
}
