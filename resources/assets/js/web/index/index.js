$(document).ready(function(){
    function handleTabContent()
    {
       $('.tab-content #special').css('display', 'none');
       $('.tab-content #sale').css('display', 'none');

       $('#tab_feature').on('click',function(){
           $('.tab-content #special').css('display', 'none');
           $('.tab-content #sale').css('display', 'none');
           $('.tab-content #feature').css('display', 'block');
        });
    
        $('#tab_special').on('click',function(){
            $('.tab-content #sale').css('display', 'none');
            $('.tab-content #feature').css('display', 'none');
            $('.tab-content #special').css('display', 'block');
         });
    
         $('#tab_sale').on('click',function(){
            $('.tab-content #special').css('display', 'none');
            $('.tab-content #feature').css('display', 'none');
            $('.tab-content #sale').css('display', 'block');
         });
    }

    function renderListProduct()
     {
        window.axios.get('/api/v1/products/')
         .then(function(response) {
            console.log(response)
         })
         .catch(function(error) {
            console.log(error);
         });
     }

   //  renderListProduct();
    handleTabContent();
})