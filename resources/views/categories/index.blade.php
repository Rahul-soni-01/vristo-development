<x-layout.default>
    
    <link rel="stylesheet"
    href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.2/sl-1.7.0/datatables.min.css" />
<link rel="stylesheet" href="Editor-2.2.2/css/editor.dataTables.css">

<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.2/sl-1.7.0/datatables.min.js"></script>
<script src="Editor-2.2.2/js/dataTables.editor.js"></script>

<script>
    $(document).ready(function() {
        $('#company-table').DataTable();
    });
</script>
    <!-- forms grid -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .container_table {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
        }

    .alert-danger {
        color: red;
    }

    .alert-success {
        color: #5CB85C;
    }
</style>


<div class="container_table">
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm mb-2"
        style="width: 50px; float:right;">Add</a>
    <table id="company-table" class="table">
        <thead>
            <tr>
                <th> Category Name </th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr class="border-b">
                    <td class="p-2">{{ $category->category_name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                            style="width: 50px; " class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

</x-layout.default>