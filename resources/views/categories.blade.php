@include('header')
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>

					<li class="submenu">
						<a href="{{url('/categories')}}"class="active"><i class="fa fa-fw fa-th-large"></i><span> Categorie</span> </a>
                    </li>
                    <li class="submenu">
						<a href="{{url('/endroit')}}" ><i class="fa fa-fw fa-map-marker"></i><span> Endroit</span> </a>
                    </li>
                    <li class="submenu">
						<a href="{{url('/menu')}}"><i class="fa fa-fw fa-bars"></i><span> Menu</span> </a>
                    </li>
                    <li class="submenu">
						<a href="{{url('/partenaire')}}"><i class="fa fa-fw fa-users"></i><span> Partenaire</span> </a>
                    </li>
					
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>

	</div>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
							<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">categories</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">categories</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
							</div>
							<!-- end row -->

						
							





            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
@include('footer')