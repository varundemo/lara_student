jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/js/jquery.datatable.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/sweetalert.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/myscript.js') }}"></script>

<!-- <script src="{{ url('https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js') }}"></script> -->

<script>
	
	// $(function(){
		$('#class-section').DataTable({
			processing:true,
			serverSide:true,
			ajax: "{{ route('listall') }}",
			columns: [
					{data:'id',name:'id'},
					{data: 'DT_RowIndex', name: 'DT_RowIndex' },
					{data:'section',name:'section'},
					{data:'status',name:'status'},
					{data:'action_btn',name:'action_btn'},

			]
		});

	$('#list-classes').DataTable({
			processing:true,
			serverSide:true,
			ajax: "{{ route('listclassall') }}",
			columns: [
					{data:'id',name:'id'},
					{data:'name',name:'name'},
					{data:'section',name:'class section'},
					{data:'seats_available',name:'Seat Available'},
					{data:'status',name:'status'},
					{data:'class_action',name:'class_action'},

			]
		});	

	$('#faculty-type').DataTable({
			processing:true,
			serverSide:true,
			ajax: "{{ URL::to('/faculty_type_all') }}",
			columns: [
					{data:'id',name:'id'},
					{data:'type',name:'type'},
					{data:'status',name:'status'},
					{data:'edit_btn',name:'edit_btn'},
				
					// {data:'class_action',name:'class_action'}, 

			]
		});	

	$('#faculty').DataTable({
			processing:true,
			serverSide:true,
			ajax: "{{ route('list_faculty_all') }}",
			columns: [
					{data:'id',name:'id'},
					{data:'DT_RowIndex',name:'DT_RowIndex'},
					{data:'fac_type',name:'type'},
					{data:'name',name:'name'},
					{data:'email',name:'email'},
					{data:'designation',name:'designation'},
					{data:'phone_no',name:'phone_no'},
					{data:'gen_type',name:'type'},
					{data:'profile_photo',name:'profile_photo'},
					{data:'address',name:'adresss'},
					{data:'status',name:'status'},
					{data:'fac_action',name:'fac_action'},
					
				
					// {data:'class_action',name:'class_action'}, liststudentall

			]
		});

	$('#student-list').DataTable({
			processing:true,
			serverSide:true,
			ajax: "{{ route('liststudentall') }}",
			columns: [
					{data:'id',name:'id'},
					{data:'DT_RowIndex',name:'DT_RowIndex'},
					{data:'reg_no',name:'reg_no'},
					{data:'type',name:'type'},
					{data:'name',name:'name'},
					{data:'email',name:'email'},
					{data:'roll_no',name:'roll_no'},
					{data:'phone_no',name:'phone_no'},
					{data:'address',name:'adresss'},
					{data:'profile_photo',name:'student_photo'},
					{data:'father_name',name:'father_name'},
					{data:'mother_name',name:'mother_name'},
					{data:'age',name:'age'},
					{data:'status',name:'status'},
					{data:'stu_action',name:'stu_action'},
				
					// {data:'class_action',name:'class_action'},

			]
		});



	// });
</script>