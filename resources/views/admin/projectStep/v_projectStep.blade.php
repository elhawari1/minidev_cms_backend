@extends('layout_admin.v_index')
@section('title', 'ProjectStep')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">ProjectStep</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">ProjectStep</li>
                    </ol>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-success float-sm-right items-end" data-bs-toggle="modal"
                        data-bs-target="#insertModal">
                        <i class="fa-solid fa-plus"></i> Add ProjectStep
                    </button>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data ProjectStep</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-start">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>User Create</th>
                                <th>Update User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectStep as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ $data->image_projectstep }}" target="_blank">
                                            <img src="{{ $data->image_projectstep }}" alt=""
                                                style="height: 150px; width: 150px">
                                        </a>
                                    </td>
                                    </td>
                                    <td>{{ $data->name_projectstep }}</td>
                                    <td>{{ $data->usercreate_projectstep }}</td>
                                    <td>{{ $data->userupdate_projectstep }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateData{{ $data->id_projectstep }}"
                                            title="Edit ProjectStep">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-danger delete"
                                            data-id="{{ $data->id_projectstep }}" data-name="{{ $data->name_projectstep }}"
                                            title="Delete ProjectStep">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- Insert Data --}}
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add ProjectStep</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/projectStep/store" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Image</label>
                            <input id="input-fa" type="file" name="image_projectstep"
                                value="{{ old('image_projectstep') }}" class="form-control file"
                                data-browse-on-zone-click="true">
                            @error('image_projectstep')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" name="name_projectstep" class="form-control" id="recipient-name"
                                placeholder="Name Project Step" value="{{ old('name_projectstep') }}">
                            @error('name_projectstep')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Update Data --}}
    @foreach ($projectStep as $data)
        <div class="modal fade" id="updateData{{ $data->id_projectstep }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update ProjectStep</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/projectStep/update/{{ $data->id_projectstep }}"
                            enctype="multipart/form-data">
                            @csrf
                            <label for="recipient-name" class="col-form-label">Image</label>
                            <input id="input-fa" type="file" name="image_projectstep"
                                value="{{ old('image_projectstep') }}" class="form-control file"
                                data-browse-on-zone-click="true">
                            @error('image_projectstep')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Name</label>
                                <input type="text" name="name_projectstep" class="form-control" id="recipient-name"
                                    value="{{ $data->name_projectstep }}">
                                @error('name_projectstep')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
@section('js')
    <script>
        $(function() {
            // Summernote
            $('#summernoteUpdate').summernote({
                placeholder: 'Description Product',
                tabsize: 2,
                height: 255
            });
        })

        @if (session('success'))
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @endif

        $('.delete').click(function() {
            var id_projectstep = $(this).data('id');
            var name_projectstep = $(this).data('name');
            Swal.fire({
                title: 'Are you sure?',
                html: "You want to delete this! <strong>" + name_projectstep + "</strong>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/projectStep/destroy/" + id_projectstep;
                    Swal.fire(
                        'Deleted!',
                        'Data deleted successfully.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
