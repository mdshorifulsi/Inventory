<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                   

            <li>
                <a href="{{route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            

            <li>
                <a href="{{route('pos') }}"><i class="fa fa-edit fa-fw"></i>Point Of Order(POS)<span class="fa arrow"></span></a>
            </li>
    
            <li>
            <a href="{{route('all.product') }}"><i class="fa fa-edit fa-fw"></i>Product<span class="fa arrow"></span></a>
            </li>

              <li>
            <a href="{{route('all.category') }}"><i class="fa fa-edit fa-fw"></i>Category<span class="fa arrow"></span></a>
            </li>
         

             <li>
                <a href="{{route('all.employee') }}"><i class="fa fa-edit fa-fw"></i> Employee<span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Employee Attendence<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('take.attendence') }}">Take Attendence</a>
                        </li>

                         <li>
                        <a href="{{route('all.attendence') }}">All Attendence</a>
                        </li>
                </ul>
                            <!-- /.nav-second-level -->
            </li>

             <li>
            <a href="{{route('all.expense') }}"><i class="fa fa-edit fa-fw"></i>Expense<span class="fa arrow"></span></a>
            </li>


             <li>
            <a href="{{route('all.customer') }}"><i class="fa fa-edit fa-fw"></i> Customer<span class="fa arrow"></span></a>
            </li>


             <li>
            <a href="{{route('all.supplier') }}"><i class="fa fa-edit fa-fw"></i>Supplier<span class="fa arrow"></span></a>
            </li>

         

               <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Order<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('all.order') }}">All Order</a>
                        </li>

                         <li>
                        <a href="{{route('pending.order') }}">All pending</a>
                        </li>
                        <li>
                        <a href="{{route('success.order') }}">All success</a>
                        </li>
                </ul>
                            <!-- /.nav-second-level -->
            </li>

           


           



            

           




                        
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>