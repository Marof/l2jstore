/**
 * JS items
 * 
 * @since 06/06/2013
 * @author Vagner V. B. Cantuares <vagner.cantuares@gmail.com>
 *  
 */

/**
 * # JS - Pesquisar item e auto completar.
 * 
 * @since 06/06/2013
 * @author Vagner V. B. Cantuares <vagner.cantuares@gmail.com>
 *  
 */

$(document).ready(function(){
	$(
		function()
		{
			$('input[name=item_date_available]').datepicker();
			$('input[name=item_date_available]').tooltip(
				{
					placement : 'right',
					trigger : 'hover'
				}
			)
			
			$('input[name=credits]').tooltip(
				{
					placement : 'right',
					trigger : 'hover'
				}
			);
			
			$(document).ajaxStart(
				function()
				{
					$('div.loader').show();	
				}
			);
			
			$(document).ajaxStop(
				function()
				{
					$('div.loader').hide();	
				}
			);

			$('input[name=item_name]').keyup(
				function()
				{
					if($(this).val().length > 2)
					{
						var ItemAvailables = [];

						$.getJSON(
							'controller/item_controller.php?action=item_search&type='+
							$('select[name=item_type]').val()+
							'&name='+
							$('input[name=item_name]').val(),
							function(response)
							{
								$.each(response,
									function(k, v)
									{
										ItemAvailables.push(v.name);
									}
								);
							}
						)

						$(this).autocomplete(
							{
								source:	ItemAvailables
							}
						);
					}
				}
			);
/**
 * 
 * # JS - Adicionar item na loja
 * 
 * @since 15/06/2013
 * @author Vagner V. B. Cantuares <vagner.cantuares@gmail.com>
 * 
 */
			$('input').focus(
				function()
				{
					$(this).parent().prev().parent().removeClass('error');
					$(this).next().empty().html();
				}
			);

			var table = [];

			$('.insert_item_table').click(
				function()
				{
					var items = [];

					items = {
						item_type : $('select[name=item_type]').val(),
						type_name : $('select[name=item_type] option:selected').text(),
						item_id : $('input[name=item_id]').val(),
						item_name : $('input[name=item_name]').val(),
						date_available : $('input[name=item_date_available]').val(),
						credits : $('input[name=credits]').val()
					}

					$.ajax(
						{
							url: 'controller/item_controller.php?action=item_validation_fields',
							type: 'POST',
							dataType: 'json',
							data: items
						}
					)
					.done(
						function(response)
						{
							if(response.error != 1)
							{
								table.push(items);

								var table_tb_tr = [];

								$.each(table,
									function(k, v)
									{
										table_tb_tr.push(
											'<tr>'+
												'<td><img src="http://l2jdb.l2jdp.com/img/l2jdb/icon/weapon_draconic_bow_i00.png" /></td>'+
												'<td>'+v.type_name+'</td>'+
												'<td>'+v.item_name+'</td>'+
												'<td>'+v.item_id+'</td>'+
												'<td>'+v.date_available+'</td>'+
												'<td>'+v.credits+' C</td>'+
												'<td><button class="btn btn-mini btn-danger">Remover</button></td>'+
											'</tr>'
										);
									}
								);

								$('div#item_table tbody').html(table_tb_tr.join(''));
								
								$('div#item_table').show();

							} else {
								$.each($('div#item_add form input'),
									function(k, v)
									{
										if(response.field_name_error == v.name)
										{
											$(this).parent().prev().parent().addClass('error');
											$(this).next().html(response.mensagem);
										}
									}
								);
							}
						}
					)
					.fail(
						function(response)
						{
							alert('fail =(');
						}
					)

					return false;

				}
			);
		}
	);
});