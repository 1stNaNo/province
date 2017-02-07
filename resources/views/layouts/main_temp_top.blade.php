<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    @include('header')
</head>

<body>
    <!-- Loader -->
    <div class="page-loader">
        <div class="loader">
            <div class="flipper">
                <div class="front"></div>
                <div class="back"></div>
            </div>
        </div>
    </div>
    <!-- Loader END-->
    <div class="main-wrapper">
        <!-- Header -->
        <header class="header-mb">
            <div class="container">
                <div class="hdm-menu">
                    <a href="#mb-menu" class="c-hamburger htx js-mb-menu">
                        <span>toggle menu</span>
                    </a>
                </div>
                <div class="hdm-logo" style="background: #fff;">
                    <h1 class="logoImgSmall"><a href="/"><img src="/img/dornod-logo-s.png" width="60" alt="Spectr" class="adaptive" /></a></h1>
                    <div class="logoTextSmall">
                      <p class="lgTextSmall">{{ trans('resource.logoText') }}</p>
                      <p class="lgTagSmall">{{ trans('resource.logoTag') }}</p>
                    </div>
                </div>
                @include('layouts.search',['vwType' => 'menu'])
            </div>
        </header>
        <div class="sticky-header js-sticky-header">
            <div class="container">
                <div class="main-nav-wrap">
                    <div class="row">
                        <nav class="main-nav">
                            <a href="#aside-menu" class="c-hamburger htx js-asd-menu">
                                <span>toggle menu</span>
                            </a>
                            @include('layouts.menu')
                        </nav>
                        @include('layouts.search',['vwType' => 'top'])
                    </div>
                </div>
            </div>
        </div>
        <header class="header-tp-4">
            <div class="top-bar">
                <div class="container">
                    <div class="top-bar-inner">
                        <div class="row">
                            <nav class="tb-nav">
                                <ul class="tb-nav-list" style="font-family: arial; font: none; font-weight: bold">
                                    <li><a href="/complaints">{{trans('resource.complaints')}}</a></li>
                                    <li><a href="/category">{{trans('resource.siteStructure')}}</a></li>
                                    <li><a href="/post/16">{{trans('resource.contact')}}</a></li>
                                </ul>
                            </nav>
                            <div class="tb-social">
                                <ul class="tb-social-list">
                                    <li class="tw">
                                        <a href="{{trans('resource.main.fblink')}}" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="fb">
                                        <a href="{{trans('resource.main.twitterlink')}}" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tb-sing-login" style="font-family: arial; font: none; font-weight: bold">
                                {{trans('resource.language')}}: <a href="#" onclick="langFuncs.change('mn')" class="">{{trans('resource.mn')}}</a> / <a href="#" onclick="langFuncs.change('en')" class="">{{trans('resource.en')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header">
                <div class="mh-top">
                    <div class="container">
                        <div class="row flex">
                            <div class="mh-logo">
                                <a href="/" class="logoImg">
                                    <img src="/img/dornod-logo-s.png" width="80" alt="Spectr News Theme" class="adaptive" />
                                </a>
                                <div class="logoText">
                                    <p class="lgText">{{ trans('resource.logoText') }}</p>
                                    <p class="lgTag">{{ trans('resource.logoTag') }}</p>
                                </div>
                            </div>
                            {{-- <div class="mh-banner">
                                @include('layouts.banner', ['name' => 'banner1'])
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="mh-bottom">
                    <div class="container">
                        <div class="main-nav-wrap">
                            <div class="row">
                                <nav class="main-nav">
                                    <a href="#aside-menu" class="c-hamburger htx js-asd-menu">
                                        <span>toggle menu</span>
                                    </a>
                                    @include('layouts.menu')
                                </nav>
                                @include('layouts.search',['vwType' => 'top'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header END -->
        <div class="inner-wrapper">
            {{-- <div class="left-sticky-bar js-lsb">
                <ul class="lsb-list">
                    <li>
                        <a href="category_style_six.html" class="active">
                            <i class="lsb-icon-1"></i>news</a>
                    </li>
                    <li>
                        <a href="products.html">
                            <i class="lsb-icon-2"></i>popular</a>
                    </li>
                    <li>
                        <a href="video.html">
                            <i class="lsb-icon-3"></i>saved</a>
                    </li>
                    <li>
                        <a href="product.html">
                            <i class="lsb-icon-4"></i>latest</a>
                    </li>
                    <li>
                        <a href="search_results.html">
                            <i class="lsb-icon-5"></i>search</a>
                    </li>
                    <li>
                        <a href="#signin" class="js-popups">
                            <i class="lsb-icon-6"></i>login</a>
                    </li>
                </ul>
            </div> --}}
