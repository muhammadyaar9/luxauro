@extends('frontend.layouts.app')
@section('title')
    <title>Home</title>
@endsection
@section('content')

<div class="inner-content">
    <div class="banner mb-4">
        <div class="banner-slider">
            <div>
                <img src="images/banner.png" class="img-fluid">
            </div>
            <div>
                <img src="images/banner.png" class="img-fluid">
            </div>
            <div>
                <img src="images/banner.png" class="img-fluid">
            </div>
        </div>
    </div>
    <form class="page-form mx-auto mb-5" action="#">
        <div class="page-form-holder d-flex">
            <select class="form-control select-control border-0 rounded-0 flex-fill">
                <option>All</option>
                <option>All</option>
                <option>All</option>
            </select>
            <div class="form-field d-flex flex-fill">
                <input type="search" placeholder="Search..." class="border-0 bg-transparent flex-fill">
                <button type="submit" class="bg-transparent border-0 flex-fill"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    <div class="product-section mb-5 mb-md-0 pb-lg-2">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">My Global GMG</h2>
                <div class="d-flex form-holder">
                    <a class="btn btn-view rounded-0" href="javascript:void">View All</a>
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent">
                                    <option>All</option>
                                    <option>All</option>
                                    <option>All</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="slider gold-metal-slider text-center">
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="merchant-suite-section">
        <div class="container">
            <div class="pagination justify-content-center">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">. . .</a></li>
                    <li class="page-item"><a class="page-link" href="#"><b>14</b></a></li>
                     <li class="page-item"><a class="page-link" href="#">26</a></li>
                     <li class="page-item"><a class="page-link" href="#">27</a></li>
                  </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="product-section mb-4">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">My National GMG</h2>
                <div class="d-flex form-holder">
                    <a class="btn btn-view rounded-0" href="javascript:void">View All</a>
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent">
                                    <option></option>
                                    <option>Shop my nation luxauro</option>
                                    <option>Shipping only</option>
                                    <option>Sort by price</option>
                                    <option>Hide GMG professional</option>
                                    <option>Hide GoldEvine projects</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="merchant-suite-section">
        <div class="container">
            <div class="pagination justify-content-center">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">. . .</a></li>
                    <li class="page-item"><a class="page-link" href="#"><b>14</b></a></li>
                     <li class="page-item"><a class="page-link" href="#">26</a></li>
                     <li class="page-item"><a class="page-link" href="#">27</a></li>
                  </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="merchant-banners mb-5">
        <div class="container-fluid p-5">
            <div class="col-md-10 mx-auto">
                <div class="merchant-banner-text">
                    <h3>(Banner ad for Luxauro, Goledvine,  or BMG)</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="product-section mb-4">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">My Own GMG</h2>
                <div class="d-flex form-holder">
                    <a class="btn btn-view rounded-0" href="javascript:void">View All</a>
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent">
                                    <option></option>
                                    <option>Shop my nation luxauro</option>
                                    <option>Shipping only</option>
                                    <option>Sort by price</option>
                                    <option>Hide GMG professional</option>
                                    <option>Hide GoldEvine projects</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Product Category</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="merchant-suite-section">
        <div class="container">
            <div class="pagination justify-content-center">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">. . .</a></li>
                    <li class="page-item"><a class="page-link" href="#"><b>14</b></a></li>
                     <li class="page-item"><a class="page-link" href="#">26</a></li>
                     <li class="page-item"><a class="page-link" href="#">27</a></li>
                  </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="merchant-banners mb-5">
        <div class="container-fluid p-5">
            <div class="col-md-10 mx-auto">
                <div class="merchant-banner-text">
                    <h3>(Banner ad for Luxauro, Goledvine,  or BMG)</h3>
                </div>
            </div>
        </div>
    </div>

@endsection
