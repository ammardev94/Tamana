@extends('admin.default')

@section('css')
<style>
    .error {
        color: red;
        font-size: 0.875em;
    }
    .is-invalid {
        border-color: red;
    }
    .is-valid {
        border-color: green;
    }
    .invalid-feedback {
        display: block;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Add Book</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.book.index') }}">Books</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Book</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Book Details</h3>
            </div>
            <form action="javascript:void(0);" method="POST" enctype="multipart/form-data" id="bookForm">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   placeholder="Enter book title">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="publisher" class="form-label">Publisher *</label>
                            <input type="text" name="publisher" id="publisher" class="form-control"
                                   placeholder="Enter publisher name">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="edition" class="form-label">Edition</label>
                            <input type="text" name="edition" id="edition" class="form-control"
                                   placeholder="e.g., 1st, 2nd, Revised">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="year_published" class="form-label">Year Published *</label>
                            <input type="number" name="year_published" id="year_published" class="form-control"
                                   placeholder="e.g., 2025">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="isbn" class="form-label">ISBN *</label>
                            <input type="text" name="isbn" id="isbn" class="form-control"
                                   placeholder="Enter ISBN number">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="language" class="form-label">Language *</label>
                            <input type="text" name="language" id="language" class="form-control"
                                   placeholder="e.g., English, en">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="cover_image_url" class="form-label">Cover Image</label>
                            <input type="file" name="cover_image_url" id="cover_image_url" class="form-control">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="has_digital_copy" class="form-label">Has Digital Copy *</label>
                            <select name="has_digital_copy" id="has_digital_copy" class="form-control">
                                <option value="">Select option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="digital_copy_url" class="form-label">Digital Copy (PDF)</label>
                            <input type="file" name="digital_copy_url" id="digital_copy_url" class="form-control">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="usage_type" class="form-label">Usage Type *</label>
                            <input type="text" name="usage_type" id="usage_type" class="form-control"
                                   placeholder="e.g., Textbook, Workbook">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control"
                                   placeholder="Enter price">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="stock_quantity" class="form-label">Stock Quantity</label>
                            <input type="number" name="stock_quantity" id="stock_quantity" class="form-control"
                                   placeholder="Enter stock quantity">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select status</option>
                                <option value="Available">Available</option>
                                <option value="Out of Stock">Out of Stock</option>
                                <option value="Archived">Archived</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea name="description" id="description" rows="3" class="form-control"
                                      placeholder="Enter a short description"></textarea>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label for="table_of_contents" class="form-label">Table of Contents</label>
                            <textarea name="table_of_contents" id="table_of_contents" rows="3" class="form-control"
                                      placeholder="Enter table of contents or chapter summary"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                    <a href="{{ route('admin.book.index') }}" class="btn btn-light me-2"><i class="fas fa-times-circle"></i> Cancel</a>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function () {
    $.validator.addMethod("extension", function (value, element, param) {
        param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|pdf";
        return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
    }, "Invalid file type");

    $("#bookForm").validate({
        rules: {
            title: { required: true },
            publisher: { required: true },
            year_published: { required: true, digits: true },
            isbn: { required: true },
            language: { required: true },
            description: { required: true },
            has_digital_copy: { required: true },
            usage_type: { required: true },
            cover_image_url: { extension: "jpg,jpeg,png" },
            digital_copy_url: { extension: "pdf" },
            price: { number: true, min: 0 },
            stock_quantity: { digits: true, min: 0 }
        },
        messages: {
            title: { required: "Please enter the book title" },
            publisher: { required: "Please enter the publisher name" },
            year_published: { required: "Please enter the year published", digits: "Year must be numeric" },
            isbn: { required: "Please enter the ISBN" },
            language: { required: "Please enter the language" },
            description: { required: "Please enter a short description" },
            has_digital_copy: { required: "Please select if the book has a digital copy" },
            usage_type: { required: "Please enter the usage type" },
            cover_image_url: { extension: "Only JPG, JPEG, PNG files are allowed" },
            digital_copy_url: { extension: "Only PDF files are allowed" },
            price: { number: "Please enter a valid price", min: "Price cannot be negative" },
            stock_quantity: { digits: "Stock must be a whole number", min: "Stock cannot be negative" }
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },
        errorElement: "div",
        errorClass: "invalid-feedback"
    });
});
</script>
@endsection
