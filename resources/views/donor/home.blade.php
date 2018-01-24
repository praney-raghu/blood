@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Donor Dashboard</div>

                <div class="panel-body">
                    
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td> {{ $donor[0]->name }} </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td> {{ $donor[0]->email }} </td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td> {{ $donor[0]->mobile }} </td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td> {{ $donor[0]->blood_group }} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
