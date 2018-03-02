<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current"><a class="menu__link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
                        @foreach($publishedCategories as $publishedCategory) 
                           @if($publishedCategory->has('subcategories'))
                            <li class="dropdown menu__item">
                                <a href="" class="dropdown-toggle menu__link" data-toggle="dropdown">{{$publishedCategory->categoryName}}<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                            <a href="mens.html"><img src="{{asset($publishedCategory->categoryImage)}}" alt=" "/></a>
                                        </div>
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                @foreach($publishedCategory->subcategories->take(5) as $subcategory)
                                                <li><a href="{{url('/subcategory-view/'.$subcategory->id)}}">{{$subcategory->subcategoryName}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            @else
                             @endif
                            @endforeach
                            
                            <li class=" menu__item"><a class="menu__link" href="{{url('/contact')}}">contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>	
        </div>
       
        <div class="clearfix"></div>
    </div>
</div>

