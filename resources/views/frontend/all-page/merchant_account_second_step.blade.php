@extends('frontend.layouts.app')
@section('content')
<div class="section-product-charter">
                <div class="container">
                    <div class="row col-lg-10 mx-auto gx-5">
                        <div class="col-12 col-md-5 gx-0 gx-md-5 px-md-5">
                           @include('frontend.include.sidebar')
                        </div>
                        <div class="col-12 col-md-7 gx-0 gx-md-1 gx-lg-5 px-lg-5">
                           <div class="my-account-section">
                                <h2>Setup Your Merchant Account (2/2)</h2>
                                <div class="mb-2"><strong>Business Details</strong></div>
                                <form action="{{route('save_merchant_account')}}" method="POST">
                                    @csrf
                                      <div class="form-outline mb-3">
                                        <label for="" class="form-label mb-0">Description / About Us</label>
                                        <textarea class="form-control" name="business_address" id="textAreaExample6" rows="2">
                                            {{ @$merchant_detail->business_address }}
                                        </textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="">What kind of business do you run?</label>
                                        <select class="form-select" name="business_type_id">
                                            <option></option>
                                            <option value="1" {{ 1 == $merchant_detail->business_type_id ? 'selected' : '' }}>business 1</option>
                                            <option value="2"  {{ 2 == $merchant_detail->business_type_id ? 'selected' : '' }}>business 2</option>
                                        </select>
                                      </div>
                                    <div class="input-groups mb-3">
                                        <label>Where do you offer to deliver your product?</label>
                                     <div class="input-type-check d-flex flex-wrap">
                                        @foreach ($delivery_options as $delivery_option )
                                    
                                        @php
                                
                                          $checked = false;
                                            if(isset($merchant_detail->delivery_id)) {
                                                if(in_array($delivery_option->id,explode(',',$merchant_detail->delivery_id)))
                                                {
                                                       $checked = true;
                                                }
                                                else
                                                {
                                                       $checked = false;
                                                }
                                            }
                                        @endphp
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="delivery_id[]" value="{{ $delivery_option->id }}"
                                                   id="flexCheckDefault" {{ ($checked == true) ? 'checked' : '' }} >
                                                <label class="form-check-label" for="flexCheckDefault">
                                                   {{ $delivery_option->name }}
                                                </label>
                                           </div>
                                        @endforeach
                                    </div>
                                    </div>
                                      <div class="row gx-4 mb-0 mb-md-3 align-items-end">
                                        <div class="col-12 col-md-8 mb-3 mb-md-0">
                                            <label for="" class="form-label mb-0">Social Media Link <span class="optional">Optional</span></label>
                                            <input type="text" name="social_media_link" value="{{ @$merchant_detail->social_media_link }}" class="form-control">
                                            <div class="pincel"></div>
                                        </div>
                                        {{-- <div class="col-12 col-md-4 mb-3 mb-md-0">
                                            <button class="btn btn-primary add-more-width" type="button">
                                                <span><i
                                                class="fa fa-plus me-2"
                                                aria-hidden="true"></i></span>Add More</button>
                                        </div> --}}
                                      </div>
                                      <div class="mb-3"><h3>Meet the team: <span class="optional">Optional</span></h3>
                                         <div class="row gx-4 mb-0 mb-md-3 align-items-end">
                                            <div class="col-12 col-md-8 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">Owner Name-1</label>
                                                <input type="text" name="owner_name" value="{{ $merchant_detail->owner_name }}" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                                <label class="uploadFile">
                                                    <i class="fa fa-cloud-upload upload-icon" aria-hidden="true"></i>
                                                    <span class="filename">Upload Image</span>
                                                    <input type="file" name="owner_upload_image" class="inputfile form-control">
                                                  </label>
                                            </div>
                                          </div>
                                      
                                        {{-- <div class="mb-3">
                                            <button class="btn btn-primary" type="button"><span><i
                                            class="fa fa-plus me-2"
                                            aria-hidden="true"></i></span>Add More</button>
                                        </div> --}}
                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0">Introduce The Owners <span class="optional">Optional</span></label>
                                                <textarea class="form-control" id="textAreaExample6" name="introduce_owner" rows="2">
                                                    {{ @$merchant_detail->introduce_owner }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row gx-4 mb-0 mb-md-3 align-items-end">
                                            <div class="col-12 col-md-8 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">Team Memeber Name-1</label>
                                                <input type="text" name="team_owner_name" value="{{ @$merchant_detail->team_owner_name }}" class="form-control">
                                            </div>
                                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                                <label class="uploadFile">
                                                    <i class="fa fa-cloud-upload upload-icon" aria-hidden="true"></i>
                                                    <span class="filename">Upload Image</span>
                                                    <input type="file" name="team_upload_image"  value="{{ @$merchant_detail->team_upload_image }}"   class="inputfile form-control">
                                                  </label>
                                            </div>
                                          </div>

                                          {{-- <div class="mb-3">
                                            <button class="btn btn-primary" type="button"><span><i
                                            class="fa fa-plus me-2"
                                            aria-hidden="true"></i></span>Add More</button>
                                        </div> --}}

                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0">History <span class="optional">Optional</span></label>
                                                <textarea class="form-control" name="history"  id="textAreaExample6" rows="2">
                                                    {{ @$merchant_detail->history }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0">Ethic <span class="optional">Optional</span></label>
                                                <textarea class="form-control" name="ethic"  id="textAreaExample6" rows="2">
                                                    {{ @$merchant_detail->ethic }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0"  >Philosophy <span class="optional">Optional</span></label>
                                                <textarea class="form-control" id="philosophy" name="philosophy"   rows="2">
                                                    {{ @$merchant_detail->philosophy }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary text-uppercase">Cancel</button>
                                        <button class="btn btn-primary text-uppercase" type="submit">submit for review</button>
                                </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
