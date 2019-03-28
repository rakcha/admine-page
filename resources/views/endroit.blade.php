@include('header')
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>

					<li class="submenu">
						<a href="index.html"><i class="fa fa-fw fa-th-large"></i><span> Categorie</span> </a>
                    </li>
                    <li class="submenu">
						<a href="{{url('/endroit')}}" class="active"><i class="fa fa-fw fa-map-marker"></i><span> Endroit</span> </a>
                    </li>
                    <li class="submenu">
						<a href="{{url('/menu')}}"><i class="fa fa-fw fa-bars"></i><span> Menu</span> </a>
                    </li>
                    <li class="submenu">
						<a href="index.html"><i class="fa fa-fw fa-users"></i><span> Partenaire</span> </a>
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
													<h1 class="main-title float-left">Endroit</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Endroit</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
							</div>
							<!-- end row -->

	<div class="row">
	 <div class="col-md-6 col-lg-6">
	 @if(session('info'))
	 <div class="alert alert-success">
	     {{session('info')}}
	 </div>
	 @endif
	</div>						
							
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>gérer les <b>Endroit</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nouveau Endroit</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="datatable">
                <thead>
                    <tr>
					    <th>id</th>
                        <th>logo</th>
                        <th>Nom Comercial</th>
						<th>Address</th>
                        <th>numero telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				@if(count($endroits) > 0)
				  @foreach($endroits ->all() as $endroit)
                    <tr>
						
					    <td>{{ $endroit -> id }}</td>
                        <td>{{ $endroit -> logo }}</td>
                        <td>{{ $endroit -> nom_comercial }}</td>
						<td>{{ $endroit -> adresse }}</td>
                        <td>{{ $endroit -> num_telephone }}</td>
                        <td>
						    <a href="#" class="edit"  ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                  @endforeach
				  @endif
                </tbody>
            </table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="{{action('EndroitsController@store')}}">
				{{csrf_field()}}
				
				   <fieldset>
					<div class="modal-header">
									
						<h4 class="modal-title">Ajouter Endroit</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>logo</label>
							<input type="text" name="logo" class="form-control" required>
						</div>
						<div class="form-group">
							<label>nom_comercial</label>
							<input type="text"  name="nom_comercial" class="form-control" required>
						</div>
						<div class="form-group">
							<label>adresse</label>
							<input type="email" class="form-control" name="adresse" required>
						</div>
						<div class="form-group">
							<label>num_telephone</label>
							<input type="text" class="form-control" name="num_telephone" required>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="submit" class="btn btn-success" value="Add">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						
					</div>
					@if(count($errors)>0)
					   @foreach($errors ->all() as $error)
					      <div class="alert alert-danger">
						  {{$error}}
						  </div>
						@endforeach
					@endif  		
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div class="modal fade" id="editModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="/endroit" id="editForm">
				{{csrf_field()}}
				{{method_field('PUT')}}

				

					<div class="modal-header">						
						<h4 class="modal-title">Edit Endroit</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>logo</label>
							<input type="text" name="logo" id="logo" class="form-control" required >
						</div>
						<div class="form-group">
							<label>nom_comercial</label>
							<input type="text" name="nom_comercial" id="nom_comercial" class="form-control" required >
						</div>
						<div class="form-group">
							<label>Adresse</label>
							<input type="email" name="adresse" id="adresse" class="form-control" required>
						</div>
						<div class="form-group">
							<label>num_telephone</label>
							<input type="text" name="num_telephone" id="num_telephone" class="form-control" required >
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/endroit" id="deleteForm">
				{{csrf_field()}}
				{{method_field('DELETE')}}
					<div class="modal-header">						
						<h4 class="modal-title">Delete Endroit</h4>
						<button type="button" class="close" aria-hidden="true" name="_method" value="DELETE">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger delete" value="Delete" >
					</div>
				</form>
			</div>
		</div>
	</div>




            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
@include('footer')