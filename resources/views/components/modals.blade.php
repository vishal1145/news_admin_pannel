<title>CR Ready Polytechnic</title>
<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Faculty List</li>
            </ol>
        </nav>
        <h2 class="h4">Edit Faculty</h2>
        </div>
            
            <a href="{{ route('forms') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
                Back To Faculty
            </a>

            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-8">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Teacher Information</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Type">Type:</label>
                            
                            <select name="Type" value="{{ old('Type', $livewire->Type ?? '') }}" class="form-select " aria-label="">
                                <option selected>Type</option>
                                <option value="Teaching" name="1">Teaching Faculty</option>
                                <option value="Non-Teaching" name="0">Non-Teaching Faculty</option>
                                
                            </select>

                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Sno</label>
                                <input type="text" name="sno" value="{{ old('sno', $livewire->sno ?? '') }}" class="form-control" placeholder="Sno">
                                @error('sno')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="employee">Name of the Employee</label>
                                <input type="text" name="employee" value="" class="form-control" placeholder="Name of the Employee">
                                @error('employee')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" value="" class="form-control" placeholder="Designation">
                            @error('designation')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="qualification">Qualification</label>
                                <input type="text" name="qualification" value="" class="form-control" placeholder="Qualification">
                                @error('qualification')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- @error('qualification') <div class="invalid-feedback">{{ $message }}</div> @enderror -->
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" value="" class="form-control" placeholder="Phone">
                            @error('phone')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="department">Department:</label>

                            <select name="department" value="" class="form-select " aria-label="">
                                <option selected>Department:-</option>
                                <option value="CE">Computer Engineering</option>
                                <option value="ECE">ECE</option>
                                <option value="EEE">EEE</option>
                                <option value="ME">Mechnical Engineering</option>
                                <option value="AI&ML">AI&ML Engineering</option>
                                <option value="CCN">CCN</option>
                                <option value="CE">Civil Engineering</option>
    
                            </select>
                            @error('department')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="photos">Photos</label>
                                <input type="file" name="photos" value="" class="form-control" placeholder="Photos">
                                @error('photos')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
                </form>
            </div>