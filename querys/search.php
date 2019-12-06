<?php  
    require("../assets/config/config.php");
    $record_per_page = 9;  
    $page = '';  
    $output = ''; 

    if(isset($_POST["page"])){  
        $page = $_POST["page"];  
    }else{  
        $page = 1;  
    }  

    $start_from = ($page - 1)*$record_per_page;  
 
    $output = '';  
    
    if(isset($_POST['query'])){

        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "SELECT * FROM `animelist` 
              WHERE `name` LIKE '%$search%'
              LIMIT $start_from, $record_per_page";  
    }else{

        $query  = "SELECT * FROM `animelist` LIMIT $start_from, $record_per_page";
    }

    $result = mysqli_query($conn, $query);  

    $output .= "<div class='row'>"; 
    
    if($result){
        while ($row = mysqli_fetch_object($result)) {
            $output .= "
                <div class='col-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center w-100'
                     style='padding: 0px 0px !important;'>
                    <div class='card'>
                        <img class='card-img-top img-fluid' src = 'http://placehold.it/230x150' 
                             alt = '$row->name'/>
                        <div class='card-body' style='height: 3rem;'>
                            <div class='text-center'>
                                <a class ='text-uppercase font-weight-bold' href='animeinfo.php?id=$row->id'>More info</a>
                            </div>
                            <h5 class='card-title text-center'>$row->name</h5>
                        </div>
                        <div class='card-body mb-1' style='height: 3rem;'>
                            <p class='card-text text-center'>$row->description</p>
                        </div>
                    </div>
                </div>";
        }
    }

    $output .= '</div><br/><div align="center">'; 

    $page_query = "SELECT * FROM `animelist` WHERE `name` LIKE '%$search%'";  
    
    $page_result = mysqli_query($conn, $page_query);  
    $total_records = mysqli_num_rows($page_result);  
    $total_pages = ceil($total_records/$record_per_page);  
    
    if($total_pages > 1){
        for($i=1; $i<=$total_pages; $i++){  
            $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
        }  
    }


    $output .= '</div><br /><br />';  
    echo $output;  





 ?>