$(document).ready(function() {
    function handleIncrease()
    {
        $('#increase').on('click', function(e) {
            $('#reduction').attr('disabled', false);
            let number = $('.show__number').html();
            let max = $('#max_buy').val();
    
            if (number >= max) {
                $('#increase').attr('disabled', 'disabled');
            } else {
                number++;
                if(number == max) {
                    $('#increase').attr('disabled', 'disabled');
                }
                $('.show__number').html(number);
            }
            
        })
    }

    function handleReduction()
    {
        $('#reduction').on('click', function(e) {
            $('#increase').attr('disabled', false);
            let number = $('.show__number').html();
            let max = $('#max_buy').val();
    
            if(number == 1) {
                $('#reduction').attr('disabled', 'disabled');
            } else {
                number--;
                $('.show__number').html(number);
            }
        })
    }


    function handleAddCart()
    {
        $('#add__cart').on('click', async() => {
            let numberProduct = $('.show__number').html();
            let product = await getProduct();
            let maxBuy = product.max_buy;
            if (maxBuy < numberProduct) {
                $('#btn-max__buy--fail').click();

                return false;
            } else {
                window.location = '/carts';
            }
        })
    }

    async function getProduct()
    {
        let id = $('#product__id').val();
        return await window.axios.get(`/api/v1/product/${id}`)
        .then(function(response) {
           return response.data.data;
        })
        .catch(function(error) {
           console.log(error);
        }); 
    }
    handleIncrease();
    handleReduction();
    handleAddCart();
});