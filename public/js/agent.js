var newAgent = $('#create-agent')
var newform = $('#create-agent-form')
var url = window.location.origin


newform.submit(function(e){
	e.preventDefault()
	sendNewAgent()
})

$('.content a').on('click',function(e){
	e.preventDefault();
	var agent_page = $(this).attr('href')

	$.ajax({
		url: agent_page,

		success: function(data){
			$('.content').html(data)
		},
		error: function(data){
			$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
		}
	})
})


function sendNewAgent(){
	var formdata = newform.serialize()

	$.ajax({
		type: "POST",
		data: formdata,
		url: url+"/agents",

		success: function(data){
			newform[0].reset()
			$('.help.block').empty()
			$('#agent-info').empty().append('<div class="alert alert-info">New Agent Created. <strong>'+data.name+' '+data.phone+' '+data.email+'</strong></div>')
			$('tbody').append('<tr><td>#</td><td><a href="http://localhost:8000/agents/'+data.id+'">'+data.name+'</a></td><td>'+data.phone+'</td><td>'+data.email+'</td><td></td></tr>')
		},
		error: function(data){
			var obj = $.parseJSON(data.responseText)
			
			if (obj.name) {
				for (var i = obj.name.length - 1; i >= 0; i--) {
					$('.name-error').empty().append('<li>'+obj.name[i]+'</li>')
				}
			}
			if (obj.email) {
				for (var i = obj.email.length - 1; i >= 0; i--) {
					$('.email-error').empty().append('<li>'+obj.email[i]+'</li>')
				}
			}

			if (obj.phone) {
				for (var i = obj.phone.length - 1; i >= 0; i--) {
					$('.phone-error').empty().append('<li>'+obj.phone[i]+'</li>')
				}
			}
		}
	})
}
