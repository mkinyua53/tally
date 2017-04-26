
var newform = $('#new-aspirant')
var url = window.location.origin


newform.submit(function(e){
	e.preventDefault()
	sendNewAspirant()
})

function sendNewAspirant(){
	var formdata = newform.serialize()

	$.ajax({
		type: "POST",
		data: formdata,
		url: url+"/aspirants",

		success: function(data){
			newform[0].reset()
			$('.help.block').empty()
			$('#aspirant-info').empty().append('<div class="alert alert-info">New Aspirant Created. <strong>'+data.name+' from '+data.ward.name+' vying for '+data.level+'</strong></div>')
			$('tbody').append('<tr><td>#</td><td><a href="http://localhost:8000/aspirants/'+data.id+'">'+data.name+'</a></td><td>'+data.level+'</td><td>'+data.ward.name+'</td><td></td></tr>')
		},
		error: function(data){
			var obj = $.parseJSON(data.responseText)
			
			if (obj.name) {
				for (var i = obj.name.length - 1; i >= 0; i--) {
					$('.name-error').empty().append('<li>'+obj.name[i]+'</li>')
				}
			}
			if (obj.level) {
				for (var i = obj.level.length - 1; i >= 0; i--) {
					$('.email-error').empty().append('<li>'+obj.level[i]+'</li>')
				}
			}

			if (obj.ward) {
				for (var i = obj.ward.length - 1; i >= 0; i--) {
					$('.phone-error').empty().append('<li>'+obj.ward[i]+'</li>')
				}
			}
		}
	})
}
