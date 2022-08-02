
@extends('web._layout')
@section('main')
 
<div class="container">
<div class="row" style="margin-top:20rem">
       <section class="col-sm-7 col-md-8 col-lg-8">
                     <table class="table" style="padding-left: 2rem">
                            <thead>
                              <tr style="background-color: #f27127; border:none; color:white">
                                <th class="w-10">#</th>
                                <th class="w-50">Sản phẩm </th>
                                <th class="w-25">Giá </th>
                                <th class="w-15">Số lượng </th>
                                <th class="w-5"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                   
                                <td class="w-10">1</td>
                                <td class="w-50">
                                   <div class="row" style="display:flex">
                                   <div class="w-50">
                                   {!! genImage($oneItem[1]->thumbnail, 400 , 400, 'img-responsive w-100') !!}
                                   </div>
                                   <div class="w-50 ps-2">
                                   {{$oneItem[1]->title}}
                                   <div class="color-product">Màu sắc: 
                                          @if(!empty($color))
      
                                              @foreach ($color as $key => $cl)
                                                  <span class="color{{$key}}" style="display:inline-block; width: 13px; height: 30px; background-color: {{$cl}}; border-radius: 20%"></span>
                                              @endforeach 
      
                                          @else
                                          <span>Liên hệ</span>
                                          @endif
      
                                      </div>
                                      
                                   </div>
                                   </div>
                                </td>
                                
                                <td class="w-25">{{$oneItem[1]->price ?? 'Liên hệ'}}</td>
                                <td class="w-10"><input type="quantity"></td>
                                <td class="w-5"><button>x</button></td>
                              </tr>      
                          
                            </tbody>
                          </table>
       </section>
       <section class="col-sm-5 col-md-4 col-lg-4" style="margin-top:5rem">
              <div class="get-quote-form">
                     <h2>Liên hệ hỏi giá</h2>
                     <form id="get-quote">
                            <div>
                                   <input type="text" name="name" placeholder="Tên của bạn" />
                            </div>
                            <div>
                                   <input type="text" name="email" placeholder="Email" />
                            </div>
                            <div>
                                   <input type="text" name="ph-no" placeholder="Số điện thoại" />
                            </div>
                            <div>
                                   <textarea name="content" rows="1" cols="1" placeholder="Lời nhắn"></textarea>
                            </div>
                            <div class="text-center">
                                   <input type="submit" class="btn-default" value="Gửi mail" />
                            </div>
                     </form>
              </div>
       </section>
</div>
</div>
@endsection
