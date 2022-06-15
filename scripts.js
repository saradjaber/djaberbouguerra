$(document).ready(function() {
	var Ototal = total = 0;
	var qtys = $('.qty');
	for (qty of qtys)
	{
		pp = parseFloat($(qty).val()*$(qty).attr('price'));
		total += pp;
	}

	Ototal = total;

	$('#total').val(total)

	// $(document).on('change', '.qty', function(event) {

	// 	event.preventDefault();
	// 	var qty = $(this).val();
	// 	var price = $(this).attr('price');
		
	// 	var totlprice = qty * price;

	// 	total = Ototal + totlprice;

	// 	console.log(total)

	// 	$('#total').val(total);
		
	// });

	$('.qty').on('change', function(){
    var total = 0;
    // on every keyup, loop all the elements and add all the results
    $('.qty').each(function(index, element) {
        var val = parseFloat($(element).val()*$(element).attr('price'));
        if( !isNaN( val )){
           $(element).next().val(val);
           total += val;
        }
    });
    $('#total').val(total);
});
});