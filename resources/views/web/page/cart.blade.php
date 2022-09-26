
@extends('web._layout')
@section('main')
 
<div class="container">
<div class="row" style="margin-top:20rem">
       <section class="col-sm-7 col-md-8 col-lg-8">
                     <table class="table" style="padding-left: 2rem">
                            <thead>
                              <tr style="background-color: #f59a65; border:none; color:white; height:65px">
                                <th class="w-10 fs-16 align-center">#</th>
                                <th class="w-50 fs-16 align-center">Sản phẩm </th>
                                <th class="w-25 fs-16 align-center">Giá </th>
                                <th class="w-5"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @if(!empty($oneItem))
                            @foreach($oneItem as $prd)
                              <tr>
                                   @php $i=1; @endphp
                                <td class="w-10">{{$i}}</td>
                                @php $i++; @endphp
                                <td class="w-50">
                                   <div class="row" style="display:flex">
                                   <div class="w-50">
                                   {!! genImage($prd->thumbnail, 400 , 400, 'img-responsive w-100') !!}
                                   </div>
                                   <div class="w-50 ps-2">
                                   @php
                                   $color = json_decode($prd->color);
                                   @endphp
                                   {{$prd->title}}
                                   <div class="color-product">Màu sắc: 
                                          @if(!empty($color))
                                              @foreach ($color as $key => $cl)
                                                  <span class="color{{$key}}" style="display:inline-block; width: 13px; height: 30px; background-color: {{$cl}}; border-radius: 20%"></span>
                                              @endforeach 
                                          @else
                                          <span>Tùy chọn</span>
                                          @endif
      
                                      </div>
                                      
                                   </div>
                                   </div>
                                </td>
                                <td class="w-25">{{$prd->price ?? 'Liên hệ'}}</td>
                                <td class="w-5"><button class="remove-cart" data-id="{{$prd->id}}">x</button></td>
                              </tr> 
                              @endforeach 
                              @endif    
                            </tbody>
                          </table>
       </section>
      
       <section class="col-sm-5 col-md-4 col-lg-4" style="margin-top:65px">
              <div class="get-quote-form primary_color">
                     <h2>Liên hệ hỏi giá</h2>
                     <form id="get-quote">
                            <div>
                                   <input type="text" required oninvalid="this.setCustomValidity('Vui lòng cho chúng tôi biết tên của bạn"
                                   oninput="this.setCustomValidity('')" name="name" placeholder="Tên của bạn" />
                            </div>
                            <div>
                                   <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required oninvalid="this.setCustomValidity('Vui lòng điền email và nhập đúng định dạng')" oninput="this.setCustomValidity('')" name="email" placeholder="Email" />
                            </div>
                            <div>
                                   <input type="text"  placeholder="123-45-678" pattern="[0-9]{10}" id="ph-no" name="ph-no" required="required" oninvalid="this.setCustomValidity('Vui lòng nhập số và không để trống')" oninput="this.setCustomValidity('')" />
                            </div>
                          
                            <div>
                                   <textarea required oninvalid="this.setCustomValidity('Vui lòng để lại lời nhắn cho chúng tôi"
                                   oninput="this.setCustomValidity('')" name="content" rows="1" cols="1" placeholder="Lời nhắn"></textarea>
                            </div>
                            <div class="text-center">
                                   <input type="submit" class="btn-default mail-btn" value="Gửi mail" />
                            </div>
                     </form>
              </div>
       </section>
</div>
</div>
@endsection
