<html>  
    <head>  
        <title>Tvs Internship</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>  
    <body>  
        <div class="container" style="width: 600px">
   <br />
   
   <h3 align="center">Registration form of tvs</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">Register Form</div>
    <div class="panel-body">
    
     <form  id="tvc_form">
      <div class="form-group">
       <div class="row">
        <div class="col-md-6">
         <label>Name <span class="text-danger">*</span></label>
         <input type="text" name="name" id="name" class="form-control" required/>
        </div>
        <div class="col-md-6">
         <label>Age <span class="text-danger">*</span></label>
         <input type="number" name="age" id="age" class="form-control" required />
        </div>
       </div>
      </div>
      <div class="form-group">
       <label>Email Address <span class="text-danger">*</span></label>
       <input type="email" name="email" id="email" class="form-control" required />
      
      </div>

      <div class="form-group">
       <label>Gender <span class="text-danger">*</span></label>
       <select class="form-control" id="gender" name="gender" required>
         <option value="" disabled selected>your Gender</option>
           <option value="Male">MALE</option>
            <option value="Female">FEMALE</option>
            <option value="other">Other</option>
             </select>
      </div>
      <div class="form-group">
       <input type="submit" name="submit" id="submit" class="btn btn-info" value="Register" />
      </div>
     </form>
     
    </div>
   </div>
  </div>
    </body>  
</html>


  <script src="Client Key"></script>
  <script  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <script type="text/javascript">
//Here i use the ajax to submit the form

    $(document).on('submit', '#tvc_form', function(e){
      e.preventDefault();

      grecaptcha.ready(function() {
          grecaptcha.execute('6Le_XZkaAAAAADnVgI92EjfE7aDlx7eOpZa01ROO', {action: 'application_form'}).then(function(token) {
//Here create the Form data to send it server side
            let formData = {
              name : $('#name').val(),
               age : $('#age').val(),
                email : $('#email').val(),
                 gender : $('#gender').val(),
              token: token,
              action : 'application_form'
            };
//Redirect the data by post method to server side
            $.post('insert.php', formData, function(result){
               if(result)
             $('#tvc_form')[0].reset();
              alert(result);
          
            if(result)
             $('#tvc_form')[0].reset();

          
            });

          });
      });
    });
  </script>