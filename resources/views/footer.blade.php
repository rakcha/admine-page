<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Your Website</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="{{url('js/modernizr.min.js')}}"></script>
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/moment.min.js')}}"></script>

<script src="{{url('js/popper.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>

<script src="{{url('js/detect.js')}}"></script>
<script src="{{url('js/fastclick.js')}}"></script>
<script src="{{url('js/jquery.blockUI.js')}}"></script>
<script src="{{url('js/jquery.nicescroll.js')}}"></script>
<script src="{{url('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{url('plugins/switchery/switchery.min.js')}}"></script>

<!-- App js -->
<script src="{{url('js/pikeadmin.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<!-- BEGIN Java Script for this page -->
<Script type="text/javascript">
    $(document).ready(function(){
      var table = $('#datatable').DataTable();
	  table.on('click','.edit',function(){

		  $tr=$(this).closest('tr');
		  if($($tr).hasClass('child')){
			  $tr=$tr.prev('.parent');
		  };

      var data = table.row($tr).data();
	  console.log(data);

	  $('#logo').val(data[1]);
	  $('#nom_comercial').val(data[2]);
	  $('#adresse').val(data[3]);
	  $('#num_telephone').val(data[4]);
	  $('#editForm').attr('action','/endroit/'+data[0]);
	  $('#editModal').modal('show');


	  });
		table.on('click','.delete',function(){

				$tr=$(this).closest('tr');
				if($($tr).hasClass('child')){
				$tr=$tr.prev('.parent');
				}

				var data = table.row($tr).data();
				console.log(data);

				//$('#id').val(data[0]);
				$('#deleteForm').attr('action','/endroit/'+data[0]);
				$('#deleteModal').modal('show');


		});
	});
</script>
<!-- END Java Script for this page -->

</body>
</html>