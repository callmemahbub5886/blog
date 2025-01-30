@extends('dashboard.master')

@section('dashboard')
    <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-12">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-body p-4">
                    <h4 class="text-center mb-3">Upload Blog Details</h4>
                    <form action="{{ route('blog.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                            <button type="submit" class="btn btn-success px-4">Upload</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Blog List</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row dt-row">
                            <div class="col-sm-12">
                                <table id="basic-datatable"
                                    class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                    aria-describedby="basic-datatable_info" style="width: 903px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Blog</th>
                                            <th>Short description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Breaking news</th>
                                            <th>Action</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp

                                        @if ($blogs->isNotEmpty())
                                            @foreach ($blogs as $blog)
                                                <tr class="odd">
                                                    <td>{{ $i++ }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $blog->title }}
                                                    </td>
                                                    <td>{{ $blog->description }}</td>
                                                    <td>
                                                        @if ($blog->banner == 'default.jpg')
                                                            <img style="width: 80px;height: 80px;object-fit:cover;"
                                                                src="{{ asset('dashboard/assets/images/default/default-2.png') }}"
                                                                alt="">
                                                        @else
                                                            <img style="width: 80px;height: 80px;object-fit:cover;"
                                                                src="{{ asset('dashboard/assets/images/blogs/' . $blog->banner) }}"
                                                                alt="">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('status', $blog->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="status" onchange="this.form.submit()"
                                                                    {{ $blog->status === 'active' ? 'checked' : '' }}>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>

                                                        <form action="{{ route('breaking.news', $blog->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input class="form-check-input" type="checkbox" name="breaking"
                                                            onchange="this.form.submit()"
                                                            {{ $blog->breaking === 'breaking' ? 'checked' : '' }}>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <div class="buttons d-flex">
                                                            <a href="{{ route('blog_edit', $blog->id) }}"
                                                                class="btn btn-primary mx-2"><i class='bx bxs-edit'></i></a>
                                                            <form action="{{ route('blog.delete', $blog->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger"><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($blog->updated_at)->diffForHumans() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <div class="jumbotron jumbotron-fluid">
                                                <div class="container">
                                                    <h1 class="display-4">No Blog Available Now</h1>
                                                </div>
                                            </div>
                                        @endif

                                    </tbody>
                                </table>

                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
@endsection

@section('script')
    @if (session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 5000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif
@endsection
