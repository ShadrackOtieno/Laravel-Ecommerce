      <section class="product_section layout_padding">
          <div class="container">
              <div class="heading_container heading_center">
                  <h2>
                      Our <span>products</span>
                  </h2>
              </div>
              <div class="row">
                  @foreach ($product as $p)
                      <div class="col-sm-6 col-md-4 col-lg-4">
                          <div class="box">
                              <div class="option_container">
                                  <div class="options">
                                      <a href="{{ url('product_details', $p->id) }}" class="option1">
                                          Product Details
                                      </a>

                                      <form action="{{ url('add_cart',$p->id) }}" method="post">
                                        @csrf
                                          <div class="row">

                                              <div class="col-md-4"> <input type="number" style="width: 100px" name="quantity" value="1" min="1">
                                              </div>

                                              <div class="col-md-4"> <input type="submit" value="Add to Cart">
                                              </div>
                                          </div>
                                      </form>

                                  </div>
                              </div>
                              <div class="img-box">
                                  <img src="product/{{ $p->image }}" alt="">
                              </div>
                              <div class="detail-box">
                                  <h5>
                                      {{ $p->title }}
                                  </h5>

                                  @if ($p->discount_price != null)
                                      <h6 style="color: red">
                                          Ksh: {{ $p->discount_price }}
                                      </h6>

                                      <h6 style="text-decoration: line-through;color:blue">
                                          Ksh: {{ $p->price }}
                                      </h6>
                                  @else
                                      <h6 style="color: blue">
                                          Ksh: {{ $p->price }}
                                      </h6>
                                  @endif







                              </div>
                          </div>
                      </div>
                  @endforeach
                  <span style="padding-top: 20px">
                      {!! $product->appends(Request::all())->links() !!}

                  </span>


              </div>
              <div class="btn-box">
                  <a href="">
                      View All products
                  </a>
              </div>
          </div>
      </section>
