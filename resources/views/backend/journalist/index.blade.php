@extends('backend.layouts.base')

@section('title', 'All Journalist')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Journalist List</h4>
				<a href="{{ route('admin.journalist.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Journalist</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Newspaper/TV</th>
								<th>Category</th>
								<th>City</th>
								<th>District</th>
								<th>Action</th>
							</tr>
						</thead>
						
						<tfoot>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Newspaper/TV</th>
								<th>Category</th>
								<th>City</th>
								<th>District</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('scripts')
<script>
	$('#dataTable').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
			url: "{{ route('admin.journalist.index') }}",
		},
		columns:[
		{ 
			data: 'DT_RowIndex',
			name: 'DT_RowIndex',
			orderable: false,
			searchable: false 
		},
		{
			data: 'name',
			name: 'name'
		},
		{
			data: 'phone',
			name: 'phone'
		},
		{
			data: 'media',
			name: 'media'
		},
		{
			data: 'category',
			name: 'category'
		},
		{
			data: 'city',
			name: 'city'
		},
		{
			data: 'district',
			name: 'district'
		},
		{
			data: 'action',
			name: 'action',
			orderable: false
		}
		]
	});


</script>
@endsection