
@if(Session::get('message') || $errors->has('password'))
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal4').modal('show');
    });

</script>
@endif

@if (session('alert'))
    <div class="alert alert-danger text-center logOut" style="font-size: 20px;">
        {{ session('alert') }}
    </div>

@elseif (session('alert'))
    <div class="alert alert-danger text-center loginfaild" style="font-size: 20px;">
        {{ session('alert') }}
    </div>
@elseif (session('alert-success'))
    <div class="alert alert-success text-center logIn" style="font-size: 20px;">
        {{ session('alert-success') }}
    </div>
<!-- @elseif (session('alert-success'))
    <div class="alert alert-success text-center regSucc" style="font-size: 20px;">
        {{ session('alert-success') }}
    </div> -->
@endif
<div class="header">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="{{url('/')}}"><img src="{{asset('public/frontEnd/images/Picture5.png')}}"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            <form>
                <div class="search">
                    <input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
                </div>
                <div class="section_room">
                    <select id="country" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">All categories</option>
                        <option value="null">Electronics</option>     
                        <option value="AX">kids Wear</option>
                        <option value="AX">Men's Wear</option>
                        <option value="AX">Women's Wear</option>
                        <option value="AX">Watches</option>
                    </select>
                </div>
                <div class="sear-sub">
                    <input type="submit" value=" ">
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <!-- <div class="col-md-3 header-right footer-bottom">
            <ul>
                <li><a href="#" class="use1" value="" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>

                </li>
                <li><a class="fb" href="{{url('/')}}"></a></li>
                <li><a class="twi" href="#"></a></li>
                <li><a class="insta" href="#"></a></li>
                <li><a class="you" href="#"></a></li>
            </ul>
        </div> -->

        <div class="col-md-3 login-panel">
        
        <?php if(!empty(Session::get('emailAddress'))){ ?> 

                <ul style="list-style: none;">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="
                        glyphicon glyphicon-user" style="font-size: 22px;">Sign-in</span> | <br/>
                        <?php echo Session::get('emailAddress');
                      
                        ?> <br/>
                         <b class="caret"></b></a>

                      <ul class="dropdown-menu">
                        <li><p> &nbsp Welcome to E-medicine&nbsp</p><a href="{{url('/customer/logout')}}" style="color: red;">Logout</a></li>
                        <li class="divider"></li>
                        <li><a href="#">My E-medicine</a></li>
                        <li class="divider"></li>
                        <li><a href="#">My Order</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Messege Center</a></li>
                      </ul>
                   
                    </li>
                </ul><?php }

                 else{?>
            <ul>
               <!--  <li><a href="#" value="" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>
                </li> -->
               
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="
                    glyphicon glyphicon-user" style="font-size: 22px;">Sign-in</span> | Join <br>
                     <b class="caret"></b></a>
                  <ul class="dropdown-menu drop_padding">
                    <li><p> &nbsp Please Sign-in First</p><a href="#" value="" data-toggle="modal" data-target="#myModal4" style="color: red;">Sign-in</a></li>
                    <li class="divider"></li>
                    <li>
                        <p>&nbsp Sign in with</p>
                        <ul>
                       <a href="#" style="padding-left:15px;font-size: 30px;"><i class="fab fa-facebook"></i></a>
                        <a href="#" style="padding-left: 15px;font-size: 30px;"><i class="fab fa-google-plus-square"></i></a>
                         <a href="#" style="padding-left: 15px;font-size: 30px;"><i class="fab fa-twitter-square"></i></a>
                    </ul></li>
                    <li class="divider"></li>
                    <li><a href="#">My E-medicine</a></li>
                    <li class="divider"></li>
                    <li><a href="#">My Order</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Messege Center</a></li>
                  </ul>
               
                </li>
            </ul>
              <?php }?>
            <div class="top_nav_right">
                <div class="cart box_1">
                    <a href="{{ url('/cart/show') }}">
                        <h3> <div class="total">
                            <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                            <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" 
                            class="simpleCart_quantity"></span> items)</div>
                        </h3>
                    </a>
                    <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                </div>  
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
            </div>
            <h3 class="text-center text-success" style="padding-bottom: 30px;">{{Session::get('message')}}</h3>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login">
                        <div class="login-bottom">
                            <h3>Sign up for free</h3>
                          {!! Form::open(['url'=>'/customer/sign-up', 'method'=>'POST', 'id'=>'register-form']) !!}
                            <div class="box-body">
                                <div class="sign-in">
                                    <h4>First Name :</h4>
                                    <input type="text" name="firstName" placeholder="Enter Your First Name"> 
                                    <span class="text-danger">{{$errors->has('firstName')? $errors->first('firstName'):''}}</span>
                                </div>
                                <div class="sign-in">
                                    <h4>Last Name :</h4>
                                    <input type="text" name="lastName" placeholder="Enter Your Last Name"> 
                                    <span class="text-danger">{{$errors->has('lastName')? $errors->first('lastName'):''}}</span>
                                </div>
                                
                                <div class="sign-in">
                                    <h4>Email :</h4>
                                    <input type="text" name="emailAddress" placeholder="Enter Your Email Address">	
                                    <span class="text-danger">{{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
                                </div>
                                <div class="sign-in">
                                    <h4>Password :</h4>
                                    <input type="password" id="password" name="password" placeholder="Enter Your Password"> 
                                    <span class="text-danger">{{$errors->has('password')? $errors->first('password'):''}}</span>
                                </div> 
                                <div class="sign-in">
                                    <h4>Confirm Password :</h4>
                                    <input type="password" name="conpassword" placeholder="Enter Your Password"> 
                                    <span class="text-danger">{{$errors->has('conpassword')? $errors->first('conpassword'):''}}</span>
                                </div> 
                                <div class="sign-in">
                                    <h4>Captcha :</h4>
                                    <div class="captcha">
                                      <span>{!! captcha_img('flat') !!}</span>
                                      <button type="button" class="btn btn-success btn-refresh"><i class="fas fa-sync"></i></button>
                                    </div>
                                      <input id="captcha" type="text" placeholder="Enter Captcha" name="captcha">
                                    <span class="text-danger">{{$errors->has('captcha')? $errors->first('captcha'):''}}</span>
                                </div> 
                            </div>
                            <!-- /.box-body -->
                            <div class="sign-up">
                                    <input type="submit" value="Register" >
                            </div>
                         {!! Form::close() !!}
                        </div>
                        <div class="login-right">
                            <h3>Sign in with your account</h3>
                             {!! Form::open(['url'=>'/customer/login', 'method'=>'POST',]) !!}
                             {{ csrf_field() }}
                                <div class="sign-in">
                                    <h4>Email :</h4>
                                    <input type="text" name="cuemailAddress" placeholder="Enter Your Valid Email Address">	
                                    <span class="text-danger">{{$errors->has('cuemailAddress')? $errors->first('cuemailAddress'):''}}</span>
                                </div>
                                <div class="sign-in">
                                    <h4>Password :</h4>
                                    <input type="password" name="cupassword" placeholder="Enter Your Valid Password">
                                    <span class="text-danger">{{$errors->has('cupassword')? $errors->first('cupassword'):''}}</span><br>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="single-bottom">
                                    <input type="checkbox"  id="brand" value="">
                                    <label for="brand"><span></span>Remember Me.</label>
                                </div>
                                <div class="sign-in">
                                    <input type="submit" value="Login">
                                </div>
                           {!! Form::close() !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->



<style type="text/css">
    .caret-up {
    width: 0; 
    height: 0; 
    border-left: 4px solid rgba(0, 0, 0, 0);
    border-right: 4px solid rgba(0, 0, 0, 0);
    border-bottom: 4px solid;
    
    display: inline-block;
    margin-left: 2px;
    vertical-align: middle;
}
li.dropdown {
    padding-left: 15px;
}

.col-md-3.login-panel ul li {
    list-style: none;
    font-size: 16px;
    margin-top: 10px;
    position: relative;
    text-decoration: none
}
a.dropdown-toggle span {
    color: #FDA30E;
}
.col-md-3.login-panel {
    padding-left: 34px;
}
ul.dropdown-menu.drop_padding li a:hover {
    color: red;
}
ul.dropdown-menu.drop_padding {
    min-width: 184px;
    text-align: center;
}
</style>

<script type="text/javascript">
        $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });

    });

/*refresh captcha*/
        $(".btn-refresh").click(function(){
          $.ajax({
             type:'GET',
             url:'/E_medicine_shop/refresh_captcha',
             success:function(data){
                $(".captcha span").html(data.captcha);
             }
          });
        });


/*form validation*/
 
</script>