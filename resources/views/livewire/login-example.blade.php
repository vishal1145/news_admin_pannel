<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .fixed-column {
            position: sticky;
            left: 0;
            z-index: 1;
            background-color: #f5f5f5;
        }

        .fixed-column-table th:first-child,
        .fixed-column-table td:first-child {
            position: sticky;
            left: 0;
            z-index: 1;
            background-color: #DFAF23;
        }
    </style>
</head>

<body>
    <!-- <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center"> -->
    <div class="" style="width:100%">
        <div class="" style="width:30%">
            @include('./layouts/sidenav')
        </div>

        <div class="" style="margin-left: 275px; margin-top: 90px;width:78%">
                <div class="">
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
                                <li class="breadcrumb-item active" aria-current="page">Neighbourhood</li>
                            </ol>
                        </nav>
                        <h2 class="h4">Neighbourhood</h2>
                    </div>
                    <div class="btn-toolbar mb-2 mb-md-0" style="margin-left: 800px;">
                        <a href="{{ route('register-example', [ 'tid' => '-1' ]) }}" class="btn btn-pill btn-outline-primary">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                </path>
                            </svg>
                            Add Neighbourhood
                        </a>
                    </div>
                </div>
                <div class="card border-0 shadow components-section" style="margin-top: 35px;">
                    <div class="table-responsive">
                        <table class="table fixed-column-table">
                            <thead>
                                <tr>
                                    <th class="fixed-column">Source</th>
                                    <th>Target</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->source }}</td>
                                    <td>{{ $result->target }}</td>
                                    <td>
                                        <form action="{{ route('result.destroy', $result->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group1" style="display: flex; justify-content: end;">
                                                <div style="display:flex; gap:10px;">
                                                    <a class="btn btn-primary" href="{{ route('register-example', [ 'tid' =>  $result->id]) }}"><i class="fa fa-edit btn-hover"></i></a>
                                                    <button type="submit" class="btn show_confirm btn-danger"><i class="fa fa-trash btn-hover"></i></button>
                                                </div>
                                            </div>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
    </div>
</body>
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
</html>