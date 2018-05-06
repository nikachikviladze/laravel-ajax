@extends('admin/index')
@section('stylesheet')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
  <script type="text/javascript"> 
    // When the document is ready set up our sortable with it's inherant function(s) 
    $(document).ready(function() { 
        

        $(function () {
            $("#sortable").sortable({
            		start: function(event, ui) {
        	    ui.item.startPos = ui.item.index();
        	},
        	stop: function(event, ui) {
        	    var start =  ui.item.startPos;
        	    
        	},
                update: function (event, ui) {
                    var order = $(this).sortable('toArray');
                    var id = $('#imageId').val();
                    var start = ui.item.startPos+1;
                    var finish =  ui.item.index()+1;
                    console.log(finish);

                    $.post('slider/updateSlider', {'order': order, '_token':$('input[name=_token]').val(), 'start':start, 'finish':finish, 'id':id}, function(data) {
                		console.log(data);
                		// $('#sortable').load(location.href + ' #sortable');
                	});
                }
            });
            // $('button').on('click', function () {
            //     var r = $("#sortable").sortable("toArray");
            //     var a = $("#sortable").sortable("serialize", {
            //         attribute: "id"
            //     });
            //     console.log(r, a);
            // });
        });


    }); 

    

</script>

@endsection
@section('content')
<br>
{{ csrf_field() }}

<ul id="sortable" class="list-group">

	@foreach($items as $key=> $item)
  <li id="{{ $item->ordering }}" class="list-group-item">
  	<img src="{{ asset('images/slider/'. $item->image) }}" width="90" class="handle" /> 
			        <span class="text">{{ $item->ordering }}  {{ $item->title }}</span>
			   	<input type="hidden" id="imageId" name="id" value="{{ $item->id }}">
 </li>
  @endforeach
</ul>



{{-- <div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<ul id="test-list" class="list-group">
				@foreach($items as $key=> $item)
			    <li class="list-group-item sort" id="sort{{$key}}" data-id="{{$item->id}}" data-ordering ={{ $item->ordering }}> 
			        <img src="{{ asset('images/slider/'. $item->image) }}" width="90" class="handle" /> 
			        <span class="text">{{ $item->title }}</span>
			    </li>
			    @endforeach			    
			</ul> 
			<form action="process-sortable.php" method="post" name="sortables"> 
			    <input type="hidden" name="test-log" id="test-log" /> 
			</form>

			
			
		</div>
	</div>
</div> --}}


{{-- <div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			
			<ul id="sortable" class="list-group">
				@foreach($items as $item)
			  <li class="list-group-item">
			  	<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
			  	<img src="{{ asset('images/slider/'. $item->image) }}" width="90">
			        <span class="text">{{ $item->title }}</span>
			   </li>
			   @endforeach
			   <button id="change">change</button>
			</ul>
			
		</div>
	</div>
</div> --}}


<!-- TO DO List -->
{{-- <div class="box box-primary">
  <div class="box-header">
    <i class="ion ion-clipboard"></i>

    <h3 class="box-title">To Do List</h3>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
    <ul class="todo-list">
    	@foreach($items as $item)
      
      <li>
            <span class="handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
        <img src="{{ asset('images/slider/'. $item->image) }}" width="90">
        <span class="text">{{ $item->title }}</span>
        <small class="label label-default"><i class="fa fa-clock-o"></i> {{ time() - $item->created_at->timestamp}} month</small>
        <div class="tools">
          <i class="fa fa-edit"></i>
          <i class="fa fa-trash-o"></i>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix no-border">
    <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
  </div>
</div> --}}
<!-- /.box -->

@endsection
@section('script')


@endsection
