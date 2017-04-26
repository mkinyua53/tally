		var url = window.location.origin
		var agent_button = $('#agents')
		var add_agent = $('#new-agent-link')
		var aspirant_button = $('#aspirants')
		var add_aspirant = $('#new-aspirant-link')
		var result_button = $('#results')
		var add_result = $('#new-result-link')
		var station_button = $('#stations')
		var add_station = $('#new-station-link')

		add_agent.on('click',function(){
			loadAgentForm()
		})

		agent_button.click(function(){
			loadAgent()
		})

		aspirant_button.on('click',function(){
			loadAspirant()
		})

		add_aspirant.on('click',function(){
			loadAspirantForm()
		})

		result_button.on('click', function(){
			loadResult()
		})

		add_result.on('click',function(){
			loadResultForm()
		})

		station_button.on('click', function(){
			loadStation()
		})

		add_station.on('click',function(){
			loadStationForm()
		})

		function loadAgent(){
			$.ajax({
				url: url+"/agents",

				success: function(data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadAgentForm(){
			$.ajax({
				url: url+"/agents?type=create",

				success: function(data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadAspirant(){
			$.ajax({
				url: url+"/aspirants",

				success: function(data){
					console.log(data)
					$('.content').html(data)
				},
				error: function(data){
					console.log(data)
					$('.content').html(data.responseText)
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadAspirantForm(){
			$.ajax({
				url: url+"/aspirants?type=create",

				success: function (data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadResult(){
			$.ajax({
				url: url+"/results",

				success: function (data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadResultForm(){
			$.ajax({
				url: url+"/results?type=create",

				success: function(data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadStation(){
			$.ajax({
				url: url+"/stations",

				success: function (data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadStationForm(){
			$.ajax({
				url: url+"/stations?type=create",

				success: function(data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}
