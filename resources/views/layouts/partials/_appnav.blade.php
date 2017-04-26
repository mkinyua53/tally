		<nav class="navbar navbar-inverse">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myApp">
					<span class="sr-only">Toggle App Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<span class="navbar-brand text-center">App</span>
			</div>
	        <div class="collapse navbar-collapse" id="myApp">
	        	<ul class="nav navbar-nav">
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                        Stations<span class="caret"></span>
	                    </a>

	                    <ul class="dropdown-menu" role="menu">
	                        <li class=" list-group-item">
	                        	<a class="btn btn-primary" id="stations">All Stations</a>
	                        </li>
	                        <li class=" list-group-item"><a class="btn btn-info" id="new-station-link">Add New</a></li>
	                    </ul>
	                </li>

	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                        Agents<span class="caret"></span>
	                    </a>

	                    <ul class="dropdown-menu" role="menu">
	                        <li class=" list-group-item">
	                        	<a class="btn btn-primary" id="agents" v-on:click="loadAgents">All Agents</a>
	                        </li>
	                        <li class=" list-group-item"><a class="btn btn-info" id="new-agent-link">Add New</a></li>
	                    </ul>
	                </li>
		       
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                        Aspirants<span class="caret"></span>
	                    </a>

	                    <ul class="dropdown-menu" role="menu">
	                        <li class=" list-group-item">
	                        	<a class="btn btn-primary" id="aspirants">All Aspirants</a>
	                        </li>
	                        <li class=" list-group-item"><a class="btn btn-info" id="new-aspirant-link">Add New</a></li>
	                    </ul>
	                </li>
		       
		            <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                        Results<span class="caret"></span>
	                    </a>

	                    <ul class="dropdown-menu" role="menu">
	                        <li class=" list-group-item">
	                        	<a class="btn btn-primary" id="results">All Results</a>
	                        </li>
	                        <li class=" list-group-item"><a class="btn btn-info" id="new-result-link">Add New</a></li>
	                    </ul>
	                </li>

		        </ul>
	        </div>
        </nav>