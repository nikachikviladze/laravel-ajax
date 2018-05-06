<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-2">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title" >Panel title <a href="#" type="button"  data-toggle="modal" data-target="#myModal" class="pull-right" id="addNew"><i class="fa fa-plus "></i></a></h3>
				  </div>
				  <div class="panel-body" >
				    <ul class="list-group" id="items">
				    	@foreach($items as $item)
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal" class="pull-right">{{ $item->item }}

						<input type="hidden" id="itemId" value="{{ $item->id }}">
				      </li>
				      
				      @endforeach
				    </ul>

				  </div>
				  
				</div>
				
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="title">ახალი მონაცემის შეყვანა</h4>
				      </div>
				      
				      <div class="modal-body">
				      	<input type="hidden" id="id">
				        <p><input type="text" placeholder="მონაცემის შეყვანა" id="item" class="form-control"></p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" id="delete" data-dismiss="modal" style="display: none;">წაშლა</button>
				        <button type="button" class="btn btn-primary" data-dismiss="modal" id="savechange" style="display: none;">ცვლილების შენახვა</button>
				        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addButton">მონაცემმის დამატება</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

			</div>
			<div class="col-lg-3">
				<input type="text" name="searchItem" id="searchItem" placeholder="ჩაწერეთ საძიებო სიტყვა" class="form-control">
			</div>
		</div>
	</div>
	{{ csrf_field() }}
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script>
		$(document).ready(function() {
			// მარქაფი

			$(document).on('click', '.ourItem', function(event) {
				var text = $.trim($(this).text()) ;
				var id = $(this).find('#itemId').val();
				$('#title').text('რედაქტირება');
				$('#delete').show('400');
				$('#savechange').show('400');
				$('#addButton').hide('400');
				$('#item').val(text);
				$('#id').val(id);
				// console.log(id);
			});
			// მონაცემის დამატება HTML გენერირება 
			$(document).on('click', '#addNew', function(event) {

				$('#title').text('მონაცემის დამატება');
				$('#item').val("");
				$('#delete').hide('400');
				$('#savechange').hide('400');
				$('#addButton').show('400');
			});
			// მონაცემის დამატება Ajax
			$('#addButton').click(function(event) {
				var text = $('#item').val();
				if (text =="") {
					alert('ცარიელი ველი არ გაიგზავნება!!');
				}else{
					$.post('list', {'text': text, '_token':$('input[name=_token]').val()}, function(data) {
						
						console.log(data);
						$('#items').load(location.href + ' #items');		
					});
					
				}
			});

			// მონაცემის წაშლა
			$('#delete').click(function(event) {
				var id = $('#id').val();
				$.post('delete', {'id':id, '_token':$('input[name=_token]').val()}, function(data) {
					console.log(data);
					$('#items').load(location.href + ' #items');
				});
			});

			// მონაცემის რედაქტირება
			$('#savechange').click(function(event) {
				var id = $('#id').val();
				var item = $.trim($('#item').val());
				$.post('update', {'id':id, '_token':$('input[name=_token]').val(), 'item':item}, function(data) {
					$('#items').load(location.href + ' #items');
				});
			});


			$( function() {
			    
			    $( "#searchItem" ).autocomplete({
			      source: 'http://127.0.0.1:8000/list/search'
			    });
			  } );

		});
	</script>

	
</body>
</html>