@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    @if (session()->has('success'))
      
    <div class="alert alert-success col-lg-6" role="alert">
      {{ session('success') }}
    </div>

    @endif


    <div class="table-responsive col-lg-6">
      <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Category Name</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($categories as $category)

            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>

                <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span data-feather="x-circle" ><span data-feather="x-circle"></span></button>

                </form>

              </td>
            </tr>
            
          @endforeach
            
          </tbody>
        </table>
      </div>

      

      <script type="text/javascript">

          document.querySelector('.btnDelete').addEventListener('click', function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
             )
            }
          })
          })

      </script>

@endsection