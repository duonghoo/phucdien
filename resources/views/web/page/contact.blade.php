
@extends('web._layout')
@section('main')
    <div class="container my-3" style="margin-top:20rem">
        <div class="row mx-2">
                <div class="d-block d-md-flex justify-content-between mt-3">
                    <div class="main-content mr-md-4 px-2 p-md-0">
                                <div class="line-height-24 entry-content">
                                    {!! short_code($oneItem->content) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
