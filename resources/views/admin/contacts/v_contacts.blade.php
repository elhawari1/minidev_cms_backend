@extends('layout_admin.v_index')
@section('title', 'Contact')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Contact</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-success float-sm-right items-end" data-bs-toggle="modal"
                        data-bs-target="#insertModal">
                        <i class="fa-solid fa-plus"></i> Add Contact
                    </button>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Contact</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-start">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>User IG</th>
                                <th>Update User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->phonenumber_contact }}</td>
                                    <td>{{ $data->email_contact }}</td>
                                    <td>{{ $data->usernameig_contact }}</td>
                                    <td>{{ $data->usercreate_contacts }}</td>
                                    <td>{{ $data->updateuser_contacts }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateData{{ $data->id_contacts }}" title="Edit Contact">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-danger delete"
                                            data-id="{{ $data->id_contacts }}" data-phone="{{ $data->phonenumber_contact }}"
                                            title="Delete Contact">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/contacts/store">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Phone</label>
                            <input type="number" name="phonenumber_contact" class="form-control" id="recipient-name"
                                placeholder="Phone" value="{{ old('phonenumber_contact') }}">
                            @error('phonenumber_contact')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="email" name="email_contact" class="form-control" id="recipient-name"
                                placeholder="Email" value="{{ old('email_contact') }}">
                            @error('email_contact')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Instagram</label>
                            <input type="text" name="usernameig_contact" class="form-control" id="recipient-name"
                                placeholder="Instagram" value="{{ old('usernameig_contact') }}">
                            @error('usernameig_contact')
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
    @foreach ($contacts as $data)
        <div class="modal fade" id="updateData{{ $data->id_contacts }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Contacts</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/contacts/update/{{ $data->id_contacts }}">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Phone</label>
                                <input type="number" name="phonenumber_contact" class="form-control"
                                    id="recipient-name" placeholder="Phone" value="{{ $data->phonenumber_contact }}">
                                @error('phonenumber_contact')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Email</label>
                                <input type="email" name="email_contact" class="form-control" id="recipient-name"
                                    placeholder="Email" value="{{ $data->email_contact }}">
                                @error('email_contact')
                                    <p class="tex text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Instagram</label>
                                <input type="text" name="usernameig_contact" class="form-control" id="recipient-name"
                                    placeholder="Instagram" value="{{ $data->usernameig_contact }}">
                                @error('usernameig_contact')
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
        @if (session('success'))
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @endif

        $('.delete').click(function() {
            var id_contacts = $(this).data('id');
            var title_contacts = $(this).data('title');
            Swal.fire({
                title: 'Are you sure?',
                html: "You want to delete this! <strong>" + title_contacts + "</strong>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/contacts/destroy/" + id_contacts;
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
