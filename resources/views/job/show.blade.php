@extends('layouts.app')

@section('content')

<style>

	/*******************************
* MODAL AS LEFT/RIGHT SIDEBAR
* Add "left" or "right" in modal parent div, after class="modal".
* Get free snippets on bootpen.com
*******************************/
.modal.left .modal-dialog,
	.modal.right .modal-dialog { 
		margin: auto;
		width: 510px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
				position: fixed;
    right: 0;
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	
	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}
	
	.modal.left.fade.in .modal-dialog{
		left: 0;
	}
.drag-file-area label .browse-files-text {
	color: #007bff;
	font-weight: bolder;
	cursor: pointer;
}
	
	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

/* ----- v CAN BE DELETED v ----- */
body {
	background-color: #78909C;
}

.demo {
	padding-top: 60px;
	padding-bottom: 110px;
}

.btn-demo {
	margin: 15px;
	padding: 10px 15px;
	border-radius: 0;
	font-size: 16px;
	background-color: #FFFFFF;
}

.btn-demo:focus {
	outline: 0;
}

.demo-footer {
	position: fixed;
	bottom: 0;
	width: 100%;
	padding: 15px;
	background-color: #212121;
	text-align: center;
}

.demo-footer > a {
	text-decoration: none;
	font-weight: bold;
	font-size: 16px;
	color: #fff;
}

</style>
<div class="container">
    <div class="row justify-content-center pb-5"> 
    <div class="col-sm-8">
        <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{$job->title}}</h1>
            <p class="card-text">{{$job->jobsummary}}</p> 
            <p class="card-text">{{$job->description}}</p>  
			<x-badge :badges="$job->tags" /> 

        </div>
        <div class="card-footer">
      <small class="text-muted">Publish {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</small>
      
      <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal2">Apply</a>
 
    </div>
        </div>
    </div>
  
</div> 
</div> 

<div class="container demo">  
	
	<!-- Modal -->
	<div class="modal right fade modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header d-block">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel2">Applay</h4>
				</div>

				<div class="modal-body">
					<form method="POST" action="{{ Route(config('app.name').'.candidates.store') }}" enctype="multipart/form-data">
						@csrf
						<input name="dirh_job_id" type="hidden" value="{{ $job->id }}">
						<div class="form-group">
							<label for="exampleInputEmail1">{{ __("Name") }}</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">{{ __("Email address") }}</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">{{ __("Password") }}</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div> 
					
						<div class="form-group"> 
						<label class="material-icons-outlined upload-icon">{{ __("Upload CV") }} </label>
						<div class="upload-files-container">
							<div class="drag-file-area"> 
								 <input type="file" name="resume" class="default-file-input"/>
							</div>
						 
						</div>
					</div>
					
						<div class="form-group">
							<label for="">{{ __("Message") }}</label>
							<textarea name="note" class="form-control"></textarea> 
						</div> 
					
						<button type="submit" class="btn btn-primary upload-button">Submit</button>
						</form>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	
	
</div><!-- container --> 

@endsection