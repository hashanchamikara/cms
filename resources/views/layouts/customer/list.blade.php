@extends('layouts.app')
@section('content')
    <div class="container" ng-controller="customerCtrl" ng-app="customerApp">
        <div class="card small">
            <div class="card-header">
                <div class="card-title text-info text-uppercase">
                    Customer List
                    <a href="/customer/create" target="_self">
                        <button type="button" class="btn btn-dark btn-sm float-right "><i class="fa fa-plus"> New
                                Customer</i>
                        </button>
                    </a>
                </div>
            </div>
            @if (session('alert'))
                <div class="alert alert-success">
                    <button type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-hidden="true">&times;
                    </button>
                    {{ session('alert') }}
                </div>
            @endif
            <div class="card-body">
                <form action="/customer/search" method="post">
                    <div class="form-group row">
                        {{csrf_field()}}
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="search" placeholder="SEARCH">
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary btn-sm float-left"><i class="fa fa-search">Search</i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="form-group row">
                    @if(isset($customers))
                        <table class="table table-hover table-responsive-lg">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Action <a href="{{action('CustomerController@downloadCustomerList')}}"><button class="btn btn-info btn-sm float-right" ><i class="fa fa-file-pdf"> export</i>
                                        </button></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $key=> $customer)

                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->first_name}}</td>
                                    <td>{{$customer->last_name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#customerModal_{{$key}}"
                                                data-whatever="@mdo" id="view_{{$key}}"><i class="fa fa-eye"> view</i>
                                        </button>
                                        <a href="{{action('CustomerController@downloadPDF', $customer->id)}}"><button class="btn btn-info btn-sm" ><i class="fa fa-file-pdf"> export</i>
                                        </button></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="customerModal_{{$key}}" tabindex="-1" role="dialog"
                                     aria-labelledby="customerModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="/customer/update" method="post">
                                                @csrf
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body small">
                                                    <div class="form-group">
                                                        <label class="col-form-label">FIRST
                                                            NAME:</label>
                                                        <input type="text" class="form-control"
                                                               name="first_name"
                                                               id="first_name_{{$key}}"
                                                               value="{{$customer->first_name}}" required>
                                                        <input type="hidden" name="id" value="{{$customer->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">LAST
                                                            NAME:</label>
                                                        <input type="text" class="form-control"
                                                               name="last_name"
                                                               id="last_name_{{$key}}"
                                                               value="{{$customer->last_name}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">BIRTH DAY:</label>
                                                        <input type="datetime" ui-date="dateOptions"
                                                               class="form-control"
                                                               name="birthday"
                                                               id="birthday_{{$key}}"
                                                               value="{{$customer->dob}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">GENDER:</label>
                                                        <div class="col-lg-9">
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="gender" id="male" value="1"
                                                                           value="1" @if ($customer->gender ==1) {!! "checked" !!} @endif>
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="gender" id="female"
                                                                           value="2" @if ($customer->gender ==2) {!! "checked" !!} @endif>
                                                                    Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">TELEPHONE:</label>
                                                        <input type="number" class="form-control"
                                                               id="telephone_{{$key}}"
                                                               name="telephone"
                                                               value="{{$customer->phone}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">EMAIL:</label>
                                                        <input type="text" class="form-control" id="email_{{$key}}"
                                                               name="email"
                                                               value="{{$customer->email}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-form-label">COMPANY NAME:</label>
                                                        <input type="text" class="form-control"
                                                               id="company_name_{{$key}}" name="company_name"
                                                               value="{{$customer->company_name}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                                                class="fa fa-times"> Close</i></button>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save">
                                                            Update</i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>

                        </table>
                        {!! $customers->render() !!}
                    @else
                        <div class="alert alert-warning col-lg-12 text-center" role="alert">
                            <span>{{ $message }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        $('div.alert').delay(2000).slideUp(300);
        var app = angular.module("customerApp", ['ui.date']);

        app.controller("customerCtrl", function ($scope, $http, $filter) {

            $scope.dateOptions = {
                changeYear: true,
                changeMonth: true,
                dateFormat: 'yy-mm-dd'
            };
        });

        function exportPdf($id) {


            var id = $id;
            $.ajax({
                url: 'customer/downloadPDF/1',
                method: 'get',
                data: {
                    id: id
                }

            }).done(function (response) {

            });
        }
    </script>
@endsection
