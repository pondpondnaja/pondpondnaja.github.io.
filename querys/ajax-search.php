<?php  
    require("../assets/config/config.php");
    
    if(isset($_POST['home'])){
        $record_per_page = 6;
        $url = 'pages/';
    }else{
        $url = '';
        $record_per_page = 9; 
    }
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
                  
        $page_query = "SELECT * FROM `animelist` WHERE `name` LIKE '%$search%'";
    }else{
        $query  = "SELECT * FROM `animelist` LIMIT $start_from, $record_per_page";
        $page_query = "SELECT * FROM `animelist`";
    }

    $result = mysqli_query($conn, $query);  

    if(isset($_POST['home'])){
        $output .= "
            <span><i class='far fa-bookmark pr-2'></i>Release</span>
            <hr>";
    }else{
        $output .= "
            <span><i class='fas fa-bible pr-2'></i>Anime Sub-thai</span>
            <hr>";
    }
      
    if($search != null){
        $ea_query = "SELECT * FROM `animelist` 
                     WHERE `name` LIKE '%$search%'";
        $ea = mysqli_num_rows(mysqli_query($conn,$ea_query));
        
        if($ea > 0){
            $output .="
                <div class='col-12 col-md-12 col-lg-12 text-center mb-4'>
                    <span class='h5'>We have 
                    <span class='text-success'>\"$ea\"</span>
                        result for your keyword <span class='text-success'>\"$search\"</span></span>
                </div>";
        }
    }
    $output .= "<div class='row'>"; 

    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_object($result)) {
            $output .= "
                <div class='col-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center w-100'
                     style='padding: 0px 0px !important;'>
                    <div class='card'>
                        <img class='card-img-top img-fluid' src = 'http://placehold.it/230x150' 
                             alt = '$row->name'/>
                        <div class='card-body' style='height: 3rem;'>
                            <div class='text-center'>
                                <a class ='text-uppercase font-weight-bold' href='".$url."animeinfo.php?id=$row->id'>More info</a>
                            </div>
                            <h5 class='card-title text-center'>$row->name</h5>
                        </div>
                        <div class='card-body mb-1' style='height: 3rem;'>
                            <p class='card-text text-center'>$row->description</p>
                        </div>
                    </div>
                </div>";
        }
    }else{
        $output .= "
            <div class='col-12 col-md-12 col-lg-12 text-center'>
                <span class='h5 font-weight-bold'>We didn't result for your keyword <span class='text-danger'>\"$search\"</span></span>
            </div>
        ";
    }

    $output .= "</div>
                <hr>
                <ul class='pagination pagination-sm justify-content-center'>";   
    
    $page_result = mysqli_query($conn, $page_query);  
    $total_records = mysqli_num_rows($page_result);  
    $total_pages = ceil($total_records/$record_per_page);  
    
    if($total_pages > 1){

        $first_page = '';
        $next_page = '';
        $previous_page = '';
        $last_page = '';
        $status = '';

        $page <= 1? $first_page = 'disabled' : $first_page = '';
        $page >= $total_pages? $last_page = 'disabled' : $last_page = '';

        $page > 1? $next_page = $page - 1 : $next_page = 1;
        $page < $total_pages? $previous_page = $page + 1 : $previous_page = $total_pages;

        $output .= 
                "<li class='page-item pagination_link $first_page' style='cursor:pointer;' id='1'>
                    <span class='page-link'>&lt;&lt;</span>
                </li>
                <li class='page-item pagination_link $first_page' style='cursor:pointer;' id='".$next_page."'>
                    <span class='page-link'>&lt;</span>
                </li>";

        for($i=1; $i<=$total_pages; $i++){
            $i == $page? $status = 'active' : $status = '';
            $output .= 
                "<li class='page-item pagination_link ".$status."' style='cursor:pointer;' id='".$i."'>
                    <span class='page-link'>".$i."</span>       
                </li>";  
        }  

        $output .=
                "<li class='page-item pagination_link $last_page' style='cursor:pointer;' id='".$previous_page."'>
                    <span class='page-link'>&gt;</span>
                </li>
                <li class='page-item pagination_link $last_page' style='cursor:pointer;' id='".$total_pages."'>
                    <span class='page-link'>&gt;&gt;</span>
                </li>";
    }

    $output .= '</ul>';  
    echo $output;  
?>