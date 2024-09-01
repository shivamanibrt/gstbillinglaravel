@extends('layout.app')

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold text-uppercase">Add Clients</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Start Form  -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Display success message -->
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Display validation errors -->
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif

                    <h4 class="header-title text-uppercase">Basic Info</h4>
                    <hr>
                    <form class="needs-validation" method="post" action="{{ route('create-party') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="party_type">Type</label>
                                    <select name="party_type" class="form-control border-bottom" id="party_type">
                                        <option value="client" {{ old('party_type') == 'client' ? 'selected' : '' }}>Client</option>
                                        <option value="vendor" {{ old('party_type') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                        <option value="employee" {{ old('party_type') == 'employee' ? 'selected' : '' }}>Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control border-bottom" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="Enter client's full name">
                                    <div class="invalid-feedback">
                                        Please provide a Full name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="phone_no">Phone/Mobile Number</label>
                                    <input type="text" name="phone_no" class="form-control border-bottom" id="phone_no" value="{{ old('phone_no') }}" placeholder="Enter phone/mobile number">
                                    <div class="invalid-feedback">
                                        Please provide a Number.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control border-bottom" id="address" value="{{ old('address') }}" placeholder="Enter Address">
                                    <div class="invalid-feedback">
                                        Please provide a valid Address.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="header-title text-uppercase">Bank Details</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="account_holder_name">Account Holder Name</label>
                                    <input type="text" name="account_holder_name" class="form-control border-bottom" id="account_holder_name" value="{{ old('account_holder_name') }}" placeholder="Enter Account Holder name">
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="account_no">Account Number</label>
                                    <input type="text" name="account_no" class="form-control border-bottom" id="account_no" value="{{ old('account_no') }}" placeholder="Enter Account Number">
                                    <div class="invalid-feedback">
                                        Please provide a valid Code.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="bank_name">Bank Name</label>
                                    <input name="bank_name" type="text" class="form-control border-bottom" id="bank_name" value="{{ old('bank_name') }}" placeholder="Enter Bank Name">
                                    <div class="invalid-feedback">
                                        Please provide a GSTIN No.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="ifcs_code">IFSC Code</label>
                                    <input name="ifcs_code" type="text" class="form-control border-bottom" id="ifcs_code" value="{{ old('ifcs_code') }}" placeholder="Enter IFSC Code">
                                    <div class="invalid-feedback">
                                        Please provide an Email.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="branch_address">Branch</label>
                                    <input name="branch_address" type="text" class="form-control border-bottom" id="branch_address" value="{{ old('branch_address') }}" placeholder="Enter Branch">
                                    <div class="invalid-feedback">
                                        Please provide a Branch Name.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection