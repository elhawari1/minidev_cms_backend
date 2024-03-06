@extends('layout_admin.v_index')
@section('title', 'Goals')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Goals</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Goals</li>
                    </ol>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-success float-sm-right items-end" data-bs-toggle="modal"
                        data-bs-target="#insertModal">
                        <i class="fa-solid fa-plus"></i> Add Goals
                    </button>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Goals</h3>
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
                            @foreach ($goals as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->title_goals }}</td>
                                    <td>{!! $data->description_goals !!}</td>
                                    <td>{{ $data->usercreate_goals }}</td>
                                    <td>{{ $data->updateuser_goals }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateData{{ $data->id_goals }}" title="Edit Goals">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-danger delete"
                                            data-id="{{ $data->id_goals }}" data-title="{{ $data->title_goals }}"
                                            title="Delete Goals">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Goals</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/goals/store">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title</label>
                            <input type="text" name="title_goals" class="form-control" id="recipient-name"
                                placeholder="Title" value="{{ old('title_goals') }}">
                            @error('title_goals')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Description</label>
                            <textarea name="description_goals" id="summernote" placeholder="Description" class="form-control"
                                value="{{ old('description_goals') }}" cols="30" rows="10"></textarea>
                            @error('description_goals')
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
    @foreach ($goals as $data)
        <div class="modal fade" id="updateData{{ $data->id_goals }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Goals</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/goals/update/{{ $data->id_goals }}">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Title</label>
                                <input type="text" name="title_goals" class="form-control" id="recipient-name"
                                    value="{{ $data->title_goals }}">
                            </div>
                            <div class="mb-3">
                                <textarea name="description_goals" id="summernoteUpdate{{ $data->id_goals }}" placeholder="Description"
                                    class="form-control" value="{{ $data->description_goals }}" cols="30" rows="10">{{ $data->description_goals }}</textarea>
                                @error('description_goals')
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
            @foreach ($goals as $data)
                $('#summernoteUpdate{{ $data->id_goals }}').summernote({
                    placeholder: 'Description Goals',
                    tabsize: 2,
                    height: 255
                });
            @endforeach
        });

        @if (session('success'))
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @endif

        $('.delete').click(function() {
            var id_goals = $(this).data('id');
            var title_goals = $(this).data('title');
            Swal.fire({
                title: 'Are you sure?',
                html: "You want to delete this! <strong>" + title_goals + "</strong>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/goals/destroy/" + id_goals;
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
