@extends('layout.template')

@section('content')
<div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Empty column to push the button to the right -->
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('/user/create') }}" class="btn btn-primary">Tambah User</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-3 control-label col-form-label">Filter:</label>
                <div class="col-9">
                    <select class="form-control" id="level_id" name="level_id" required>
                        <option value="">- Semua -</option>
                        @foreach($level as $item)
                            <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Level Pengguna</small>
                </div>
            </div>
        </div>
    </div>

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
        <tbody></tbody>
    </table> 
</div> 
@endsection 

@push('js')
<script> 
    $(document).ready(function() { 
        var dataUser = $('#table_user').DataTable({ 
            serverSide: true, // if you want to use server side processing 
            ajax: { 
                "url": "{{ url('user/list') }}", 
                "dataType": "json", 
                "type": "POST",
                "data": function(d) {
                    d.level_id = $('#level_id').val();
                }
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
        $('#level_id').on('change', function() { 
            dataUser.ajax.reload();
        });
    }); 
</script>
@endpush 
