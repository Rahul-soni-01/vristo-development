<x-layout.default>
    
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
    .alert-danger{
        color: red;
    }
    </style>


<form action="{{ route('categories.store') }}" method="post">
    @csrf
    
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Category Name:</label>
        <input type="text" name="category_name" id="name" class="mt-1 p-2 w-full border rounded-md" required>
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="px-4 py-2 bg-blue-500  rounded-md">Submit</button>
        <button type="reset" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Reset</button>
    </div>
</form>

</x-layout.default>