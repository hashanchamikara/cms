<?php
/**
 * Created by IntelliJ IDEA.
 * User: gayan
 * Date: 6/12/18
 * Time: 1:53 PM
 */ ?>
<span style="font-weight: bolder">Customer Details</span>
<hr>
<table border="1" style="width: auto">
    <tr style="font-weight: bolder">
        <th style="width: 2%">CustomerID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>DOB</th>
        <th>Gender</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Company Name</th>
    </tr>
    <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->first_name}}</td>
        <td>{{$customer->last_name}}</td>
        <td>{{$customer->dob}}</td>
        <td>
            @if($customer->gender == 1)
                Male
            @else
                Female
            @endif
        </td>
        <td>{{$customer->phone}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->company_name}}</td>
    </tr>

</table>
