<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OJT</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
                <!-- these are my internal link to css-->
        
                <link href="/css/main.css" rel="stylesheet">
                <script src="/js/app.js"></script>
                <script src="/js/main.js"></script>
        
        
                <!-- these are the links of online css -->
        
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <link href="CSS/MiStilo.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        
        <style>
            .b1{
  background: url(../image/4.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}



.row{
 margin-top: 10%;
}


label{
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size:15px;
}

.par {
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-size:15px;
  margin-top: 30px;
}

button{
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

   
}

#col-Login{
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

.logo {
  width: 50%;
  margin-left: 24%;
  
}
        </style>
        
        </head>

<body class="b1">
        <section class="container-fluid">
            <div class="row justify-content-center  ">
                <div class="col-3 rounded border shadow p-3 mb-5 bg-white" id="col-Login" >
                            <img class="logo" src="img/CLIMBS.png" alt="Logo">
                            <form class="login-form"  method="POST">
                                <div class="form-group" id="errorLogin" >
                                </div>
                                <div class="form-group">
                                    <label >Username</label>
                                    <input type="text" id="user" name="user" class="form-control" placeholder="Usurname" required>    
                                </div>
                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="password" class="form-control"  id="password" name="password"  placeholder="Password" required>
                                </div>
                                <div class="par"> <p>&nbsp;Please login user credentials.</p></div>
                                <div class="form-group">
                                    <a href="http://firstojt.net/user#"><button type="submit" class="btn btn-primary float-right">Submit</button></a>                              
                                </div>
                            </form>
                        </div>
                </div>
            </section>
    </body>

</html>
