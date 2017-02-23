<?php?>

<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->


              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home </a></li>
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Admin</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Login</a></li>
                  <li><a href="#">Sign up</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        
        
        <div class="container-fluid" style="text-align: center;">
            <h1>my blog</h1>
        </div>
        <div class="container-fluid" style="max-width: 60%;margin: 0 auto;box-shadow: 10px 10px 5px #b7b7b7;border-width: thin;border-style: ridge;padding: 20px;background-color: #f8f8f8;">
            <form id="" class=""  method="post" action="" onsubmit="">
                <div class="form-group  ">
                                <label class="" for="text">Name</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group  ">
                                <label class="" for="email">Email Adress</label>
                                <input type="email" class="form-control" />
                            </div>
                            <div class="form-group  ">
                                <label  class="" for="pwd">Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group  ">
                                <label  class="" for="pwd">Confirm</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group row">
                                 <label  class="col-md-2" for="pwd">Gender</label>
                                    <span>
                                        <input id="element_4_1" name="element_4" class="" type="radio" value="1" />
                                        <label class="choice" for="element_4_1">Male</label>
                                        <input id="element_4_2" name="element_4" class="" type="radio" value="2" />
                                        <label class="choice" for="element_4_2">Female</label>
                                    </span>

                            </div>
                            <div class="form-group ">
                                <label  class="" for="text">Country</label>
                                <div class="">
                                    <select class="form-control " id="sel1">
                                        <option>select country</option>
                                        <option>Egypt</option>
                                        <option>USA</option>
                                        <option>England</option>
                                        <option>Spain</option>
                                      </select>
                                </div>


                            </div>

                            <div class="form-group ">
                                <button class=" btn btn-primary" type="sumbit">Sumbit</button>

                            </div>
                </form>
        </div>
        
        <script src="js/jquery-3.1.1.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    </body>
</html>
