<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Panel title <a href="#" type="button"  data-toggle="modal" data-target="#myModal" class="pull-right"><i class="fa fa-plus "></i></a></h3>
				  </div>
				  <div class="panel-body">
				    <ul class="list-group">
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal" class="pull-right">Cras justo odio</li>
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal" class="pull-right">Dapibus ac facilisis in</li>
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal" class="pull-right">Morbi leo risus</li>
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal" class="pull-right">Porta ac consectetur ac</li>
				      <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal" class="pull-right">Vestibulum at eros</li>
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
				        <p><input type="text" placeholder="მონაცემის შეყვანა" id="item" class="form-control"></p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" id="delete" data-dismiss="modal" style="display: none;">წაშლა</button>
				        <button type="button" class="btn btn-primary" id="savechange" style="display: none;">ცვლილების შენახვა</button>
				        <button type="button" class="btn btn-primary" id="addButton">მონაცემმის დამატება</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

			</div>
		</div>
	</div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('.ourItem').each(function() {
				$(this).click(function(event) {
					$('#title').text('რედაქტირება');
					$('#delete').show('400');
					$('#savechange').show('400');
					$('#addButton').hide();
					var text = $(this).text();
					$('#item').val(text);
				});
			});
		});
	</script>

	
</body>
</html>