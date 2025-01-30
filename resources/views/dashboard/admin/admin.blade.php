@extends('dashboard.master')


@section('dashboard')
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-body p-4">
                    <h4 class="text-center mb-3">Upload Blog Details</h4>
                    <form action="{{ route('admin.update',$users->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="banner" class="form-label fw-bold">Profile</label>
                            <div class="text-center">
                                <picture>
                                    <img src="{{ asset('dashboard/assets/images/default/default-2.png') }}"
                                        class="profile border rounded shadow-sm"
                                        style="width: 200px; max-height: 200px; object-fit:contain;" alt="Banner Preview">
                                </picture>
                                <input type="file" class="form-control mt-2" name="profile" id="profile"
                                    onchange="document.querySelector('.profile').src = window.URL.createObjectURL(this.files[0])">
                                @error('profile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="blog" class="form-label fw-bold">Username</label>
                            <input type="text" name="username" class="form-control" id="blog"
                                placeholder="Enter blog title">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control" id=""
                                placeholder="Enter your email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" id=""
                                placeholder="Enter your password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Update</button>
                        </div>

                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
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
                                            <th>Profile</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                @if (Auth()->user()->profile == 'default.jpg')
                                                    <img src="{{ asset('dashboard/assets/images/default/default-2.png') }}"
                                                        style="width: 200px;height: 200px;object-fit:contain;"
                                                        alt="">
                                                @else
                                                    <img src="{{ asset('dashboard/assets/images/profile/'.$users->profile) }}" style="width: 200px;height: 200px;object-fit:contain;" alt="">
                                                @endif
                                            </td>
                                            <td>{{ Auth()->user()->name }}</td>
                                            <td>{{ Auth()->user()->email }}</td>
                                            <td>{{ \Carbon\Carbon::parse(Auth()->user()->created_at)->diffForHumans() }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse(Auth()->user()->updated_at)->diffForHumans() }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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