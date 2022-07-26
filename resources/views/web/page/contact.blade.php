
@extends('web._layout')
@section('main')
    <div class="container my-3" style="margin-top:20rem">
        <div class="row">
                <div class="d-block d-md-flex justify-content-between mt-3">
                    <div class="main-content mr-md-4 px-2 p-md-0">
                                <div class="line-height-24 entry-content" style="margin-top: 2rem">
                                    {!! short_code($oneItem->content) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
        

@endsection
