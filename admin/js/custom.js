(function($){
    
    $(document).ready(function(){
    
        $(".paginate").customPaginate({
        
            itemsToPaginate : ".post"
        
        });

         $(".paginate2").customPaginate({
        
            itemsToPaginate : ".post2"
        
        });
    
    });
    
})(jQuery)