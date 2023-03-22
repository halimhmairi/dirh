@extends('layouts.app')

@section('content')

<style>
    .upload-files-container { 
	width: 420px; 
	border-radius: 10px; 
}
.drag-file-area {
	border: 1px dashed;
	border-radius: 10px;
	margin: 10px 0 15px;
	padding: 15px 15px;
	width: 350px;
	text-align: center;
}
.drag-file-area .upload-icon {
    font-size: 1.3em;
}
.drag-file-area h3 {
    font-size: 1.3em;
	margin: 15px 0;
}
.drag-file-area label {
    font-size: 1.3em;
}
.drag-file-area label .browse-files-text {
	color: #007bff;
	font-weight: bolder;
	cursor: pointer;
}
.browse-files span {
	position: relative;
	top: -25px;
}
.default-file-input {
	opacity: 0;
}
.cannot-upload-message {
	background-color: #ffc6c4;
	font-size: 17px;
	display: flex;
	align-items: center;
	margin: 5px 0;
	padding: 5px 10px 5px 30px;
	border-radius: 5px;
	color: #BB0000;
	display: none;
}
@keyframes fadeIn {
  0% {opacity: 0;}
  100% {opacity: 1;}
}
.cannot-upload-message span, .upload-button-icon {
	padding-right: 10px;
}
.cannot-upload-message span:last-child {
	padding-left: 20px;
	cursor: pointer;
}
.file-block {
	color: #007bff;
	background-color: #007bff;
  	transition: all 1s;
	width: 390px;
	position: relative;
	display: none;
	flex-direction: row;
	justify-content: space-between;
	align-items: center;
	margin: 10px 0 15px;
	padding: 10px 20px;
	border-radius: 25px;
	cursor: pointer;
}
.file-info {
	display: flex;
	align-items: center;
	font-size: 15px;
}
.file-icon {
	margin-right: 10px;
}
.file-name, .file-size {
	padding: 0 3px;
}
.remove-file-icon {
	cursor: pointer;
}
.progress-bar {
	display: flex;
	position: absolute;
	bottom: 0;
	left: 4.5%;
	width: 0;
	height: 5px;
	border-radius: 25px;
	background-color: #4BB543;
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
            <span class="badge badge-primary">Primary</span>
            <span class="badge badge-secondary">Secondary</span>
            <span class="badge badge-success">Success</span>
            <span class="badge badge-danger">Danger</span>
            <span class="badge badge-warning">Warning</span> 
        </div>
        <div class="card-footer">
      <small class="text-muted">Publish {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</small>
      
      <a href="#" class="btn btn-primary float-right">Apply</a>
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button" spellcheck="false">
<i class="fas fa-th-large"></i>
</a>
    </div>
        </div>
    </div>
  
</div> 
</div>

<aside class="control-sidebar control-sidebar-light" 
style="display: none;width:800px;
box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px,
 rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
">
<div class="p-3 control-sidebar-content" style="">
    <h5>Applay</h5><hr class="mb-2"> 
    <div class="mb-1">
    <form>
    <div class="form-group">
        <label for="exampleInputEmail1">{{ __("Name") }}</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">{{ __("Email address") }}</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">{{ __("Password") }}</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div> 

    <div class="form-group"> 
    <label class="material-icons-outlined upload-icon">{{ __("Upload CV") }} </label>
    <div class="upload-files-container">
		<div class="drag-file-area"> 
            <div class="dynamic-message"></div>
			<label class="label" style="width: -webkit-fill-available;
             padding-top: 24px;"> Drag & drop or <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browse file</span> <span>from device</span> </span> </label>
		</div>
		<span class="cannot-upload-message"> <span class="material-icons-outlined">error</span> Please select a file first <span class="material-icons-outlined cancel-alert-button">cancel</span> </span>
		<div class="file-block">
			<div class="file-info"> <span class="material-icons-outlined file-icon">description</span> <span class="file-name"> </span> | <span class="file-size">  </span> </div>
			<span class="material-icons remove-file-icon">delete</span>
			<div class="progress-bar"> </div>
		</div>  
	</div>
</div>

    <div class="form-group">
        <label for="">{{ __("Message") }}</label>
        <textarea class="form-control"></textarea> 
    </div> 

    <button type="submit" class="btn btn-primary upload-button">Submit</button>
    </form>
    </div>
 
</aside>
<script>
    var isAdvancedUpload = function() {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

let draggableFileArea = document.querySelector(".drag-file-area");
let browseFileText = document.querySelector(".browse-files");
let uploadIcon = document.querySelector(".upload-icon");
let dragDropText = document.querySelector(".dynamic-message");
let fileInput = document.querySelector(".default-file-input");
let cannotUploadMessage = document.querySelector(".cannot-upload-message");
let cancelAlertButton = document.querySelector(".cancel-alert-button");
let uploadedFile = document.querySelector(".file-block");
let fileName = document.querySelector(".file-name");
let fileSize = document.querySelector(".file-size");
let progressBar = document.querySelector(".progress-bar");
let removeFileButton = document.querySelector(".remove-file-icon");
let uploadButton = document.querySelector(".upload-button");
let fileFlag = 0;

fileInput.addEventListener("click", () => {
	fileInput.value = '';
	console.log(fileInput.value);
});

fileInput.addEventListener("change", e => {
	console.log(" > " + fileInput.value)
	uploadIcon.innerHTML = 'check_circle';
	dragDropText.innerHTML = 'File Dropped Successfully!';
	document.querySelector(".label").innerHTML = `drag & drop or <span class="browse-files"> <input type="file" class="default-file-input" style=""/> <span class="browse-files-text" style="top: 0;"> browse file</span></span>`;
	uploadButton.innerHTML = `Upload`;
	fileName.innerHTML = fileInput.files[0].name;
	fileSize.innerHTML = (fileInput.files[0].size/1024).toFixed(1) + " KB";
	uploadedFile.style.cssText = "display: flex;";
	progressBar.style.width = 0;
	fileFlag = 0;
});

uploadButton.addEventListener("click", () => {
	let isFileUploaded = fileInput.value;
	if(isFileUploaded != '') {
		if (fileFlag == 0) {
    		fileFlag = 1;
    		var width = 0;
    		var id = setInterval(frame, 50);
    		function frame() {
      			if (width >= 390) {
        			clearInterval(id);
					uploadButton.innerHTML = `<span class="material-icons-outlined upload-button-icon"> check_circle </span> Uploaded`;
      			} else {
        			width += 5;
        			progressBar.style.width = width + "px";
      			}
    		}
  		}
	} else {
		cannotUploadMessage.style.cssText = "display: flex; animation: fadeIn linear 1.5s;";
	}
});

cancelAlertButton.addEventListener("click", () => {
	cannotUploadMessage.style.cssText = "display: none;";
});

if(isAdvancedUpload) {
	["drag", "dragstart", "dragend", "dragover", "dragenter", "dragleave", "drop"].forEach( evt => 
		draggableFileArea.addEventListener(evt, e => {
			e.preventDefault();
			e.stopPropagation();
		})
	);

	["dragover", "dragenter"].forEach( evt => {
		draggableFileArea.addEventListener(evt, e => {
			e.preventDefault();
			e.stopPropagation();
			uploadIcon.innerHTML = 'file_download';
			dragDropText.innerHTML = 'Drop your file here!';
		});
	});

	draggableFileArea.addEventListener("drop", e => {
		uploadIcon.innerHTML = 'check_circle';
		dragDropText.innerHTML = 'File Dropped Successfully!';
		document.querySelector(".label").innerHTML = `drag & drop or <span class="browse-files"> <input type="file" class="default-file-input" style=""/> <span class="browse-files-text" style="top: -23px; left: -20px;"> browse file</span> </span>`;
		uploadButton.innerHTML = `Upload`;
		
		let files = e.dataTransfer.files;
		fileInput.files = files;
		console.log(files[0].name + " " + files[0].size);
		console.log(document.querySelector(".default-file-input").value);
		fileName.innerHTML = files[0].name;
		fileSize.innerHTML = (files[0].size/1024).toFixed(1) + " KB";
		uploadedFile.style.cssText = "display: flex;";
		progressBar.style.width = 0;
		fileFlag = 0;
	});
}

removeFileButton.addEventListener("click", () => {
	uploadedFile.style.cssText = "display: none;";
	fileInput.value = '';
	uploadIcon.innerHTML = 'file_upload';
	dragDropText.innerHTML = 'Drag & drop any file here';
	document.querySelector(".label").innerHTML = `or <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browse file</span> <span>from device</span> </span>`;
	uploadButton.innerHTML = `Upload`;
});

</script>
@endsection