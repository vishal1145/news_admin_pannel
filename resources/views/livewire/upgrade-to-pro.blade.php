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
    </style>
</head>

<body>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div>
                <!-- <button class="btn btn-secondary me-2 dropdown-toggle" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-plus me-2"></span>New
            </button> -->
                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                        </svg>
                        Document
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                        </svg>
                        Message
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                            </path>
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                        </svg>
                        Product
                    </a>
                    <div role="separator" class="dropdown-divider my-1"></div>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                        </svg>
                        My Plan
                    </a>
                </div>
            </div>
            <div>
                <!-- <button type="button" class="btn btn-gray-800 d-inline-flex align-items-center me-2">
                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
            </button> -->
                <a href="{{ route('buttons') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                    Back
                </a>

                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-8">

                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">Sub Category</h2>
                    <form action="{{ route('subcategory.store') }}" id="myform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tid" value="{{ $editId }}">
                        <!--  -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Name">Name:</label>
                                <input type="text" name="Name" value="{{ $Name }}"class="form-control" placeholder="Name">

                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    @if($tid == -1)

                                    <label for="last_name">Image:</label>
                                    <input type="file" name="Image" class="form-control" placeholder="Image_url" required>

                                    @else

                                    <label for="last_name">Image:</label>
                                    <input type="file" name="Image" class="form-control" placeholder="Image_url">
                                    <img class="card-img-top" src="{{ url('storage/'.$Image) }}" alt="Card image cap" style="width: 104px; height: 104px; margin-top: 12px;">

                                    @endif
                                </div>
                            </div>
                        </div>
                         <div class="row align-items-center">
                         <div class="col-md-6 mb-3">
                                <label for="category_id">Category_id:</label>
                                <input type="text" name="category_id" value="{{ $category_id }}"class="form-control" placeholder="Category id">

                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group" style="margin-top: 11px;">
                                    <textarea class="form-control" id="textAreaExample6" value="{{ $Desc }}" name="Desc" rows="3" placeholder="Description...."></textarea>

                                    @if ($errors->has('Desc'))
                                    <span class="text-danger">{{ $errors->first('Desc') }}</span>
                                    @endif
                                </div>
                            </div> 

                        </div>

                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
            <div id="pageloader">
                <img id="loading-image" src="https://media1.giphy.com/media/3oEjI6SIIHBdRxXI40/200w.gif?cid=6c09b952qoqcwjgziaq01rjsgrdfnlvd7kan6eqk8fwcbisd&rid=200w.gif&ct=g" alt="Loading..." />
            </div>

</body>
<script type="text/javascript">
    //     $(document).ready(function(){
    //     // $('.showing').hide();
    //     $('.condition').change(
    //         function(){
    //             if(this.value == "Scroll"){
    //                 $('.showing').hide();
    //             }
    //             else {
    //                 $('.showing').show();
    //             }
    //         }
    //     )
    // });

    // $(document).ready(function(){
    //     $('#showing1').hide();
    //     $('#condition').change(
    //         function(){
    //             if(this.value == "Scroll"){
    //                 $('#showing1').hide();
    //             }
    //             else {
    //                 $('#showing1').show();
    //             }
    //         }
    //     )
    // });
</script>
<script>
    $(document).ready(function() {
        $("#myform").on("submit", function() {
            $("#pageloader").fadeIn();
        }); //submit
    }); //document ready
</script>

</html>