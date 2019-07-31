	<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
	  <a class="navbar-brand" href="#">Break Crepe</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse " id="navbarNavDropdown">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        	<i class="fa fa-user fa-fw"></i>

	         <!--  Dropdown link -->
	        </a>
	        <div class="dropdown-menu dropdown-user dropdown-menu-lg-right " aria-labelledby="navbarDropdownMenuLink" style="">
	        	@if(Auth::check())
	          <a class="dropdown-item" href="admin/user/edit/{{Auth::user()->id}}"><i class="fa fa-user fa-fw"></i>{{Auth::user()->full_name}} </a>
	          <a class="dropdown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Setting </a>
	           <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="admin/logout"><i class="fa fa-user-circle-o" aria-hidden="true"></i>LogOut</a>
	          @endif
	        </div>
	      </li>
	    </ul>
	  </div>
	</nav>