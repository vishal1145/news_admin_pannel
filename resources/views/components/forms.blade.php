<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    {{-- toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>
<style>
    .outline {
        background: lightgreen;
        padding: 10px;
    }

    .line {
        line-height: 0.5;
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
                    <li class="breadcrumb-item active" aria-current="page">News List</li>
                </ol>
            </nav>
            <h2 class="h4">News List</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('profile-example', [ 'tid' => '-1' ]) }}" class="btn btn-pill btn-outline-primary">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Add News
            </a>

            <div class="btn-group ms-2 ms-lg-3">
                <form>
                    <select class="form-control" name="domain_name" id="domain_name">
                        <option {{is_null(request()->input('domain_name')) ? 'selected' : ''}} value=""> Domain</option>
                        @foreach(App\Models\Domain::all() as $key=> $domain_name)
                        <option value="{{$domain_name->domain_name}}">{{$domain_name->domain_name}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="btn-group ms-2 ms-lg-3">
                <select class="form-control" name="Category" id="Category">
                    <option {{is_null(request()->input('Category')) ? 'selected' : ''}} value=""> Category</option>
                    @foreach(App\Models\Category::all() as $key=> $Category)
                    <option value="{{$Category->Name}}">{{$Category->Name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-left: 15px;">
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
    <div class="card card-body border-0 shadow mb-4">

        @foreach ($livewires as $livewire)
        <div class="row" style="margin-bottom: 36px;">
            <div class="col-md-5">
                <div class="card">
                    <img class="card-img-top" src="{{ url('storage/'.$livewire->photos) }}" alt="Card image cap" style="object-fit:cover;">
                    <div class="card-body">

                        <p class="card-text">
                            <td><b> {{ $livewire->domain_name }} </b></td>
                        </p>
                        <p class="card-text">
                            <td>{{ $livewire->Title }}</td>
                        </p>
                        <p class="card-text">
                            <td>{{ $livewire->Date }}</td>
                        </p>
                        <p class="card-text">
                            <td>{{ $livewire->Name }} / {{ $livewire->SubCatName }}</td>
                        </p>
                        <div class="E-D-btn">
                            <form action="{{ route('livewire.destroy',$livewire->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group1" style="display: flex; justify-content: space-between;">
                                    <div style="display:flex; gap:10px;">
                                        <a class="btn btn-primary" href="{{ route('profile-example', [ 'tid' =>  $livewire->id]) }}"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn show_confirm btn-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style="max-height: 440px;overflow-y: scroll;">
                <td>{!! str_replace('_', ' ', $livewire->Containt) !!}</td>
            </div>
        </div>
        @endforeach

    </div>

    </div>
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