<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Apartment Management</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
<!--                <li class="active"><a href="#">Room <span class="sr-only">(current)</span></a></li>-->
<!--                <li><a href="#">Rooms</a></li>-->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Room type management</li>
                        <li><a href="/roomtype">Room type list</a></li>
                        <li><a href="/roomtype/add">Add room type</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Floor management</li>
                        <li><a href="/floor">Floor list</a></li>
                        <li><a href="/floor/add">Add floor</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Room management</li>
                        <li><a href="/room">Room list</a></li>
                        <li><a href="/room/add">Add room</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/customer">Customer list</a></li>
                        <li><a href="/customer/add">Add customer</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rental/Booking <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Booking</a></li>
                        <li><a href="/rental/check-in">Check in</a></li>
                        <li><a href="#">Check out</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Billing <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Bill list</a></li>
                        <li><a href="#">Create bill</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Report <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Booking</a></li>
                        <li><a href="#">Check in</a></li>
                        <li><a href="#">Check out</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">nettanawat@gmail.com <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
