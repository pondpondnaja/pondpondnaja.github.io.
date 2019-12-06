<div id="ajax_result" class="row">
    <?php
        require("../assets/config/config.php");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
   
        $limit = 9;
        $adjacents = 2; 
        $output = '';

        if (isset($_GET['page']) && $_GET['page'] != "") {
            $page = $_GET['page'];
            $offset = $limit * ($page - 1);
        } else {
            $page = 1;
            $offset = 0;
        }
        
        if(isset($_POST['query'])){

            $search = mysqli_real_escape_string($conn, $_POST["query"]);
            $query = "SELECT * FROM `animelist` 
                      WHERE `name` LIKE '%$search%'
                      LIMIT $offset, $limit";

            $page_query = "SELECT COUNT(*) 'total_rows' FROM `animelist` ORDER BY id ASC"; 

        }else{
            $query  = "SELECT * FROM `animelist` LIMIT $offset, $limit";
            $page_query = "SELECT COUNT(*) 'total_rows' FROM `animelist` ORDER BY id ASC"; 
        }

        $res = mysqli_fetch_object(mysqli_query($conn, $page_query));
        $total_rows = $res->total_rows;

        /*Get the total number of pages.*/
        $total_pages = ceil($total_rows / $limit);

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
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
            echo $output;
        }else{
            echo "
                <div>
                    <span class='h5'>Keyword didn't match</span>
                </div>";    
        }

        //Checking if the adjacent plus current page number is less than the total page number.
        //If small then page link start showing from page 1 to upto last page.

        if ($total_pages <= (1 + ($adjacents * 2))) {
            $start = 1;
            $end   = $total_pages;
        } else {
            if (($page - $adjacents) > 1) {                   //Checking if the current page minus adjacent is greateer than one.
                if (($page + $adjacents) < $total_pages) {  //Checking if current page plus adjacents is less than total pages.
                    $start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
                    $end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
                } else {                                   //If current page plus adjacents is greater than total pages.
                    $start = ($total_pages - (1 + ($adjacents * 2)));  //then the page range will start from total pages minus 1+($adjacents*2)
                    $end   = $total_pages;                           //and the end will be the last page number that is total pages number.
                }
            } else {                                       //If the current page minus adjacent is less than one.
                $start = 1;                                //then start will be start from page number 1
                $end   = (1 + ($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
            }
        }
    ?>
</div>
<?php if ($total_pages > 1) { ?>    
    <ul id='pagination' class="pagination pagination-sm justify-content-center">
        <!-- Link of the first page -->
        <li class='page-item <?php ($page <= 1 ? print 'disabled' : '') ?>'>
            <a class='page-link' href='?page=1'>&lt;&lt;</a>
        </li>
        <!-- Link of the previous page -->
        <li class='page-item <?php ($page <= 1 ? print 'disabled' : '') ?>'>
            <a class='page-link' href='?page=<?php ($page > 1 ? print($page - 1) : print 1) ?>'>&lt;</a>
        </li>
        <!-- Links of the pages with page number -->
        <?php for ($i = $start; $i <= $end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '') ?>'>
                <a class='page-link' href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
            </li>
        <?php } ?>
        <!-- Link of the next page -->
        <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '') ?>'>
            <a class='page-link'
                href='?page=<?php ($page < $total_pages ? print($page + 1) : print $total_pages) ?>'>&gt;</a>
        </li>
        <!-- Link of the last page -->
        <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '') ?>'>
            <a class='page-link' href='?page=<?php echo $total_pages; ?>'>&gt;&gt;</a>
        </li>
    </ul>
<?php } ?>