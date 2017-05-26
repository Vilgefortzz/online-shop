$(document).ready(function() {

    $('.set-quantity').on('click', function (e) {
        e.preventDefault();

        // Get id to make change on right product
        var id = $(this).attr('id').split('_')[1];

        var type = $(this).attr('data-type');
        var input = $('#input_' + id);
        var currentVal = parseInt(input.val());

        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                var minValue = parseInt(input.attr('min'));
                if(!minValue) minValue = 1;
                if(currentVal > minValue) {
                    input.val(currentVal - 1).change();
                }
                if(parseInt(input.val()) == minValue) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {
                var maxValue = parseInt(input.attr('max'));
                if(!maxValue) maxValue = 9999999999999;
                if(currentVal < maxValue) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == maxValue) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });

    $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
    });

    $('.input-number').change(function() {

        var url = $(this).attr('href');

        var minValue =  parseInt($(this).attr('min'));
        var maxValue =  parseInt($(this).attr('max'));
        if(!minValue) minValue = 1;
        if(!maxValue) maxValue = 9999999999999;
        var valueCurrent = parseInt($(this).val());

        var input_id = $(this).attr('id');
        var id = input_id.split('_')[1];

        if(valueCurrent >= minValue) {
            $('#minus_' + id).removeAttr('disabled');

        } else {
            alert('Sorry, you cannot buy less than one item of product');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $('#plus_' + id).removeAttr('disabled');
        } else {
            alert('Sorry, you want to buy more items than are available on stock');
            $(this).val($(this).data('oldValue'));
        }

        valueCurrent = parseInt($(this).val());

        $.ajax({
            type: 'POST',
            url: url,
            data: {newQuantityValue : valueCurrent},

            success: function(data) {

                var newTotalMoney = data.newTotalPrice.toFixed(2);
                var newMoneyProductAll = (data.product.price * valueCurrent).toFixed(2);

                $('#price_product_all_' + data.product.id).hide();
                $('#price_product_all_' + data.product.id).text(newMoneyProductAll + '$').delay(500).fadeIn();

                $('#money').hide();
                $('#money').text('$' + newTotalMoney).delay(500).fadeIn();

                var quantityString = $('#quantity_product_' + data.product.id);

                $(quantityString).hide();
                $(quantityString).text(valueCurrent).delay(500).fadeIn();
            }
        });
    });
});
