@extends('themebusiness::frontend.layouts.master')
@section('title')
SPC | {{ $page->title }}
@endsection

@section('meta_description')
{{ $page->meta_description }}
@endsection

@section('head')
<style>
    .article-section {
        padding: 20px;
    }
    .article-section .card-title {
        padding: 0px 0 10px;
    }

    .article-section button {
        padding: 6px 0px 9px !important;
        width: 150px;
        font-size: 18px;
        margin: 20px 0 10px;
        background-color: rgb(237, 28, 36);
        color: white;
        font-weight: 500;
        border-radius: 0 !important;
        cursor: pointer;
        transition: all 0.4s ease;
        border: 2px solid transparent;
        transition: all 0.25s ease;
    }
    .article-content p {
        text-align: justify;
        line-height: 2;
        margin-bottom: 15px;
        transition: transform 0.2s ease-in-out;
    }

    .article-content p:hover {
        transform: scale(1.02);
    }

    .article-content a {
        color: rgb(237, 28, 36);
        transition: color 0.3s ease;
        text-decoration: none;
    }

    .article-content a:hover {
        text-decoration: underline !important;
    }

    @media only screen and (max-width: 600px) {
        .article-section {
            padding: 10px;
        }
    }

    .article-section .hb-lists ul li {
        padding: 10px;
    }

    .article-section .hb-lists ul li a {
        color: #000;
    }

    .article-section .hb-lists ul li:hover {
        background-color: rgb(237, 28, 36);
    }

    .article-section .hb-lists ul li:hover a {
        color: #fff;
    }

    .article-section .hb-lists ul li p {
        margin: 0;
        font-size: 70%;
    }
    .hb-heading{color: #ed1c24;}
    @media screen and (max-width: 767px) {
        .article-section table tr {
            display: flex;
            flex-wrap: wrap;
        }

        .article-section table tr td {
            width: 100%;
        }

        .article-section img {
            margin: auto;
            padding: 10px 0;
        }
    }
</style>
@endsection
<!-- @include('themebusiness::frontend.layouts.partials.search_articles') -->
@section('main-content')
@include('themebusiness::frontend.pages.partials.header_contact_banner')
<div class="container mt-5 row">
    <div class="col-12">
        <div class="article-section w-100">
            <article class="mb-4">
                @if($page->title)
                <div class="card-title">
                    <h1 class="card-title text-center">{{ $page->title }}</h1>
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                    @if($page->image)
                        <div class="card-img">
                            <img src="{{ asset('assets/images/pages/' . $page->image) }}"
                                class="card-img-top w-100" alt="{{ $page->title }}" title="{{ $page->title }}">
                        </div>
                    @endif
                    </div>
                    <div class="col-12 pt-3">
                        <div class="card-body">
                            <div class="card-text article-content" id="articleContent">
                            @if($page->description)
                                {!! $page->description !!}
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="bottom-section my-4 mt-0">
      <div class="container">
        <div class="row">
          <div class=col-12>
            <hr>
            <p class="bottom-section-red"><span>These parts should only be installed by personal who have the necessary
                skill, training and
                tools to do the job correctly and safely.Incorrect installation can result in personal
                injury, vehicle damage and / or loss of vehicle control.</span></p>
            <h2 class="bottom-section-heading">ON-SITE SERVICE </h2>
            <p class="bottom-section-brown"><span>Please Note: While SPC does not offer direct on-site service of
                vehicles, our
                experienced techs are here to help answer any alignment questions you may have through our
                email form and FAQ section.</span></p>
          </div>
        </div>
      </div>
</div>
    </div>
    <!-- <div class="col-12">
        <div class="article-section w-100 p-0">
            <article class="mb-4">
                <div class="hb-lists">
                    <h2 class="P-3">Other Pages</h2>
                    <ul class="d-block">
                    @if($randomPages)
                        @foreach($randomPages as $page)
                        <li>
                        <a href="{{ url($page->category_slug . '/' . $page->page_slug) }}" style="text-transform: capitalize;">
                            {{ $page->title }}<br>
                        </a>
                        </li>
                        @endforeach
                    @endif
                    </ul>
                </div>
            </article>
        </div>
    </div>     -->
</div>
@endsection