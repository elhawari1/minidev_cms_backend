@extends('layout_admin.v_index')
@section('title', 'Vission')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Vission</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vission</li>
                    </ol>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-success float-sm-right items-end" data-bs-toggle="modal"
                        data-bs-target="#insertModal">
                        <i class="fa-solid fa-plus"></i> Add Vission
                    </button>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-start">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th style="width: 40%">Description</th>
                                <th>User Create</th>
                                <th>Update User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vissions as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->title_vission }}</td>
                                    <td>{!! $data->description_vission !!}</td>
                                    <td>{{ $data->usercreate_vission }}</td>
                                    <td>{{ $data->updateuser_vission }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateData{{ $data->id_vission }}" title="Edit Vission">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-danger delete"
                                            data-id="{{ $data->id_vission }}" data-title="{{ $data->title_vission }}"
                                            title="Delete Vission">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/vissions/store">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title</label>
                            <input type="text" name="title_vission" class="form-control" id="recipient-name"
                                placeholder="Title" value="{{ old('title_vission') }}">
                            @error('title_vission')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Description</label>
                            <textarea name="description_vission" id="summernote" placeholder="Description" class="form-control"
                                value="{{ old('description_vission') }}" cols="30" rows="10"></textarea>
                            @error('description_vission')
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
    @foreach ($vissions as $data)
        <div class="modal fade" id="updateData{{ $data->id_vission }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vission</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/vissions/update/{{ $data->id_vission }}">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Title</label>
                                <input type="text" name="title_vission" class="form-control" id="recipient-name"
                                    value="{{ $data->title_vission }}">
                            </div>
                            <div class="mb-3">
                                <textarea name="description_vission" id="summernoteUpdate" placeholder="Description" class="form-control"
                                    value="{{ $data->description_vission }}" cols="30" rows="10">{{ $data->description_vission }}</textarea>
                                @error('description_vission')
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
            var id_vission = $(this).data('id');
            var title_vission = $(this).data('title');
            Swal.fire({
                title: 'Are you sure?',
                html: "You want to delete this! <strong>" + title_vission + "</strong>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/vissions/destroy/" + id_vission;
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
