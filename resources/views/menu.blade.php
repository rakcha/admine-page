@include('header')
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>

					<li class="submenu">
						<a href="{{url('/categories')}}"><i class="fa fa-fw fa-th-large"></i><span> Categorie</span> </a>
                    </li>
                    <li class="submenu">
						<a href="{{url('/endroit')}}"><i class="fa fa-fw fa-map-marker"></i><span> Endroit</span> </a>
                    </li>
                    <li class="submenu">
						<a href="{{url('/menu')}}" class="active"><i class="fa fa-fw fa-bars"></i><span> Menu</span> </a>
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
													<h1 class="main-title float-left">Menu</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Menu</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
							</div>
							<!-- end row -->
								<!--import exel files -->


	<div class="row">
	 <div class="col-md-6 col-lg-6">
	 @if(session('info'))
	 <div class="alert alert-success">
	     {{session('info')}}
	 </div>
	 @endif
	</div>	
	<div class="container">

    <div class="card bg-light mt-3">

        <div class="card-header">

             Import le ficher a la base de donnée 
        </div>

        <div class="card-body">

            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <input type="file" name="file" class="form-control" required>

                <br>

                <button class="btn btn-success">Import Menu Data</button>

               

            </form>

        </div>

    </div>

</div>					
							
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>gérer les <b>Articles</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nouveau Composant</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="datatable">
                <thead>
                    <tr>
					    <th>id</th>
                        <th>menu</th>
                        <th>Type d'article</th>
						<th>nom</th>
						<th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				@if(count($menus) > 0)
			       @foreach($menus ->all() as $row)
                    <tr>
                   
				 
					   
                        <td>{{ $row -> id }}</td>
                        <td>{{ $row -> menu_id }}</td>
						<td>{{ $row -> type_Article }}</td>
                        <td>{{ $row -> nom }}</td>
						<td>{{ $row -> Prix }}</td>
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


</div>

	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="{{action('ArticleController@store')}}">
				{{csrf_field()}}
				
				   <fieldset>
					<div class="modal-header">
									
						<h4 class="modal-title">Ajouter Composant</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>type de l'article</label>
							<input type="text" name="type_Article" class="form-control" required>
						</div>
						<div class="form-group">
							<label>nom de l'article</label>
							<input type="text"  name="nom" class="form-control" required>
						</div>
						<div class="form-group">
							<label>prix</label>
							<input type="text" class="form-control" name="Prix" required>
						</div>
						<div class="form-group">
							<label>caregorie</label>
							<input type="text" class="form-control" name="categorie_id" required>
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
				<form method="POST" action="/menu" id="editForm">
				{{csrf_field()}}
				{{method_field('PUT')}}

				

					<div class="modal-header">						
						<h4 class="modal-title">modifier Composant</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>type de l'article</label>
							<input type="text" name="type_Article" class="form-control" required>
						</div>
						<div class="form-group">
							<label>nom de l'article</label>
							<input type="text"  name="nom" class="form-control" required>
						</div>
						<div class="form-group">
							<label>prix</label>
							<input type="text" class="form-control" name="Prix" required>
						</div>
						<div class="form-group">
							<label>categorie</label>
							<select name="myselectbox">
							@if($categories->count()>0)
							   @foreach($categories->all()as $categorie)
									<option name="myoption1" value="myoption1">myoption1</option>
								@endforeach
						    @endif	
							</select>
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
				<form action="/menu" id="deleteForm">
				{{csrf_field()}}
				{{method_field('DELETE')}}
					<div class="modal-header">						
						<h4 class="modal-title">supprimer Composant</h4>
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

	@include('footer')
