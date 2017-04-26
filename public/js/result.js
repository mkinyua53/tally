
var newform = $('#create-result-form')
var span = [$('#result-info'), $('.agent-error'), $('.votes-error'), $('.station-error'), $('.time-error'), $('.aspirant-error')]
var url = window.location.origin

for (var i = span.length - 1; i >= 0; i--) {
	span[i].css('color','red')
}

newform.submit(function(e){
	e.preventDefault()
	sendNewResult()
})

$('.content a').on('click',function(e){
	e.preventDefault();
	var result_page = $(this).attr('href')

	$.ajax({
		url: result_page,

		success: function(data){
			$('.content').html(data)
		},
		error: function(data){
			$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'</h2>')
		}
	})
})


function sendNewResult(){
	var formdata = newform.serialize()

	$.ajax({
		type: "POST",
		data: formdata,
		url: url+"/results",

		success: function(data){
			// console.log(data)
			newform[0].reset()
			$('.help.block').empty()
			$('#result-info').empty().append('<div class="alert alert-info">New Result Created <strong>'+data.station.name+' for '+data.aspirant.name+' total votes - '+data.votes+'</strong></div>')
			$('tbody').append('<tr><td>#</td><td><a href="http://localhost:8000/results/'+data.id+'">'+data.agent.name+'</a></td><td>'+data.created_at+'</td><td>'+data.station.name+'</td><td>'+data.aspirant.name+'</td><td>'+data.votes+'</td></tr>')
		},
		error: function(data){
			if (data.status != 422) {
				$('#result-info').empty().append('<div class="text-center">'+data.status+' '+data.statusText+'</div>')
			}
			var obj = $.parseJSON(data.responseText)
			
			if (obj.agent) {
				for (var i = obj.agent.length - 1; i >= 0; i--) {
					$('.agent-error').empty().append('<li>'+obj.agent[i]+'</li>')
				}
			}
			
			if (obj.votes) {
				for (var i = obj.votes.length - 1; i >= 0; i--) {
					$('.votes-error').empty().append('<li>'+obj.total_votes[i]+'</li>')
				}
			}

			if (obj.station) {
				for (var i = obj.station.length - 1; i >= 0; i--) {
					$('.station-error').empty().append('<li>'+obj.station[i]+'</li>')
				}
			}

			if (obj.time) {
				for (var i = obj.time.length - 1; i >= 0; i--) {
					$('.time-error').empty().append('<li>'+obj.total_votes[i]+'</li>')
				}
			}

			if (obj.aspirant) {
				for (var i = obj.aspirant.length - 1; i >= 0; i--) {
					$('.aspirant-error').empty().append('<li>'+obj.aspirant[i]+'</li>')
				}
			}
		}
	})
}
