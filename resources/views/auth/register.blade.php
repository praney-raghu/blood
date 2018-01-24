@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">            
            <div id="regForm" class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6 .radio-inline">
                            <label class="radio-inline"><input id="categoryDonor" type="radio" name="category" value="donor" >Donor</label>&nbsp;
                            <label class="radio-inline">   <input id="categoryBank" type="radio" name="category" value="bank" >Blood Bank</label>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="bloodgrouplist" class="form-group{{ $errors->has('bloodgroup') ? ' has-error' : '' }}" style="display: none;">
                            <label for="bloodgroup" class="col-md-4 control-label">Blood Group</label>

                            <div class="col-md-6">
                            <select class="form-control" name="bloodgroup" id="bloodgroup">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            </select>
                            @if ($errors->has('bloodgroup'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bloodgroup') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div id="addressDetails" class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" style="display: none;" >
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter your address" >
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="districtDetails" class="form-group{{ $errors->has('district') ? ' has-error' : '' }}" style="display: none;">
                            <label for="district" class="col-md-4 control-label">District</label>                            
                            <div class="col-md-6">
                            <input id="district" type="text" class="form-control" name="district" value="{{ old('district') }}" placeholder="City/District" >
                            @if ($errors->has('district'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="stateDetails" class="form-group{{ $errors->has('state') ? ' has-error' : '' }}" style="display: none;">
                            <label for="state" class="col-md-4 control-label">State</label>
                            
                            <div class="col-md-6">
                            <select class="form-control" name="state" id="state">
                            <option value="Delhi">Delhi</option>
                            </select>
                            @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="pincodeDetails" class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}" style="display: none;">
                            <label for="pincode" class="col-md-4 control-label">Pincode</label>
                            <div class="col-md-6">
                            <input id="pincode" type="text" class="form-control" name="pincode" value="{{ old('pincode') }}" placeholder="Pincode" >
                                @if ($errors->has('pincode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pincode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                           
                                                
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#categoryDonor").click(function(){
        $("#bloodgrouplist").show();
        $("#addressDetails").hide();
        $("#districtDetails").hide();
        $("#stateDetails").hide();
        $("#pincodeDetails").hide();
    });
    $("#categoryBank").click(function(){
        $("#addressDetails").show();
        $("#districtDetails").show();
        $("#stateDetails").show();
        $("#pincodeDetails").show();
        $("#bloodgrouplist").hide();        
    });
});
</script>
@endsection
