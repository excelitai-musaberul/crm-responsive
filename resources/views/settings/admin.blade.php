@extends('master.master')
<link href="{{ asset('assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<style>
    .page-content {
        background-color: #E4E4EC;
        min-height: 100vh;
    }

</style>
@section('content')
    <div class="container-fluid">
        <div class="card p-4">
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <h6 class="">Shapla City Ltd</h6>
                    <p>Sara Tower (19th Floor), 11/A, Toyenbee Circular Road, Shapla Chattar, Motijheel C/A, Dhaka-1000</p>
                </div>
                <div>
                    <button class="btn btn-sky-blue px-3" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add
                        Admin</button>
                </div>
            </div>


            <table id="datatable-buttons"
                class="table table-striped table-bordered dt-responsive wrap datatable-buttons-class"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Image</th>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-2.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-3.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-4.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-5.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="{{ asset('assets/images/users/user-1.jpg') }}"
                                style="width: 50px; height: 50px; border-radius:50px"></td>
                        <td>Md. Mukter Ali</td>
                        <td>mukter@gmail.com</td>
                        <td>01756932475</td>
                        <td class="action-col text-center">
                            <a href="#" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        {{-- ----------------- Add Super Admin Modal --------------------- --}}
        <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable custom-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title flex-grow-1 text-center fw-normal" id="exampleModalLabel">Add Admin
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4">
                        <form action="">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Admin Name</label>
                                <input type="text" class="form-control p-2 px-3" placeholder="Enter Admin Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" class="form-control p-2 px-3" placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control p-2 px-3" placeholder="Enter Password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Confirm Password</label>
                                <input type="password" class="form-control p-2 px-3" placeholder="Enter Confirm Password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input type="text" class="form-control p-2 px-3" placeholder="Enter Phone Number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Admin Image</label>
                                <input onchange="loadImage(event)" class="form-control mb-2" type="file" id="formFile">
                                <img id="admin-image-preview" accept="image/*" style="height: 150px;"
                                    src="{{ asset('assets/images/users/profile_av.png') }}" alt="" srcset="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Choose CRM</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select any specific CRM</option>
                                    <option value="1">Shapla City Ltd.</option>
                                    <option value="2">Royal Dutch Medical college Hospital</option>
                                    <option value="3">Hotel Holiday Intercontinental</option>
                                </select>
                            </div>
                            <div class="mb-3 mt-4 text-end">
                                <button type="submit" class="btn btn-success px-4">Add</button>
                                <button type="button" class="btn btn-danger px-3" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>

    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

    <script>
        var loadImage = function(event) {
            var image = document.getElementById('admin-image-preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
