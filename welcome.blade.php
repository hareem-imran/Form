<?php
    // Connecting with database and executing query
    $connection = mysqli_connect("localhost", "root", "", "madadd34_HC");
    $sql = "SELECT * FROM doctor_profile";
    $result = mysqli_query($connection, $sql);


 ?>

 <script>
     
 </script>

 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Doctor</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">



<script src='https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js'></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious - v2.1.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


<!-- Include bootstrap & jQuery -->
<link rel="stylesheet" href="css/bootstrap.css" />
<script src="jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</head>
<body>
 
<!-- Creating table heading -->
<div class="container">

<br />
     <h3 align="center">Custom Search in Datatables using Ajax</h3>
     <br />
            <br />
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="filter_gender" id="filter_gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                
                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
   <div class="table-responsive">
    <table id="doctor_profile" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Postal Code</th>
                            <th>Qualification</th>
                        </tr>
                    </thead>
                </table>
   </div>
            <br />
            <br />
  </div>
</body>

</html>
<script>
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_gender = '', filter_first_name = '')
    {
        var dataTable = $('#doctor_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('customsearch.index') }}",
                data:{filter_gender:filter_gender, filter_first_name:filter_first_name}
            },
            columns: [
                {
                    data:'first_name',
                    name:'first_name'
                },
                {
                    data:'Gender',
                    name:'Gender'
                },
                {
                    data:'Address',
                    name:'Address'
                },
                {
                    data:'City',
                    name:'City'
                },
                {
                    data:'PostalCode',
                    name:'PostalCode'
                },
                {
                    data:'qualification',
                    name:'qualification'
                }
            ]
        });
    }

    $('#filter').click(function(){
        var filter_gender = $('#filter_gender').val();
        var filter_first_name = $('#filter_first_name').val();

        if(filter_gender != '' &&  filter_gender != '')
        {
            $('#doctor_data').DataTable().destroy();
            fill_datatable(filter_gender, filter_first_name);
        }
        else
        {
            alert('Select Both filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_gender').val('');
        $('#filter_first_name').val('');
        $('#doctor_data').DataTable().destroy();
        fill_datatable();
    });

});
</script>



    <table class="table">
        <tr>
            <th>Name</th>
            <th>Specialization</th>
            
        </tr>
 
        <!-- Display dynamic records from database -->
        <?php while ($row = mysqli_fetch_object($result)) { ?>
            <tr>
                <td><?php echo $row->first_name; ?></td>
             
                <td><?php echo $row->specialization; ?></td>
                <!--Button to display details -->
        <td>
            <button class = "btn btn-primary" onclick="loadData(this.getAttribute('data-id'));" data-id="<?php echo $row->first_name; ?>">
                Apointment
            </button>
        </td>
            </tr>
        <?php } ?>
    </table>
</div>


<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-hidden = "true">
    
   <div class = "modal-dialog">
      <div class = "modal-content">
          
         <div class = "modal-header">
            <h4 class = "modal-title">
               Dotcor Detail
            </h4>
 
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
               ×
            </button>
         </div>
          
         <div id = "modal-body">
            Press ESC button to exit.
         </div>
          
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               OK
            </button>
         </div>
          
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
    
</div><!-- /.modal -->

</body>
<script>
    function loadData(id) {
        $.ajax({
            url: "index.php",
            method: "POST",
            data: {get_data: 1, id: id},
            success: function (response) {
                console.log(response);
            }
        });
    }
    success: function (response) {
    response = JSON.parse(response);
    console.log(response);
 
    var html = "";
 
    // Displaying Specialization
    html += "<div class='row'>";
     html += "<div class='col-md-6'>Specialiaztion</div>";
        html += "<div class='col-md-6'>" + response.specialization + "</div>";
    html += "</div>";
 
    // And now assign this HTML layout in pop-up body
    $("#modal-body").html(html);
 
    // And finally you can this function to show the pop-up/dialog
    $("#myModal").modal();
}
</script>