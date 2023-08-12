<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #pageloader {
            background: rgba(255, 255, 255, 0.8);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        #pageloader img {
            left: 50%;
            margin-left: -32px;
            margin-top: -32px;
            position: absolute;
            top: 50%;
        }
    </style>
</head>

<body>
    <div class="" style="width:100%">
        <div class="" style="width:30%">
            @include('./layouts/sidenav')
        </div>
        <div style="margin-left: 275px; margin-top: 90px;width:78%">
            <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                    <div>
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
                        @if($tid == -1)
                        <h2 class="h4">Add Header News-</h2>
                        @else
                        <h2 class="h4">Edit Header News-</h2>
                        @endif
                    </div>

                    <a href="{{ route('500') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                        </svg>
                        Back To News
                    </a>

                    </button>
                </div>
            </div>
            <div class="col-12 col-xl-12">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">Header News Information</h2>
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <form action="{{ route('header.store') }}" id="myform" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="tid" value="{{ $editId }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div>
                                    <label for="display_title">Display Title:</label>
                                    <input type="text" name="display_title" value="{{ $display_title }}" class="form-control" placeholder="Display Title" required>
                                </div>
                                <div>
                                    <label for="publish_status">Publish Status</label>
                                    <select id="publish_status" name="publish_status" value="{{ $publish_status }}" class="form-select" aria-label="">
                                        <option value="Select" disabled {{ $publish_status === null ? 'selected' : '' }}>Select</option>
                                        <option value="1" {{ $publish_status == 1 ? 'selected' : '' }}>True</option>
                                        <option value="0" {{ $publish_status == 0 ? 'selected' : '' }}>False</option>
                                    </select>

                                    @error('publish_status')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $publish_status }}</div>
                                    @enderror
                                </div>
                                <div class="my-3">
                                    <label for="domain_id">Domain ID:</label>
                                    <select id="domain_id" name="domain_id" class="form-select" required>
                                        <option value="Select" disabled selected>Select</option>
                                        @foreach(App\Models\Domain::all() as $domain)
                                        <option value="{{ $domain->id }}" {{ $domain_id == $domain->id ? 'selected' : '' }}>
                                            {{ $domain->domain_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="my-3">
                                    <label for="category_id">Category ID:</label>
                                    <select id="category_id" name="category_id" class="form-select" required>
                                        <option value="Select" disabled selected>Select</option>
                                        @foreach(App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->Name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="Category">Category</label>
                                    <select id="Name" name="Name" value="{{ $Name }}" class="form-select" aria-label="">
                                        <option value="Select" disabled selected>Select</option>
                                        @foreach(App\Models\Category::all() as $key=> $Cat)
                                        @if($Name == $Cat->Name)
                                        <option @selected( $Cat->Name == $Cat->Name) value="{{ $Cat->Name }}">
                                            {{ $Cat->Name }}
                                        </option>
                                        @else
                                        <option>
                                            {{ $Cat->Name }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('Name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="my-3">
                                    <label for="Subcategory">Sub Category</label>
                                    <select id="SubCatName" name="SubCatName" value="{{ $SubCatName }}" class="form-select " aria-label="">
                                        <option value="Select" disabled selected>Select</option>
                                        @foreach(App\Models\Subcategory::all() as $key=> $Sub)
                                        @if($SubCatName == $Sub->SubCatName)
                                        <option @selected( $Sub->SubCatName == $Sub->SubCatName) value="{{ $Sub->SubCatName }}">
                                            {{ $Sub->SubCatName }}
                                        </option>
                                        @else
                                        <option>
                                            {{ $Sub->SubCatName }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('SubCatName')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="margin-top: 30px;">
                                    <label for="Domain">Domain</label>
                                    <select class="form-select condition" aria-label="" value="{{ $domain_name }}" name="domain_name" id="domain_name">
                                        <option value="option_select" disabled selected>Domain</option>
                                        @foreach(App\Models\Domain::all() as $key=> $Domain)
                                        @if($domain_name == $Domain->domain_name)
                                        <option @selected( $Domain->domain_name == $Domain->domain_name) value="{{ $Domain->domain_name }}">
                                            {{ $Domain->domain_name }}
                                        </option>
                                        @else
                                        <option>
                                            {{ $Domain->domain_name }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('domain_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="my-3">
                                    <label for="Slug">Slug:</label>
                                    <input type="text" name="Slug" value="{{ $Slug }}" class="form-control" placeholder="Slug" required>
                                </div>
                                <div class="my-3">
                                    <label for="Type">Title</label>
                                    <input id="Title" type="text" name="Title" value="{{ $Title }}" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="Date">Date&Time</label>
                                    <input type="datetime-local" name="Date" value="{{ $Date }}" class="form-control" required>
                                    @error('Date')
                                    <div class="alert alert-danger mt-1 mb-1"></div>
                                    @enderror
                                </div>

                                <div class="form-group my-3">
                                    @if($tid == -1)

                                    <label for="photos">Photos</label>
                                    <input type="file" name="photos" value="{{ $photos }}" class="form-control" placeholder="Photos" required>
                                    @error('photos')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror

                                    @else
                                    <label for="photos">Photos</label>
                                    <input type="file" name="photos" value="{{ $photos }}" class="form-control" placeholder="Photos">
                                    <img class="card-img-top" src="{{ url('storage/'.$photos) }}" alt="Card image cap" style="width: 104px; height: 104px; margin-top: 12px;">
                                    @error('photos')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror

                                    @endif
                                </div>
                                <div class="my-3">
                                    <label for="youtube">YouTube:</label>
                                    <input type="text" name="youtube" value="{{ $youtube }}" class="form-control" placeholder="YouTube" >
                                </div>
                                <div class="my-3">
                                    <label for="tags">Tags:</label>
                                    <input type="text" name="tags" value="{{ json_encode($tags) }}" class="form-control" placeholder="Tags">
                                </div>
                                <div>
                                    @if($Display_in_front == 1)
                                    <label><input type="checkbox" name="Display_in_front" value="{{ $Display_in_front }}" checked> Display in Front</label>
                                    @else
                                    <label><input type="checkbox" name="Display_in_front" value="{{ $Display_in_front }}"> Display in Front</label>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 mb-3">
                                    <label for="Content">Content</label>
                                    <textarea class="Content form-control" id="editor" name="Content" value="{{ $Content }}" style="height: 550px;">{!! $Content !!}</textarea>
                                    @error('Content')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                </div>
            </div>
            <div id="pageloader">
                <img id="loading-image" src="https://media1.giphy.com/media/3oEjI6SIIHBdRxXI40/200w.gif?cid=6c09b952qoqcwjgziaq01rjsgrdfnlvd7kan6eqk8fwcbisd&rid=200w.gif&ct=g" alt="Loading..." />
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '{{ route("ckeditor.upload") }}?_token={{ csrf_token() }}'
            }
        })
        .then(editor => {
            editor.setData(''); // Set the initial content using editor.setData()
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script type="text/javascript">
    $("document").ready(function() {
        $('select[name="Subcategory"]').on('change', function() {
            var catId = $(this).val();
            if (catId) {
                $.ajax({
                    url: '/profile-example/Subcategories/' + catId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Subcategory"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="Subcategory"]').append('<option value=" ' + key + '">' + value + '</option>');
                        })
                    }

                })
            } else {
                $('select[name="Subcategory"]').empty();
            }
        });


    });
</script>
<script>
    $(document).ready(function() {
        $("#myform").on("submit", function() {
            $("#pageloader").fadeIn();
        }); //submit
    }); //document ready
</script>

<script>
    var app = angular.module('myApp', []);

    app.controller('mainCtrl', function($scope) {
        $scope.phoneNumbr = /^([2-9])(?!\1+$)\d{9}$/;
    });
</script>

</html>