<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Admin Pannel</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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

        #textAreaExample6 {
            height: 12.125rem;
        }
    </style>
</head>

<body>
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
                <h2 class="h4">Add Domain Meta</h2>
                @else
                <h2 class="h4">Edit Domain Meta</h2>
                @endif
            </div>

            <a href="{{ route('typography') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
                Back To News
            </a>

            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-12">

            <div class="card card-body border-0 shadow mb-4">

                <form action="{{ route('meta.store') }}" id="myform" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tid" value="{{ $editId }}">
                    <!--  -->
                    <div class="row">
                        <div class="col-md-4">
                            @if($tid == -1)
                            <h2 class="h5 mb-4">Add Doman Meta</h2>
                            @else
                            <h2 class="h5 mb-4">Edit Doman Meta</h2>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <h2 class="h5 mb-4">Add Social Links</h2>
                        </div>
                        <div class="col-md-4">
                            <h2 class="h5 mb-4">Add Files</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
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

                        <div class="col-md-4 mb-3">
                            <label for="facebook">facebook:</label>
                            <input type="text" name="facebook" value="{{ $facebook }}" class="form-control" placeholder="Facebook">
                        </div>

                        <div class="col-md-4 mb-3">
                            @if($tid==-1)

                            <label for="favicon">Favicon:</label>
                            <input type="file" name="favicon" class="form-control" placeholder="Favicon">

                            @else

                            <label for="favicon">Favicon:</label>
                            <input type="file" name="favicon" class="form-control" placeholder="favicon">
                            <img class="card-img-top" src="{{ url('storage/'.$favicon) }}" alt="Card image cap" style="width: 44px; height: 44px;border-radius: 50%">

                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="desc">Description:</label>
                            <input type="text" name="desc" value="{{ $desc }}" class="form-control" placeholder="Description" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="twitter">Twitter:</label>
                            <input type="text" name="twitter" value="{{ $twitter }}" class="form-control" placeholder="Twitter">
                        </div>

                        <div class="col-md-4 mb-3">
                            @if($tid==-1)

                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" placeholder="Image">

                            @else

                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control" placeholder="Image">
                            <img class="card-img-top" src="{{ url('storage/'.$image) }}" alt="Card image cap" style="width: 44px; height: 44px;border-radius: 50%">

                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="author">Author:</label>
                            <input type="text" name="author" value="{{ $author }}" class="form-control" placeholder="Author" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="instagram">Instagram:</label>
                            <input type="text" name="instagram" value="{{ $instagram }}" class="form-control" placeholder="Instagram">
                        </div>

                        <div class="col-md-4 mb-3">
                            @if($tid==-1)
                            <label for="punchlogo">Punch Logo:</label>
                            <input type="file" name="punchlogo" value="{{ $punchlogo }}" class="form-control" placeholder="Punch Logo">
                            @else
                            <label for="punchlogo">Punch Logo:</label>
                            <input type="file" name="punchlogo" value="{{ $punchlogo }}" class="form-control" placeholder="Punch Logo">
                            <img class="card-img-top" src="{{ url('storage/'.$punchlogo) }}" alt="Card image cap" style="width: 44px; height: 44px;border-radius: 50%">
                            @endif
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="keyword">Keyword:</label>
                            <input type="text" name="keyword" value="{{ $keyword }}" class="form-control" placeholder="Keyword" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="pinterest">Pinterest:</label>
                            <input type="text" name="pinterest" value="{{ $pinterest }}" class="form-control" placeholder="Pinterest">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="facebook_id">Facebook ID:</label>
                            <input type="text" name="facebook_id" value="{{ $facebook_id }}" class="form-control" placeholder="Facebook ID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="title">Title:</label>
                            <input type="text" name="title" value="{{ $title }}" class="form-control" placeholder="Title" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="youtube">YouTube:</label>
                            <input type="text" name="youtube" value="{{ $youtube }}" class="form-control" placeholder="YouTube">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="facebook_id">Analytics ID:</label>
                            <input type="text" name="analytics_id" value="{{ $analytics_id }}" class="form-control" placeholder="Analytics ID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="punchline">Punch Line:</label>
                            <input type="text" name="punchline" value="{{ $punchline }}" class="form-control" placeholder="Punch Line" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="punchdesc">Punch Desc:</label>
                            <input type="text" name="punchdesc" value="{{ $punchdesc }}" class="form-control" placeholder="Punch Desc.." required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="who_we_are">Who we are:</label>
                            <textarea type="text" name="who_we_are" value="{{ $who_we_are }}" class="form-control" placeholder="Who we are" style="height: 17px;"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="design">Design:</label>
                            <input type="text" name="design" value="{{ $design }}" class="form-control" placeholder="Design" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="company">Company:</label>
                            <input type="text" name="company" value="{{ $company }}" class="form-control" placeholder="Company" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="how_we_help">How we help:</label>
                            <textarea type="text" name="how_we_help" value="{{ $how_we_help }}" class="form-control" placeholder="How we help" style="height: 17px;"></textarea>
                        </div
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-12 mb-3">
                                <label for="privacy">Privacy & Policy:</label>
                                <textarea class="Content form-control" value="" name="privacy"></textarea>
                                @error('privacy')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-12 mb-3">
                                <label for="terms">Terms & Conditions:</label>
                                <textarea class="Content form-control" value="" name="terms"></textarea>
                                @error('terms')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </form>
            </div>
        </div>
        <div id="pageloader">
            <img id="loading-image" src="https://media1.giphy.com/media/3oEjI6SIIHBdRxXI40/200w.gif?cid=6c09b952qoqcwjgziaq01rjsgrdfnlvd7kan6eqk8fwcbisd&rid=200w.gif&ct=g" alt="Loading..." />
        </div>

</body>
<script>
    $(document).ready(function() {
        $("#myform").on("submit", function() {
            $("#pageloader").fadeIn();
        }); //submit
    }); //document ready
</script>

</html>