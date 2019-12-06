$(document).ready(function(){
    load_data(); 
    function load_data(page){  
        var searchtext = $('#keyword').val();  
        console.log("Keyword from page : "+searchtext);
        $.ajax({  
            url:"../querys/ajax-search.php",  
            method:"POST",  
            data:{page:page, query:searchtext},  
            success:function(data){  
                console.log(data.length);
                if(data.length < 7000){
                    $('#sticky-footer').attr('class','page-footer_new py-4 text-black-100');
                    $('#list_data').html(data); 
                }else{
                    $('#sticky-footer').attr('class','page-footer py-4 text-black-100');
                    $('#list_data').html(data);  
                }
            }  
        })
    }  

    $(document).on('click', '.pagination_link', function(){  
        var page = $(this).attr("id"); 
        console.log("page id: "+page); 
        load_data(page);  
    });  
       
    $('#keyword').keyup(function(){
        var txt = $(this).val();
        console.log("Keyword from type : "+txt);
        if(txt != ''){
            $.ajax({  
                url:"../querys/ajax-search.php",  
                method:"POST",  
                data:{query:txt},  
                success:function(data){  
                    console.log(data.length);
                    if(data.length < 3000){
                        $('#sticky-footer').attr('class','page-footer_new py-4 text-black-100');
                        $('#list_data').html(data); 
                    }else{
                        $('#sticky-footer').attr('class','page-footer py-4 text-black-100');
                        $('#list_data').html(data);  
                    }
                }  
            });  
        }else{
            console.log("No keyword");
            $('#sticky-footer').attr('class','page-footer py-4 text-black-100');
            load_data();
        }
    });
});