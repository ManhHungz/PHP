<?php
    require_once('dbhelp.php');

    //$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table Product</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php

    ?>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="margin-top: 20px; margin-bottom: 20px;">
                <div class="col-sm-12" style="text-align: center;">
                     <h1>Quản lý thông tin sản phẩm</h1>
                </div>
                 <div class="col-sm-6" style="float: left;">
                    <button class="btn btn-success" onclick="window.open('input.php','_self')"><i class="fa fa-plus" style="padding-right: 10px"></i>Add New</button>
                </div>
                <div class="col-sm-6" style="float: right;padding-right: 0px">

                    <form method="get" style="float: right;width: 230px;display: flex;    border: solid 1px wheat;">
                    <input type="text" name="search" class="form-control" style="width: 200px;border: none;" >
                    <i class="fa fa-search" style="    position: relative;top: 2px;font-size: 30px;"></i>
                </form>
                </div>

                
                
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Platforms</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th width="60px"></th>
                            <th width="60px"></th>
                        </tr>
                    </thead>
                    <tbody>  
                        <tr>

                            <?php 
                            if(isset($_GET['search']) && $_GET['search'] !=''){
                                $sql = 'select * from product where name like "%'.$_GET['search'].'%"';
                            }
                            else{
                                $sql = 'SELECT * FROM product order by id ASC ';
                                if(!isset($_GET['page'])){
                                $page = 1;
                                }
                                else{
                                    $page = $_GET['page'];
                                }
                                $number_of_rows = 5;
                                $start_from = ($page-1)*$number_of_rows;
                                
                                /*echo $start_from;
                                echo '<br>';
                                echo $number_of_rows;
                                echo '<br>';
                                echo $page;*/
                                $result = totalpage($sql);
                                
                                $sql = "select * from product where 1 limit ".$start_from.','.$number_of_rows;
                                //echo $sql;
                                $total_page = ceil($result/$number_of_rows);
                               // $sql = 'select * from product order by id ASC';  
                            }
                            
                            
                            
                            $result = executeResult($sql);
                            $index =1;
                            foreach ($result as $newrow) {
                                echo'<tr>
                                        <td>'.($index++).'</td>
                                        <td>'.$newrow['name'].'</td>
                                        <td>'.$newrow['platforms'].'</td>
                                        <td>$'.round($newrow['price'],2).'</td>
                                        <td>$'.round($newrow['saleprice'],2).'</td>
                                        <td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$newrow['id'].'","_self")\'>Edit</button></td>
                                        <td><button class="btn btn-danger" onclick="deleteproduct('.$newrow['id'].')">Delete</button></td>
                                    </tr>';
                            }

                            
                            //$total_result = executeResult($sql);
                            ?>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="container">
                        <ul class="pagination">
                            <?php
                            for( $i=1; $i <= $total_page; $i++){
                                    echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                                  }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
       
        function deleteproduct(id){
             $option = confirm('Bạn có muốn xóa sản phẩm không?')
        if(!$option){
            return;
        }
            console.log(id);
            $.post('delepro.php',{
                'id' : id
            },function(data){
                alert(data)
                location.reload()
            })
        }
    </script>
</body>
</html>