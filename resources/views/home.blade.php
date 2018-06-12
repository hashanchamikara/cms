@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 col-lg-3 col-md-6 col-xm-2">
                        <div class="square-service-block">
                            <a href="/customer/create">
                                <button  class="btn btn-default">
                                    <div class="ssb-icon"><i class="fas fa-users" aria-hidden="true"></i></div>
                                    <h2 class="ssb-title">Customer</h2>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        button:hover, a:focus {
            color: #2a6496;
            text-decoration: none;
        }

        .square-service-block {
            position: relative;
            overflow: hidden;
            margin: 5px auto;
        }

        .square-service-block button {
            border-radius: 15px;
            display: block;
            width: 75%;
            height: 150px;

        }

        .square-service-block button:hover {
            background-color: #80bdff;
            border-radius: 15px;
        }

        .ssb-icon {
            color: #1d2124;
            display: inline-block;
            font-size: 28px;
        }

        h2.ssb-title {
            color: #1d2124;
            font-size: 12px;
            font-weight: bolder;
            text-transform: uppercase;
            margin: 12px;
        }

    </style>
@endsection
