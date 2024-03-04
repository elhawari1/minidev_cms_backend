@extends('layout_admin.v_index')
@section('title', 'Banner')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Banner</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-success float-sm-right items-end" data-bs-toggle="modal"
                        data-bs-target="#insertModal">
                        <i class="fa-solid fa-plus"></i> Add Banner
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
                                <th>Image</th>
                                <th>Title</th>
                                <th style="width: 40%">Description</th>
                                <th>User Create</th>
                                <th>Update User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ asset('Image/Banner/' . $data->image_banner) }}" target="_blank">
                                            <img src="{{ asset('Image/Banner/' . $data->image_banner) }}" alt=""
                                                style="height: 150px; width: 150px">
                                        </a>
                                    </td>
                                    <td>{{ $data->title_banner }}</td>
                                    <td>{!! $data->description_banner !!}</td>
                                    <td>{{ $data->usercreate_banner }}</td>
                                    <td>{{ $data->updateuser_banner }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateData{{ $data->id_banner }}" title="Edit banner">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <a href="#" class="btn btn-outline-danger delete"
                                            data-id="{{ $data->id_banner }}" data-title="{{ $data->title_banner }}"
                                            title="Delete About">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/banner/store" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Image</label>
                            <input id="input-fa" type="file" name="image_banner" value="{{ old('image_banner') }}"
                                class="form-control file" data-browse-on-zone-click="true">
                            @error('image_banner')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title</label>
                            <input type="text" name="title_banner" class="form-control" id="recipient-name"
                                placeholder="Title" value="{{ old('title_banner') }}">
                            @error('title_banner')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Description</label>
                            <textarea name="description_banner" id="summernote" class="form-control" value="{{ old('description_banner') }}"
                                cols="30" rows="10"></textarea>
                            @error('description_banner')
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
    @foreach ($banners as $data)
        <div class="modal fade" id="updateData{{ $data->id_banner }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Banner</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/banner/update/{{ $data->id_banner }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Image</label>
                                <input id="input-fa" type="file" name="image_banner" class="form-control file"
                                    data-browse-on-zone-click="true">
                                @error('image_banner')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Title</label>
                                <input type="text" name="title_banner" class="form-control" id="recipient-name"
                                    value="{{ $data->title_banner }}">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Description</label>
                                <textarea name="description_banner" id="summernoteUpdate" placeholder="Description" class="form-control"
                                    value="{{ $data->description_banner }}">{{ $data->description_banner }}</textarea>
                                @error('description_banner')
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
            var id_banner = $(this).data('id');
            var title_banner = $(this).data('title');
            Swal.fire({
                title: 'Are you sure?',
                html: "You want to delete this! <strong>" + title_banner + "</strong>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/banner/destroy/" + id_banner;
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
