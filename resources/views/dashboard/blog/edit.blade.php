@extends('dashboard.master')


@section('dashboard')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-body p-4">
                    <h4 class="text-center mb-3">Upload Blog Details</h4>
                    <form action="{{ route('edit.index',$blogs->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="blog" class="form-label fw-bold">Blog Title</label>
                            <input type="text" name="blog" class="form-control" id="blog"
                                placeholder="Enter blog title">
                            @error('blog')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="s_description" class="form-label fw-bold">Description</label>
                            <input type="text" name="description" class="form-control" id="s_description"
                                placeholder="Enter short description">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="banner" class="form-label fw-bold">Banner</label>
                            <div class="text-center">
                                <picture>
                                    <img src="{{ asset('dashboard/assets/images/default/default-2.png') }}"
                                        class="banner border rounded shadow-sm"
                                        style="width: 100%; max-height: 300px; object-fit:contain;" alt="Banner Preview">
                                </picture>
                                <input type="file" class="form-control mt-2" name="banner" id="banner"
                                    onchange="document.querySelector('.banner').src = window.URL.createObjectURL(this.files[0])">
                                @error('banner')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Update</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
    </div>
@endsection
