@extends('frontend.goldevine.layouts.app')
@section('title')
    <title>Project detail</title>
@endsection
@section('content')

    <div class="inner-content">
        <div class="project-details-pagesmain mt-5 mb-4 pt-md-4">
            <div class="container">
                <h2>Goldevine Project Name</h2>
                <div class="project-user-info mb-1 d-flex align-items-baseline">
                    <div class="project-user-logo me-2">
                        <img src="images/user.png" class="img-fluid h-100">
                    </div>
                    <div class="by-user me-3">
                        <p class="mb-0">By [username]</p>
                    </div>
                    <div class="by-project me-3">
                        <p class="mb-0">3 Projects</p>
                    </div>
                    <div class="by-fav-projects">
                        <p class="mb-0">1 favorite Project</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-slider-gv ">
                            <div>
                                <img src="images/banner.png" class="img-fluid">
                            </div>
                            <div>
                                <img src="images/banner.png" class="img-fluid">
                            </div>
                            <div>
                                <img src="images/banner.png" class="img-fluid">
                            </div>
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
                        <div class="detail-nav-slider-gv mb-3">
                            <div>
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div>
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div>
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div>
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div>
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div>
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                        </div>
                        <p class="mb-1"><strong>[Project short description] Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</strong>
                        </p>
                        <div class="project-social-media">
                            <span>Share:</span>
                            <span><a href="javascript:void"><i class="fa fa-facebook-official rounded-0"
                                        aria-hidden="true"></i></a></span>
                            <span><a href="javascript:void"><i class="fa fa-twitter-square rounded-0"
                                        aria-hidden="true"></i></a></span>
                            <span><a href="javascript:void"><i class="fa fa-pinterest-square rounded-0"
                                        aria-hidden="true"></i></a></span>
                            <span><a href="javascript:void"><i class="fa fa-linkedin-square rounded-0"
                                        aria-hidden="true"></i></a></span>
                            <span><a href="javascript:void"><i class="fa fa-share-alt" aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="tree-image mb-3">
                            <img src="images/tree.png" class="img-fluid">
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Raised:</span>
                            <span>75%</span>
                        </div>
                        <div class="progress rounded-0 mb-2">
                            <div class="progress-bar rounded-0" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <span><strong>Goal: $10,000,000</strong></span>
                        </div>
                        <div class="backers d-flex">
                            <div class="backers-number me-5 mx-2">
                                <span><strong>$7,500,000</strong></span>
                                <span>Pledged</span>
                            </div>
                            <div class="backers-number me-5">
                                <span><strong>2,393</strong></span>
                                <span>Backers</span>
                            </div>
                            <div class="backers-number">
                                <span><strong>20</strong></span>
                                <span>Days Left</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="goldevine-project-details-page product-section mb-4">
            <div class="container">
                <h2 class="mb-2">Benefits</h2>
                <div class="project-page-slider mb-5 pb-lg-3">
                    <div>
                        <div class="product-item">
                            <div class="diamond-img-holder mb-3">
                                <span>Diamond Donor</span>
                            </div>
                            <div class="img-holder">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder">
                                <p>[Benefit Short Discription] Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>August, 23</strong></span>
                                    <span>Estimated Delivery</span>
                                </div>
                                <p class="mb-2 color-saceem"><span class="fa_user"><i class="fa fa-user-circle-o me-2"
                                            aria-hidden="true"></i></span># Backers</p>
                                <p class="m-0 color-saceem"><Span class=""><i class="fa fa-shield me-2"
                                            aria-hidden="true"></i></Span>10, 000 benefits left</p>
                            </div>
                            <button class="btn btn-primary text-uppercase select-benefits">Select Benefit</button>
                        </div>
                    </div>
                    <div>
                        <div class="product-item">
                            <div class="gold-img-holder mb-3">
                                <span>Purple Gold</span>
                                <span>$XXX</span>
                            </div>
                            <div class="img-holder">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder">
                                <p>[Benefit Short Discription] Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>August, 23</strong></span>
                                    <span>Estimated Delivery</span>
                                </div>
                                <p class="mb-2 color-saceem"><span class="fa_user"><i class="fa fa-user-circle-o me-2"
                                            aria-hidden="true"></i></span># Backers</p>
                                <p class="m-0 color-saceem"><Span class=""><i class="fa fa-shield me-2"
                                            aria-hidden="true"></i></Span>10, 000 benefits left</p>
                            </div>
                            <button class="btn btn-primary text-uppercase select-benefits">Select Benefit</button>
                        </div>
                    </div>
                    <div>
                        <div class="product-item">
                            <div class="gold-img-holder mb-3">
                                <span>Black Gold</span>
                                <span>$X,XX</span>
                            </div>
                            <div class="img-holder">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder">
                                <p>[Benefit Short Discription] Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>August, 23</strong></span>
                                    <span>Estimated Delivery</span>
                                </div>
                                <p class="mb-2 color-saceem"><span class="fa_user"><i class="fa fa-user-circle-o me-2"
                                            aria-hidden="true"></i></span># Backers</p>
                                <p class="m-0 color-saceem"><Span class=""><i class="fa fa-shield me-2"
                                            aria-hidden="true"></i></Span>10, 000 benefits left</p>
                            </div>
                            <button class="btn btn-primary text-uppercase select-benefits">Select Benefit</button>
                        </div>
                    </div>
                    <div>
                        <div class="product-item">
                            <div class="gold-img-holder mb-3">
                                <span>Platinum Donor</span>
                                <span>$X,XXX</span>
                            </div>
                            <div class="img-holder">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder">
                                <p>[Benefit Short Discription] Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>August, 23</strong></span>
                                    <span>Estimated Delivery</span>
                                </div>
                                <p class="mb-2 color-saceem"><span class="fa_user"><i class="fa fa-user-circle-o me-2"
                                            aria-hidden="true"></i></span># Backers</p>
                                <p class="m-0 color-saceem"><Span class=""><i class="fa fa-shield me-2"
                                            aria-hidden="true"></i></Span>10, 000 benefits left</p>
                            </div>
                            <button class="btn btn-primary text-uppercase select-benefits">Select Benefit</button>
                        </div>
                    </div>
                    <div>
                        <div class="product-item">
                            <div class="gold-img-holder mb-3">
                                <span>Black Gold</span>
                                <span>$X,XX</span>
                            </div>
                            <div class="img-holder">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder">
                                <p>[Benefit Short Discription] Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>August, 23</strong></span>
                                    <span>Estimated Delivery</span>
                                </div>
                                <p class="mb-2 color-saceem"><span class="fa_user"><i class="fa fa-user-circle-o me-2"
                                            aria-hidden="true"></i></span># Backers</p>
                                <p class="m-0 color-saceem"><Span class=""><i class="fa fa-shield me-2"
                                            aria-hidden="true"></i></Span>10, 000 benefits left</p>
                            </div>
                            <button class="btn btn-primary text-uppercase select-benefits">Select Benefit</button>
                        </div>
                    </div>
                    <div>
                        <div class="product-item">
                            <div class="gold-img-holder mb-3">
                                <span>Black Gold</span>
                                <span>$X,XX</span>
                            </div>
                            <div class="img-holder">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder">
                                <p>[Benefit Short Discription] Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>August, 23</strong></span>
                                    <span>Estimated Delivery</span>
                                </div>
                                <p class="mb-2 color-saceem"><span class="fa_user"><i class="fa fa-user-circle-o me-2"
                                            aria-hidden="true"></i></span># Backers</p>
                                <p class="m-0 color-saceem"><Span class=""><i class="fa fa-shield me-2"
                                            aria-hidden="true"></i></Span>10, 000 benefits left</p>
                            </div>
                            <button class="btn btn-primary text-uppercase select-benefits">Select Benefit</button>
                        </div>
                    </div>
                </div>
                <div class="details-page-section-2 mb-5 pb-lg-3">
                    <div class="btn-groups mb-2">
                        <button class="btn btn-primary mb-1 select-benefits">Backgrounds</button>
                        <button class="btn btn-primary mb-1 select-benefits">FAQs</button>
                        <button class="btn btn-primary mb-1 select-benefits">Updates</button>
                        <button class="btn btn-primary mb-1 select-benefits">Comments</button>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <h2>A Closer Look</h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <h2>Meet the Creator(s)</h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</p>
                        </div>
                    </div>
                </div>
                <h2 class="text-center mb-3">More Gold Vine Projects</h2>
                <div class="project-page-slider mb-5 pb-lg-3">
                    <div>
                        <div class="product-item border rounded">
                            <div class="img-holder mb-3">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder p-3">
                                <div class="d-flex flex-wrap align-items-center mb-3">
                                    <span class="me-2"><button
                                            class="btn btn-primary btn-sm rounded-0 py-1 px-2">HOSPITALITY</button></span>
                                    <span class="me-2"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    <span>0 Days Left</span>
                                </div>
                                <div class="d-flex flex-column mb-4">
                                    <span><strong>Cheap Test Project 2</strong></span>
                                </div>
                                <p class="present-project mb-2">Present Project: LuxxSton Resort</p>
                                <div class="d-flex justify-content-between">
                                    <span>Raised: $10.00</span>
                                    <span>100.00%</span>
                                </div>
                                <div class="progress rounded-0 mb-2">
                                    <div class="progress-bar rounded-0" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>Goal: $10.00</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="product-item border rounded">
                            <div class="img-holder mb-3">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder p-3">
                                <div class="d-flex flex-wrap align-items-center mb-3">
                                    <span class="me-2"><button
                                            class="btn btn-primary btn-sm rounded-0 py-1 px-2">HOSPITALITY</button></span>
                                    <span class="me-2"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    <span>0 Days Left</span>
                                </div>
                                <div class="d-flex flex-column mb-4">
                                    <span><strong>Cheap Test Project 2</strong></span>
                                </div>
                                <p class="present-project mb-2">Present Project: LuxxSton Resort</p>
                                <div class="d-flex justify-content-between">
                                    <span>Raised: $10.00</span>
                                    <span>100.00%</span>
                                </div>
                                <div class="progress rounded-0 mb-2">
                                    <div class="progress-bar rounded-0" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>Goal: $10.00</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="product-item border rounded">
                            <div class="img-holder mb-3">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder p-3">
                                <div class="d-flex flex-wrap align-items-center mb-3">
                                    <span class="me-2"><button
                                            class="btn btn-primary btn-sm rounded-0 py-1 px-2">HOSPITALITY</button></span>
                                    <span class="me-2"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    <span>0 Days Left</span>
                                </div>
                                <div class="d-flex flex-column mb-4">
                                    <span><strong>Cheap Test Project 2</strong></span>
                                </div>
                                <p class="present-project mb-2">Present Project: LuxxSton Resort</p>
                                <div class="d-flex justify-content-between">
                                    <span>Raised: $10.00</span>
                                    <span>100.00%</span>
                                </div>
                                <div class="progress rounded-0 mb-2">
                                    <div class="progress-bar rounded-0" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>Goal: $10.00</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="product-item border rounded">
                            <div class="img-holder mb-3">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder p-3">
                                <div class="d-flex flex-wrap align-items-center mb-3">
                                    <span class="me-2"><button
                                            class="btn btn-primary btn-sm rounded-0 py-1 px-2">HOSPITALITY</button></span>
                                    <span class="me-2"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    <span>0 Days Left</span>
                                </div>
                                <div class="d-flex flex-column mb-4">
                                    <span><strong>Cheap Test Project 2</strong></span>
                                </div>
                                <p class="present-project mb-2">Present Project: LuxxSton Resort</p>
                                <div class="d-flex justify-content-between">
                                    <span>Raised: $10.00</span>
                                    <span>100.00%</span>
                                </div>
                                <div class="progress rounded-0 mb-2">
                                    <div class="progress-bar rounded-0" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>Goal: $10.00</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="product-item border rounded">
                            <div class="img-holder mb-3">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder p-3">
                                <div class="d-flex flex-wrap align-items-center mb-3">
                                    <span class="me-2"><button
                                            class="btn btn-primary btn-sm rounded-0 py-1 px-2">HOSPITALITY</button></span>
                                    <span class="me-2"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    <span>0 Days Left</span>
                                </div>
                                <div class="d-flex flex-column mb-4">
                                    <span><strong>Cheap Test Project 2</strong></span>
                                </div>
                                <p class="present-project mb-2">Present Project: LuxxSton Resort</p>
                                <div class="d-flex justify-content-between">
                                    <span>Raised: $10.00</span>
                                    <span>100.00%</span>
                                </div>
                                <div class="progress rounded-0 mb-2">
                                    <div class="progress-bar rounded-0" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>Goal: $10.00</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="product-item border rounded">
                            <div class="img-holder mb-3">
                                <img src="images/product-img.png" class="img-fluid">
                            </div>
                            <div class="txt-holder p-3">
                                <div class="d-flex flex-wrap align-items-center mb-3">
                                    <span class="me-2"><button
                                            class="btn btn-primary btn-sm rounded-0 py-1 px-2">HOSPITALITY</button></span>
                                    <span class="me-2"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    <span>0 Days Left</span>
                                </div>
                                <div class="d-flex flex-column mb-4">
                                    <span><strong>Cheap Test Project 2</strong></span>
                                </div>
                                <p class="present-project mb-2">Present Project: LuxxSton Resort</p>
                                <div class="d-flex justify-content-between">
                                    <span>Raised: $10.00</span>
                                    <span>100.00%</span>
                                </div>
                                <div class="progress rounded-0 mb-2">
                                    <div class="progress-bar rounded-0" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column mb-2">
                                    <span><strong>Goal: $10.00</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
