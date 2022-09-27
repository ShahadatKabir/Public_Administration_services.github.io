<?php
    include('option_head.php');     //Header design with HTML.
?>


<!doctype html>
    <html lang="en">
      <head>
        <title>Driving Licence</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      </head>
      <body>
      <!--Page Direction-->
      <h6 class="pl-2 p"><a href="./index.php" class="a1">Admin Index</a> > <a class="a1" href="./service.php">Services Request</a> > NID Request</h6>

      <style>
          .a1
          {
              color:darkgray;
              font-size: 16px;
          }
          .p{font-size: 16px;}

          a{color:black;}
      </style>


    <div class="pl-1">

        <?php

            //connecting to the database
            $server_name = "localhost";
            $user_name = "root";
            $password = "";
            $database_name = "nidcard";


            //making connection to the database
            $connect = mysqli_connect($server_name, $user_name, $password, $database_name);

            if(!$connect)
            {
                die ("Sorry..!! Faild to connect to the database." . mysqli_connect_error());
            }


            //Executing sql query.
            $sql = "SELECT * FROM `nid_registration`";
            $result = mysqli_query($connect, $sql);
   
        ?>    


        <!--Navigation bar-->

        <br>
        <div>
            <nav>
                <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a class="nav-link active" href="#">Approval Request</a>
                </li>
            </nav>
        </div><br>


        <!--Table start-->
        <?php
            //Displaying total rows of database.
            $total_rows = mysqli_num_rows($result);
            echo "";
            echo "(" . "$total_rows" . ")" . " Records found in the Database-";
            echo "";
        ?>

        <table class="table table-hover table-striped">
            <thead class="table_head2">
                <tr>
                  <th class="table_data1">Name :</th>
                  <th>Date of  Birth :</th>
                  <th>Birth certificate number :</th>
                  <th>Place Of  Birth :</th>
                  <th>Father's name :</th>
                  <th>Mother's name :</th>
                  <th>Father's nationality :</th>
                  <th>Mother's nationality :</th>
                  <th>Sex :</th>
                  <th>Permanent Address:</th>
                  <th>Present Address :</th>
                  <th>Edit :</th>
                  <th>Delete :</th>
                </tr>
            </thead>


            <?php

                if($total_rows > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $Name = $row['Name'];
                        $birthday = $row['Dob'];
                        $brth_certificate_no = $row['Birth_certificate_number'];
                        $birth_place= $row['place_of_birth'];
                        $fathers_name = $row['fathers_name'];
                        $mothers_name = $row['mothers_name'];
                        $fathers_nationality = $row['fathers_nationality'];
                        $mothers_nationality= $row['mothers_nationality'];
                        $sex = $row['sex'];
                        $permanent_address = $row['permanent_address'];
                        $present_address = $row['present_address'];

                        echo '<tr>

                        <th scope="row">'.$Name.'</th>
                        <td>'.$birthday.'</td>
                        <td>'.$brth_certificate_no.'</td>
                        <td>'.$birth_place.'</td>
                        <td>'.$fathers_name.'</td>
                        
                        
                        <td>'.$mothers_name.'</td>
                        <td>'.$fathers_nationality.'</td>
                        <td>'.$mothers_nationality.'</td>
                        <td>'.$sex.'</td>
                        <td>'.$permanent_address.'</td>
                        <td>'.$present_address.'</td>
                        <td class="td1">
                            <a class="btn btn-sm btn-primary glyphicon glyphicon-pencil text-light" href="nid_edit.php?edit_id='.$Name.'"> </a>
                        </td>
                        <td>
                            <a class="text-light btn btn-sm btn-danger glyphicon glyphicon-trash" href="nid_delete.php?del_id='.$Name.'" onclick="return delete_permission()"> </a>
                        </td>';
                              
                    }
                }
            ?>    
                        
        </table>

        <!--Making a JavaScript code for asking permission to Delete a Data-->
        <script>
            function delete_permission()
            {
                return Confirm('Are you sure you want to delete this record ?');
            }
        </script>

    </div>
    
    
          
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>



    <style>
        .table_head2
        {
            background-color:rgb(10, 70, 70);
            color: white; 
        }
    </style>