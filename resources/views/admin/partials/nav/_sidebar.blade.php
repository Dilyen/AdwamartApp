<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li>
                            <a href="{{ route('categories.index') }}"><i class="fa fa-table fa-fw"></i> Categories</a>
                        </li>

                        <li>
                            <a href="{{ route('offers.index') }}"><i class="fa fa-edit fa-fw"></i> Offers</a>
                        </li>

                        <li>
                            <a href="{{ route('items.index') }}"><i class="fa fa-edit fa-fw"></i> Items</a>
                        </li>

                        <li>
                            <a href="{{ route('products.index') }}"><i class="fa fa-edit fa-fw"></i> Products</a>
                        </li>
                        <li>
                            <a href="{{ route('deals.index') }}"><i class="fa fa-gamepad fa-fw"></i> Deals</a>
                        </li>
                       
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->