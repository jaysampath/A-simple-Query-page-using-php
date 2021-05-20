<?php

   //print_r($_POST);
    $error="";
    $success="";
   if($_POST){
      
       
       if(!$_POST['email']){
           $error .= "Email field is required <br>";
       }
       
       if(!$_POST['subject']){
           $error .= "Subject field is required <br>";
       }
       
       if(!$_POST['content']){
           $error .= "content field is required <br>";
       }  
         
       
       
       if($error!=""){
           $error = '<div class="alert alert-danger" role = "alert"><strong> There were error(s) in your form: </strong><br>' . $error . '</div>';
       }else{
           
           $emailto = $_POST['email'];
           $subject = $_POST['subject'];
           $body = $_POST['content'];
           $headers="From: ".$_POST['email'];
           
           if(mail($emailto,$subject,$body,$headers)){
               $success = '<div class="alert alert-success" role = "alert"><strong>Your query has been sent. Our team will review it and get back to you ASAP!. </strong></div>';
           }else{
               $error = '<div class="alert alert-danger" role = "alert"> Could not sent. Please try again later  </div>';
           }
       }
       
       
   }



?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    
    
    <div class="container">
        
       <h1>Query form!</h1> 
       
       <div id="errordiv"><? echo $error.$success ?></div>
        
       <form method = "post">
          <div class="form-group">
             <label for="email">Email address</label>
             <input name = "email" type="email" class="form-control" id="email" placeholder="Enter your email">
             <small class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
                <label for="subject">Subject</label>
                <input name="subject" type="text" class="form-control" id="subject">
          </div>
 

          <div class="form-group">
                <label for="content">Elaborate your Query here</label>
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
          </div>
  
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
       </form>
    
    </div>
    
    
    

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
    <script type="text/javascript">
        
      $("form").submit(function (e){
          e.preventDefault();
          
          var error="";
           if($("#email").val()==""){
              error+="Email field is required<br>";
          }
          
          if($("#subject").val()==""){
              error+="Subject field is required<br>";
          }
          
          if($("#content").val()==""){
              error+="Content field is required";
          }
          
          if(error!=""){
          $("#errordiv").html('<div class="alert alert-danger" role = "alert"><strong> There were error(s) in your form: </strong><br>' + error + '</div>');
          }else{
              $("form").off("submit").submit();
          }
      });
       
        
        
    
    
    </script>
  
  </body>
</html>