<?php
/**
 * Created by IntelliJ IDEA.
 * User: gayan
 * Date: 6/12/18
 * Time: 11:40 AM
 */ ?>
@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="customerCtrl" ng-app="customerApp">
        <div class="card bg-light text-dark small">
            <div class="card-header">
                <div class="card-title text-info text-uppercase">
                    Customer Create
                    <a href="/customer/" target="_self">
                        <button type="button" class="btn btn-dark btn-sm float-right "><i class="fa fa-list"> Customer
                                List</i>
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
                <form class="form" role="form" autocomplete="off" action="/customer/save" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">First Name</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="first_name" id="first_name" type="text" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Last Name</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="last_name" id="last_name" type="text" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">BirthDay</label>
                        <div class="col-lg-4">
                            <input type="datetime" ui-date="dateOptions" class="form-control"
                                   name="birthday" id="birthday" ng-model="birthday"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                        <div class="col-lg-9">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="2">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="phone_number" id="mobile" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Company Name</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="company_name" id="company_name" type="text" required>
                        </div>
                    </div>

                    <div class="row float-right" style="padding-top: 50px">
                        <input type="submit" class="btn btn-primary" value="Create Customer">
                    </div>
                </form>
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
    </script>
@endsection

