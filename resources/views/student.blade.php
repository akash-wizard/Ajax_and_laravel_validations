<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
    	.mandatory{
    		color: red;

    	}
    	.success_msg{
    		display: none;
    	}
    </style>
</head>
<body>



	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="/">std</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="/">Home</a></li>
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
	        <span class="caret"></span></a>
	  </div>
	</nav>


<div class="container">
  <div class="row">
    <ul class="errrors">
    </ul>
    <div class="success_msg">
      
    </div>

	    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <h3>Student Information</h3>
            <form id="std_form">
              <div class="form-group">
                <label for="name">Full Name:<span class="mandatory">*</span></label>
                <input type="text" class="form-control" name="full_name" id="name">
              </div>
              <div class="form-group">
                <label for="email">Email:<span class="mandatory">*</span></label>
                <input type="email" class="form-control" name="email" id="email">
              </div>
              <div class="form-group">
                <label for="email">Alternate Email:</label>
                <input type="email" class="form-control" name="alternate_email" id="email">
              </div>
              <div class="form-group">
                <label for="email">Mobile:<span class="mandatory">*</span></label>
                <input type="number" class="form-control" name="mobile" id="email">
              </div>
              <div class="form-group">
                <label for="email">Alternate Mobile:</label>
                <input type="number" class="form-control" name="alternate_mobile" id="email">
              </div>
              <div class="form-group">
                <label for="Address">Address:<span class="mandatory">*</span></label>
                <textarea class="form-control" rows="5" id="Address" name="address"></textarea>
               </div>
                <div class="form-group">
				  <label for="sel1">City:<span class="mandatory">*</span></label>
				  <select class="form-control" id="sel1" name="city">
				    <option value="">--Select--</option>
				    <option value="mumbai" >Mumbai</option>
				    <option value="pune" >Pune</option>
				    <option value="thane" >Thane</option>
				  </select>
				</div> 
				<div class="form-group">
					<label for="Gender">Gender: <span class="mandatory">*</span></label>
					<div class="radio">
					 <label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
					 <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
					 <label class="radio-inline"><input type="radio" name="gender" value="other">Other</label> 
					
				</div>
				</div>
              <label>Hobbies:<span class="mandatory">*</span></label>
              <div class="checkbox">
                <label><input type="checkbox" name="hobbies[]"  value="Cricket">Cricket</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="hobbies[]" value="Football">Football</label>
              </div>
              <div class="checkbox disabled">
                <label><input type="checkbox" name="hobbies[]" value="hockey">hockey</label>
              </div> 
              <div class="form-group">
                <label for="pwd">Password:<span class="mandatory">*</span></label>
                <input type="password" class="form-control" id="pwd" name="password">
              </div>
              <div class="form-group">
                <label for="pwd">Confirm Password:<span class="mandatory">*</span></label>
                <input type="password" class="form-control" id="pwd" name="confirm_password">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <a href="{{ url('/') }}">Login</a><br>
        </div>
    </div>





<script type="text/javascript">
  $(function() {
    $("#std_form").on("submit", function(e) {
      e.preventDefault()
      // alert('pok')
      $.ajax({
        url: '/studentInfo',
        method: 'POST',
        data: new FormData(this),
              headers:{
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },   
        processData: false,
        contentType: false,
        success: function(obj) {
          alert("success")
          $(".alert-danger").remove()
          $(".success_msg").show()
          
         

          $(".success_msg").html("<li class='alert alert-success'>Submitted successfully!</li>")

          // window.setTimeout(function() {
          //   window.location.href = '{{url('/dashboard')}}';
          // }, 1000);
          // alert('Submitted Successfully.')
        },
        error: function(obj) {
          alert("error")
          $(".success_msg").hide()
          console.log(obj)
          $(".alert-danger").remove()
          $.each(obj.responseJSON.errors, function(key, val) {
            // alert(val)
            $(".errrors").append("<li class='alert alert-danger'>"+val+"</li>")
            // console.log(val)
          })

          // alert("Server Error occured! PLease contact supprt team.")
        }
      })
    })
  })
</script>

</body>
</html>