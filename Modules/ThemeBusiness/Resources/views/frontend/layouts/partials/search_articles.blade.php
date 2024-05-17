<style>
    section.new-letter.py-5 {
        margin-top: 90px !important;
    }

    .input-group .input-group-append .btn {
        border-left: 0;
        /* Removes the border between the input and the button */
    }

    .results-dropdown {
        position: absolute;
        z-index: 999;
        top: 85%;
        left: 3px;
        right: 3px;
        color: black;
        background: #fafafa;
        border: 1px solid #ccc;
        border-top: none;
        display: none;
        padding: 20px 0;
        color: #000;
    }
    .results-dropdown a{color: #000;}
    .results-dropdown .dropdown-item:hover a{color: #fff;}
    .search_description{display: none;}
    .results-dropdown .dropdown-item {
        padding: 10px;
        cursor: pointer;
        text-align: start;
    }
    .results-dropdown .dropdown-item{white-space: break-spaces;}
    .results-dropdown .dropdown-item img{width: auto;}

    .results-dropdown .dropdown-item:hover {
        background-color: #ed1c24;
        color: black;
    }
    .hb-search-btn{right: 5px; top: 50%; transform: translateY(-50%);}
    .new-letter .hb-input{border-radius: 10px !important; padding: 10px; font-size: 20px;}
</style>
<section class="new-letter py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 text-center py-5">
                <h2>Search Articles</h2>
                {{-- <p class="mb-0">Sign up for the SPC Installer newletter and stay informed when it comes to new product
                    releases, technical information and installation tips & tricks</p> --}}
                <form id="ajaxSearchForm" action="" method="post" class="position-relative">
                    <div class="input-group my-4">
                        <input type="text" id="searchInput" class="form-control m-0 hb-input" placeholder="Search by Title"
                            aria-label="Search by Title" aria-describedby="search-addon">
                        <div class="input-group-append position-absolute hb-search-btn">
                            <button class="btn" type="button" id="search-addon">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div id="resultsDropdown" class="results-dropdown"></div>
                </form>
            </div>
        </div>
    </div>
</section>
@section('scripts')
    <script>
        $(document).ready(function() {
            var searchUrl = "{{ url('/search-content') }}";
            $('#searchInput').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: searchUrl,
                    type: "GET",
                    data: {
                        'query': query
                    },
                    success: function(data) {
                        console.log(data, 'data');
                        $('#resultsDropdown').empty();
                        if (data.length) {
                            data.forEach(function(item) {
                                var baseUrl = window.location.origin;

                                // Construct the full URL by appending category slug and item slug to the base URL
                                var fullUrl = baseUrl + '/' + item.category.slug + '/' +
                                    item.slug;
                                var truncatedDescription = item.description.split('\n')
                                    .slice(0, 2).join('\n');

                                // Add ellipsis (...) at the end if description is longer than two lines
                                if (item.description.split('\n').length > 2) {
                                    truncatedDescription += '...';
                                }

                                // Append the constructed URL and content to the dropdown
                                $('#resultsDropdown').append(
                                    '<div class="dropdown-item"><a href="' +
                                    fullUrl + '">' +
                                    '<div class="search_title">' + item.title +
                                    '</div>' +
                                    '<div class="search_description">' +
                                    truncatedDescription + '</div>' +
                                    '</a></div>'
                                );
                            });
                            $('#resultsDropdown').show();
                        } else {
                            $('#resultsDropdown').hide();
                        }
                    }
                });
            });

            $(document).on('click', function(event) {
                if (!$(event.target).closest('#ajaxSearchForm').length) {
                    $('#resultsDropdown').hide();
                }
            });
        });
    </script>
@endsection
