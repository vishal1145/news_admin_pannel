<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link href="https://semantic-ui.com/dist/semantic.min.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>
<style>
    .card-img-top {
        height: 200px;
        max-width: 100%;
    }

    input[type="checkbox"]:disabled+label::before {
        background: blue;
    }

    input[type="checkbox"]:disabled+label:hover::before {
        background: blue;
        border: 1px solid #d4d4d5;
    }

    .chckbox .card {
        margin-top: 1.5rem;
    }



    .btn-group1 {
        text-align: right;
    }

    .titleDiv {
        padding: 10px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid lightgreen;
        color: lightgreen;
    }

    .btn-outline-danger {
        height: 65%;
        width: 55%;
        margin: 6px;
        margin-left: 55px;
    }
</style>

<body>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent" style="margin-bottom: auto;">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </nav>
            <h2 class="h4">Category</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('bootstrap-tables', [ 'tid' => '-1' ]) }}" class="btn btn-pill btn-outline-primary">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                New Category
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                <form>
                    <select class="form-control" name="domain_name" id="domain_name">
                        <option disabled selected {{is_null(request()->input('domain_name')) ? 'selected' : ''}} value=""> Domain</option>
                        @foreach(App\Models\Domain::all() as $key=> $domain_name)
                        <option value="{{$domain_name->id}}">{{$domain_name->domain_name}}</option>
                        @endforeach
                    </select>
            </div>
            <button type="submit" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-left: 15px;" data-bs-original-title="" title="">
                Filter
            </button>
            </form>
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-9 col-lg-8 d-md-flex">
                <div class="input-group me-2 me-lg-3 fmxw-300">
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <tbody>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 15px;">
                    <?php
                    $imageUrl = $category->photos;
                    $isHttps = strpos($imageUrl, 'https://') === 0;
                    ?>
                    <img class="card-img-top img-fluid img-hover" src="{{ $isHttps ? $imageUrl : url('storage/' . $imageUrl) }}" alt="Image" style="object-fit:cover;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-text">
                                    <td><b> {{ $category->Name }} </b></td>
                                </p>
                            </div>
                            <div class="col">
                                <!-- @if($category->Display_in_home == 1)
                                <button type="button" class="btn btn-outline-danger">
                                    Home
                                </button>
                                @else

                                @endif

                                @if($category->Display_in_header == 1)
                                <button type="button" class="btn btn-outline-danger">
                                    Header
                                </button>
                                @else

                                @endif -->
                                @if($category->Display_in_home == 1)
                                <div class="ui disabled checkbox" style="float: right;">
                                    <input type="checkbox" name="Display_in_home" value="{{ $category->Display_in_home }}" disabled="disabled">
                                    <label>Home</label><br>
                                </div>
                                @else
                                <div class="ui disabled checkbox" style="float: right;">
                                    <input type="checkbox" name="Display_in_home" value="{{ $category->Display_in_home }}" disable="disabled">
                                    <label>Home</label><br>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @if($category->Display_in_header == 1)
                                <div class="ui disabled checkbox" style="float: right;">
                                    <input type="checkbox" name="Display_in_header" value="{{ $category->Display_in_header }}" disabled="disabled">
                                    <label>Header</label>
                                </div>
                                @else
                                <div class="ui disabled checkbox" style="float: right;">
                                    <input type="checkbox" name="Display_in_header" value="{{ $category->Display_in_header }}" disable="disabled">
                                    <label>Header</label>
                                </div>
                                @endif
                            </div>
                        </div>

                        <p class="card-text">
                            <td>{{ $category->domain_name }}</td>
                        </p>
                        <?php
                        // $tid = [ 'tid' =>  $category->id];
                        // $catid = [ 'catid' =>  $category->id];
                        ?>
                        <div class="E-D-btn">
                            <form action="{{ route('category.destroy',$category->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group1" style="display: flex; justify-content: space-between;">
                                    <a href="{{ route('upgrade-to-pro', [ 'tid' => '-1' ]) }}" class="btn btn-pill btn-outline-success">
                                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                            </path>
                                        </svg>
                                        Sub Category
                                    </a>
                                    <div style="display:flex; gap:10px;">
                                        <a class="btn btn-primary" href="{{ route('bootstrap-tables', [ 'tid' =>  $category->id]) }}"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn show_confirm btn-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </tbody>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if(Session::has('error'))
            toastr.error('{{ Session::get('
                error ') }}');
            @elseif(Session::has('success'))
            toastr.success('{{ Session::get('
                success ') }}');
            @endif
        });
    </script>

</body>

</html>