$(document).on('click', '.delCart', function(e){

	e.preventDefault();
	var id = $(this).val();
	var check = confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng không? ');

	if (check == true) {
		$.post('server/Cart/deleteCart.php', {id : id}, function(data) {
			$(".table-cart").load(' #dataCart');
		});
	}

});
function updateCart(id){
	var qty = $("#qty_" + id).val();
	if (qty > 0) {
		$.ajax({
			url: 'server/Cart/updateCart.php',
			type: 'POST',
			dataType: 'html',
			data: {id : id, qty : qty},

			success : function(data){
				$("#notiCart").html(data);
				$(".table-cart").load(' #dataCart');
			},

			error : function(){
				console.log('error');
			}

		})
	}else{
		
	}
	
}
$(document).on('click', '.addcart', function(e){
	e.preventDefault();
		var id = $(this).val();

	//hiệu ứng thêm vào giỏ hàng
		var parent = $(this).parents('.agile_top_brand_left_grid1');
		var src = parent.find('img').attr('src');
		var cart = $(document).find('#cart-shop');
		var parTop =parent.offset().top;
		var parLeft =parent.offset().left;
		
		$('<img/>',{
			class: 'cart-product',
			src: src
		}).appendTo('body').css({
			'top': parTop,
			'left': parseInt(parLeft) + parseInt(parent.width())-50
		});
		setTimeout(function(){
			$(document).find('.cart-product').css({
				'top': cart.offset().top,
				'left': cart.offset().left,
			});
			setTimeout(function(){
				$(document).find('.cart-product').remove();
				var countCart= parseInt(cart.find('#qtyCart').data('count'))+1;
				cart.find('#qtyCart').text(countCart).data('count',countCart).css({
					'color':'#dca214',
				});
			},1500)
		},200)
	//them vao gio hang bang ajax
		$.ajax({
			url: 'server/Cart/addCart.php',
			type: 'POST',
			dataType: 'html',
			data: {id : id},

			success : function(data){
				
			},

			error : function(){
				console.log('error');
			}

		});

});
    $(document).on('click', '.addcarts', function(e){
        e.preventDefault();
            var id = $(this).val();

        
            $.ajax({
                url: 'server/Cart/addCart.php',
                type: 'POST',
                dataType: 'html',
                data: {id : id},

                success : function(data){
                	location.href='gio-hang';
                },

                error : function(){
                    console.log('error');
                }

            });

    });


// chia danh mục các loại sản phẩm
$(document).on('click', '#show-cate-product li', function(){
	var Cate = $(this).attr('cate_id');

	$.ajax({
		url 		: 'server/list_cate_product.php',  
		type 		: 'POST',
		dataType 	: 'html',
		data        : { Cate : Cate},


		success : function(data){
			$(".cate-product").html(data);
			console.log("success");

		},
		error : function(){
			console.log('error');
		}
	});
});

//them san pham yeu thích
$(document).on('click', '.addheart', function(e){
	e.preventDefault();
		var id = $(this).val();
		
		$.ajax({
			url: 'server/Favourite/addFavourite.php',
			type: 'POST',
			dataType: 'html',
			data: {id : id},

			success : function(data){
				console.log("success");
				location.href='san-pham-yeu-thich';
			},

			error : function(){
				console.log('error');
			}

		});

});
//xóa sản phẩm yêu thích
$(document).on('click', '.deltrash', function(e){
	e.preventDefault();
		var id = $(this).val();
		var check = confirm('Bạn có muốn xóa sản phẩm yêu thích này không? ');
		
		if (check == true) {
			$.ajax({
				url: 'server/Favourite/delFavourite.php',
				type: 'POST',
				dataType: 'html',
				data: {id : id},

				success : function(data){
					console.log("success");
					$(".datafav").load(' .dataFav');
				},

				error : function(){
					console.log('error');
				}

			});
		}

});