@extends('web._layout')
@section('main')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">{{$breadCrumb[0]['name']}}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$breadCrumb[0]['name']}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    {!! short_code($oneItem->content) !!}

    @include('web.block._instagram')

@endsection
