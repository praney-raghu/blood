@extends('layouts.app')

@section('content')
    <style> 
    
    .flex-container {
        margin-top: -20px;
        display: -webkit-flex;
        display: flex;  
        -webkit-flex-flow: row wrap;
        flex-flow: row wrap;
        text-align: center;
    }

    .flex-container > * {
        padding: 15px;
        -webkit-flex: 1 100%;
        flex: 1 100%;
    }

    .article {
        text-align: left;
    }

    .well {
        /*height: 400px;*/
    }

    header {background: #ff3333;color:white;}
    footer {background: #debbbb;color:black;}

    .nav {background:#f8f8f8;}

    .nav ul {
        list-style-type: none;
        padding: 0;
    }
    .nav ul a {
        text-decoration: none;
    }

    @media all and (min-width: 768px) {
        .nav {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
        .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
        footer {-webkit-order:3;order:3;}
    }
    </style>
<div class="flex-container">
<header>
  <h3>SaveLife Initiative</h3>
  <p>Help Save Life</p>
</header>

<nav class="nav col-md-3">
<!-- <ul>
  <li><a href="#">About Us</a></li>
  <li><a href="#">Facts</a></li>
</ul> -->
<div class="well well-lg">
    <h4>Facts about Blood</h4>
    <ol>
        <li>Nearly 7% of the body weight of a human is made up of blood.</li>
        <li>One pint of donated blood can save up to 3 lives.</li>
        <li>A newborn baby has about one cup of blood in his body.</li>
        <li>It would take 1,200,000 mosquitoes, each sucking once, to completely drain the average human of blood.</li>
        <li>Only female mosquitoes drink blood. Males are vegetarians.</li>
        <li>A red blood cell can make a complete circuit of your body in 30 seconds.</li>
    </ol>

</div>
</nav>

<article class="article col-md-9">
 <div class="panel panel-default ">
                <div class="panel-heading">Search for Blood Donors/Blood Banks</div>

                <div class="panel-body ">   
    <form class="form-inline" method="POST" action="{{ route('search') }}">
            {{ csrf_field() }}
          <div id="bloodgrouplist" class="form-group{{ $errors->has('bloodgroup') ? ' has-error' : '' }}">
                <label for="bloodgroup" class="col-md-4 control-label">Blood Group</label>

                <div class="col-md-6">
                <select class="form-control" name="bloodgroup" id="bloodgroup">
                <option value="">Please select Blood Group</option>
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
           
            <div id="stateDetails" class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                <label for="state" class="col-md-4 control-label">State</label>
                
                <div class="col-md-6">
                <select class="form-control" name="state" id="state">
                <option value="">Please select City/State</option>
                <option value="Delhi">Delhi</option>
                </select>
                @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                </div>
            </div>
       </form>
        </div>
    </div>
    <div><img src="./images/blood_donor.jpg" class="img-rounded" alt="Blood  Compatibility"></div>     
</article>
<footer class="footer navbar-fixed-bottom" >Copyright &copy; Praney Raghuvanshi</footer>
</div>


@endsection
