<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets2/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets2/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets2/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets2/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('assets2/images/logo.svg')}}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets2/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-xl-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search products">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{asset('assets2/images/faces/face16.jpg')}}" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{auth()->user()->name}}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('assets2/images/faces/face16.jpg')}}" alt="">
                </div>
                <div class="p-2">

                  <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                    <form action="{{route('adminlogout')}}" method="POST">
                        @csrf
                        <button class="dropdown-item py-1 d-flex align-items-center justify-content-between" type="submit">
                            <span>Log Out</span>
                            <i class="mdi mdi-logout ml-1"></i>
                        </button>
                    </form>
                </div>
              </div>
            </li>

          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('adminindex')}}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="{{route('adminsections.index')}}">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Sections</span>
              </a>
            </li>


            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>

                  </div>
                </div>
              </div>
            </li>


            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <form action="{{route('adminlogout')}}" method="POST">
                    @csrf
                    <button class="nav-link" type="submit">
                        <i class="mdi mdi-logout"></i>
                        <span>Log Out</span>
                    </button>
                </form>

              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <h2>Edit Section</h2>

                    <!-- Section Update Form -->
                    <form action="{{ route('adminsections.update', $section->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Section Title -->
                        <div class="form-group">
                            <label for="section_title_en">Title (English)</label>
                            <input type="text" class="form-control" id="section_title_en" name="section_title_en" value="{{ old('section_title_en', $section->section_title_en) }}">
                        </div>
                        <div class="form-group">
                            <label for="section_title_ar">Title (Arabic)</label>
                            <input type="text" class="form-control" id="section_title_ar" name="section_title_ar" value="{{ old('section_title_ar', $section->section_title_ar) }}">
                        </div>

                        <!-- Section Description -->
                        <div class="form-group">
                            <label for="section_description_en">Description (English)</label>
                            <textarea class="form-control" id="section_description_en" name="section_description_en">{{ old('section_description_en', $section->section_description_en) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="section_description_ar">Description (Arabic)</label>
                            <textarea class="form-control" id="section_description_ar" name="section_description_ar">{{ old('section_description_ar', $section->section_description_ar) }}</textarea>
                        </div>

                        <!-- Is Visible -->
                        <div class="form-group form-check">
                            <!-- Hidden input to handle unchecked state -->
                            <input type="hidden" name="is_visable" value="0">
                            <!-- Checkbox for visible state -->
                            <input type="checkbox" class="form-check-input" id="is_visable" name="is_visable" value="1" {{ old('is_visable', $section->is_visable) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_visable">Visible</label>
                        </div>

                        <!-- Images -->
                        <div class="form-group">
                            <label for="images">Upload Images</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Section</button>
                    </form>

                    <br><br>
                    <!-- Existing Images with Delete Option -->
                    <div class="form-group">
                        <label>Existing Images</label>
                        <div class="row">
                            @foreach($section->images as $image)
                                <div class="col-md-3">
                                    <div class="card mb-3">
                                        <img src="{{ asset('storage/uploads/' . basename($image->image)) }}" class="card-img-top" alt="Image">
                                        <div class="card-body">
                                            <form action="{{ route('adminsections.image.destroy', $image->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">

            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{asset('assets2/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{asset('assets2/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('assets2/vendors/jquery-circle-progress/js/circle-progress.min.js')}}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('assets2/js/off-canvas.js')}}"></script>
        <script src="{{asset('assets2/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('assets2/js/misc.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{asset('assets2/js/dashboard.js')}}"></script>
        <!-- End custom js for this page -->
  </body>
</html>
