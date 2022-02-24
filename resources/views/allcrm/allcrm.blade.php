@extends('master.master')
<style>
    .page-content {
        background-color: #E4E4EC;
        min-height: 100vh;
    }

</style>
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center pt-4">
            <h5>All CRM</h5>
            <button data-bs-toggle="modal" data-bs-target="#addProject" class="btn btn-sky-blue px-4 text-white">Add
                Project</button>
        </div>

        <div class="row mb-5">
            @foreach ($crms as $crm)
                <div class="col-lg-4 col-md-6 col-12 mt-4">
                    <div class="crm-card">
                        <div class="crm-card-header text-center">
                            {{ $crm->name }}
                        </div>
                        <div class="crm-card-body p-4">
                            <p>Address: {{ $crm->address }}</p>
                            <p>Contact Person: Contact Person</p>
                            <p>Contact Number: Contact Number</p>
                            <p>Started Date: {{ $crm->created_at }}</p>
                        </div>
                        <div class="crm-card-footer">
                            <a href="{{ route('super_admin.crm-dashboard') }}" class="btn btn-enter">Enter</a>
                            <a href="#" class="btn btn-edit">Edit</a>
                            <a href="#" class="btn btn-delete">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="custom-pagination">
            <ul>
                <li><a href="#"><i class="fas fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
            </ul>
        </div>


        {{-- ----------------- Add Super Admin Modal --------------------- --}}
        <div class="modal fade" id="addProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered custom-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title flex-grow-1 text-center fw-normal" id="exampleModalLabel">Add Project
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4">
                        <form action="">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Address</label>
                                <input type="text" class="form-control p-2 px-3" placeholder="Enter Address">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Contact Person</label>
                                <input type="text" class="form-control p-2 px-3" placeholder="Enter Contact Person">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Contact Number</label>
                                <input type="text" class="form-control p-2 px-3" placeholder="Enter Contact Number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Started Date</label>
                                <input type="date" class="form-control p-2 px-3" placeholder="Enter Confirm Password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Project</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
