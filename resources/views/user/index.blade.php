@extends('layout.template') 
 
@section('content') 
<div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
          <thead> 
            <tr>
                <th>DT_RowIndex</th>
                <th>Username</th>
                <th>Name</th>
                <th>Level</th>
                <th>Action</th>
            </tr> 
          </thead> 
          <tbody>
            <!-- Table body content will be loaded dynamically -->
          </tbody>
        </table> 
      </div> 
  </div> 
@endsection 
 
@push('css') 
@endpush 
 
@push('js')
<script> 
    $(document).ready(function() { 
        var dataUser = $('#table_user').DataTable({ 
            serverSide: true, // if you want to use server side processing 
            ajax: { 
                "url": "{{ url('user/list') }}", 
                "dataType": "json", 
                "type": "POST" 
            },
            columns: [ 
                { 
                    data: "DT_RowIndex", // sequence number of laravel datatable addIndexColumn()  
                    className: "text-center", 
                    orderable: false, 
                    searchable: false     
                },{ 
                    data: "username",                
                    className: "", 
                    orderable: true, // if you want this column to be sortable 
                    searchable: true // if you want this column to be searchable 
                },{ 
                    data: "nama", // corrected to match the key in your data
                    className: "", 
                    orderable: true, // if you want this column to be sortable 
                    searchable: true // if you want this column to be searchable 
                },{ 
                    data: "level.level_nama",                
                    className: "", 
                    orderable: false, // if you want this column to be sortable 
                    searchable: true // if you want this column to be searchable 
                },{ 
                    data: "action",  
                    className: "", 
                    orderable: false, // if you want this column to be sortable 
                    searchable: false // if you want this column to be searchable 
                } 
            ] 
        }); 
    }); 
</script>

@endpush 
