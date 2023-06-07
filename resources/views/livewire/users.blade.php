<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Domain Meta List</li>
                </ol>
            </nav>
            <h2 class="h4">Edit Domain Meta</h2>
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
            <h2 class="h5 mb-4">Domain Meta Information</h2>
            <form action="{{ route('meta.store') }}" id="myform" method="POST" enctype="multipart/form-data">
                @csrf   

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="domain_id">Domain ID:</label>
                        <input type="text" name="domain_id" value="" class="form-control" placeholder="Domain ID" required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" value="" class="form-control" placeholder="Facebook">
                            @error('facebook')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
        </form>
    </div>
</body>
</html>
