$(document).ready(function(){

	$(".btn-detalle-pedido").on('click', function(e){
		e.preventDefault();

		var id_pedido = $(this).data('id');
        var path = $(this).data('path');
        var token = $(this).data('token');
        var modal_title = $(".modal-title");
        var modal_body = $(".modal-body");
        var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando datos</p>';
        var table = $("#table-detalle-pedido tbody");
        var data = {'_token' : token, 'order_id' : id_pedido};

        modal_title.html('Detalle del Pedido: ' + id_pedido);
        table.html(loading);

        $.post(
        	path,
        	data,
        	function(data){
        		//console.log(response);
        		table.html("");
        		
                for(var i=0; i<data.length; i++){
                    
                    var fila = "<tr>";
                    fila += "<td><img src='" + data[i].product.image + "' width='30'></td>";
                    fila += "<td>" + data[i].product.name + "</td>";
                    fila += "<td>$ " + parseFloat(data[i].price).toFixed(2) + "</td>";
                    fila += "<td>" + parseInt(data[i].quantity) + "</td>";
                    fila += "<td>$ " + (parseFloat(data[i].quantity) * parseFloat(data[i].price)).toFixed(2) + "</td>";
                    fila += "</tr>";
                    
                    table.append(fila);
                }
        	},
        	'json'
        );

	});


});



$(document).ready(function(){

    $(".btn-detalle-envio").on('click', function(e){
        e.preventDefault();

        var id_pedido = $(this).data('id');
        var path = $(this).data('path');
        var token = $(this).data('token');
        var modal_title = $(".modal-title");
        var modal_body = $(".modal-body");
        var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando datos</p>';
        var table = $("#table-detalle-envio tbody");
        var data = {'_token' : token, 'order_id' : id_pedido};

        modal_title.html('Pedido: ' + id_pedido);
        table.html(loading);

        $.post(
            path,
            data,
            function(data){
                //console.log(response);
                table.html("");
                
                for(var i=0; i<data.length; i++){
                    
                    var fila = "<tr>";
                    fila += "<td>" + data[i].name + "</td>";
                    fila += "<td>" + data[i].last_name + "</td>";
                    fila += "<td>" + data[i].email + "</td>";
                    fila += "<td>" + data[i].user + "</td>";
                    fila += "<td>" + data[i].country + "</td>";
                    fila += "<td>" + data[i].state + "</td>";
                    fila += "<td>" + data[i].city + "</td>";
                    fila += "<td>" + data[i].colony + "</td>";
                    fila += "<td>" + data[i].address + "</td>";
                    fila += "<td>" + data[i].post_code + "</td>";
                    fila += "<td>" + data[i].phone_number + "</td>";
                    fila += "<td>" + data[i].references_address + "</td>";
                    fila += "</tr>";
                    
                    table.append(fila);
                }
            },
            'json'
        );

    });


});
