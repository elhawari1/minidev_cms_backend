@extends('layout_admin.v_index')
@section('title', 'Portofolio')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Portofolio</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Portofolio</li>
                    </ol>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-success float-sm-right items-end" data-bs-toggle="modal"
                        data-bs-target="#insertModal">
                        <i class="fa-solid fa-plus"></i> Add Portofolio
                    </button>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Portofolio</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-start">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Service</th>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>User Create</th>
                                <th>Update User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portofolio as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->services->name_service }}</td>
                                    <td>{{ $data->title_portofolio }}</td>
                                    <td>{{ $data->date_start }}</td>
                                    <td>{{ $data->usercreate_portofolio }}</td>
                                    <td>{{ $data->updateuser_portofolio }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#showData{{ $data->id_portofolio }}" title="Edit Portofolio">
                                            <i class="fa-solid fa-info"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateData{{ $data->id_portofolio }}" title="Edit Portofolio">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-danger delete"
                                            data-id="{{ $data->id_portofolio }}" data-title="{{ $data->title_portofolio }}"
                                            title="Delete Portofolio">
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

    {{-- Show Data --}}
    @foreach ($portofolio as $data)
        <div class="modal fade" id="showData{{ $data->id_portofolio }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Portofolio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container text-center">
                            <div class="container text-left">
                                <div class="row">
                                    <div class="col-3">
                                        <b>Service</b>
                                    </div>
                                    <div class="col-9">
                                        <span> {{ $data->services->name_service }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <b>Title</b>
                                    </div>
                                    <div class="col-9">
                                        <span> {{ $data->title_portofolio }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <b>Start Date</b>
                                    </div>
                                    <div class="col-9">
                                        <span> {{ $data->date_start }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <b>Start End</b>
                                    </div>
                                    <div class="col-9">
                                        <span>{{ $data->date_start }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <b>Description</b>
                                    </div>
                                    <div class="col-9">
                                        <span> {!! $data->description_portofolio !!}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <b>Image</b>
                                    </div>
                                    <div class="col-9">
                                        <a href="{{ asset('Image/Portofolio/' . $data->image_portofolio) }}"
                                            data-lightbox="models" data-title="{{ $data->title }}">
                                            <img src="{{ asset('Image/Portofolio/' . $data->image_portofolio) }}"
                                                class="img-thumbnail" style="width: 200px">
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <b>User Create</b>
                                    </div>
                                    <div class="col-9">
                                        <span> {{ $data->usercreate_portofolio }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <b>User Update</b>
                                    </div>
                                    <div class="col-9">
                                        <span> {{ $data->updateuser_portofolio }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    @endforeach

    {{-- Insert Data --}}
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Portofolio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/portofolio/store" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Service</label>
                            <select class="form-select" name="id_service" aria-label="Default select example">
                                <option selected> ===> Pick Service <=== </option>
                                        @foreach ($services as $data)
                                <option value="{{ $data->id_service }}">{{ $data->name_service }}</option>
                                @error('id_service')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">

                            <label for="recipient-name" class="col-form-label">Image</label>
                            <input id="input-fa" type="file" name="image_portofolio"
                                value="{{ old('image_portofolio') }}" class="form-control file"
                                data-browse-on-zone-click="true">
                            @error('image_portofolio')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title</label>
                            <input type="text" name="title_portofolio" class="form-control" placeholder="Title"
                                value="{{ old('title_portofolio') }}">
                            @error('title_portofolio')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">Start Date</label>
                                <input type="date" name="date_start"
                                    class="form-control"value="{{ old('date_start') }}">
                                @error('date_start')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="recipient-name" class="col-form-label">End Date</label>
                                <input type="date" name="date_end" class="form-control"
                                    value="{{ old('date_end') }}">
                                @error('date_end')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Description</label>
                            <textarea name="description_portofolio" id="summernote" placeholder="Description" class="form-control"
                                value="{{ old('description_portofolio') }}" cols="30" rows="10"></textarea>
                            @error('description_portofolio')
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
    @foreach ($portofolio as $data)
        <div class="modal fade" id="updateData{{ $data->id_portofolio }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Portofolio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/portofolio/update/{{ $data->id_portofolio }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Service</label>
                                <select class="form-select" name="id_service" aria-label="Default select example">
                                    @foreach ($services as $item)
                                        <option value="{{ $item->id_service }}"
                                            @if ($item->id_service == $data->id_service) selected @endif>{{ $item->name_service }}
                                        </option>
                                        @error('id_service')
                                            <p class="tex text-danger">{{ $message }}</p>
                                        @enderror
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Title</label>
                                <input type="text" name="title_portofolio" class="form-control" placeholder="Title"
                                    value="{{ $data->title_portofolio }}">
                                @error('title_portofolio')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="recipient-name" class="col-form-label">Start Date</label>
                                    <input type="date" name="date_start"
                                        class="form-control"value="{{ $data->date_start }}">
                                    @error('date_start')
                                        <p class="tex text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="recipient-name" class="col-form-label">End Date</label>
                                    <input type="date" name="date_end" class="form-control"
                                        value="{{ $data->date_end }}">
                                    @error('date_end')
                                        <p class="tex text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Description</label>
                                <textarea name="description_portofolio" id="summernoteUpdate{{ $data->id_portofolio }}" placeholder="Description"
                                    class="form-control" value="{{ $data->description_portofolio }}" cols="30" rows="10">{{ $data->description_portofolio }}</textarea>
                                @error('description_portofolio ')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Image</label>
                                <input id="input-fa" type="file" name="image_portofolio" class="form-control file"
                                    data-browse-on-zone-click="true">
                                @error('image_portofolio')
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
            @foreach ($portofolio as $data)
                $('#summernoteUpdate{{ $data->id_portofolio }}').summernote({
                    placeholder: 'Description Product',
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
            var id_portofolio = $(this).data('id');
            var title_portofolio = $(this).data('title');
            Swal.fire({
                title: 'Are you sure?',
                html: "You want to delete this! <strong>" + title_portofolio + "</strong>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/portofolio/destroy/" + id_portofolio;
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
