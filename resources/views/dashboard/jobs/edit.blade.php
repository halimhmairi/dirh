@extends('layouts.app')

@section('content')

<div class="container"> 
  
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Job') }}</div>

                <div class="card-body"> 

                  <form method="POST" action="{{ Route('jobs.update') }}">
                      @csrf
                      <input type="hidden" name="id" value="{{ $job->id }}">

                      <div class="form-group">
                        <label for="title">Job title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $job->title }}" placeholder="Job title">
                      </div>
                      <div class="form-group">
                        <label for="jobsummary">Job summary</label>
                        <input class="form-control @error('jobsummary') is-invalid @enderror" name="jobsummary" id="jobsummary" rows="3" value="{{ $job->jobsummary }}">
                      </div>
                      <div class="form-group">
                          <label for="description">Job description</label>
                          <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $job->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" id="tags" value="{{ $job->tags }}" placeholder="Job tags">
                          </div>
                        
                          <div class="form-group">
                            <label class="form-control-label" for="input-role">Status</label>
                            <div class="custom-control custom-radio mb-3">
                            <input name="status" class="custom-control-input" id="published" value="published" type="radio" @if($job->status === "published") checked @endif>
                            <label class="custom-control-label" for="published">Published</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                            <input name="status" class="custom-control-input" id="draft" value="draft" type="radio" @if($job->status === "draft") checked @endif>
                            <label class="custom-control-label" for="draft">Draft</label>
                            </div> 
                         </div>

                        <div class="form-group">
                            <label for="publish_at">Publish date</label>
                            <input type="date" class="form-control @error('publish_at') is-invalid @enderror" name="publish_at" id="publish_at" value="{{ $job->publish_at }}" placeholder="Job publish date">
                          </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
        </div>
        </div>
        </div> 
<script>
    // Doing this in a loaded JS file is better, I put this here for simplicity
    $('#descriptionr').trumbowyg();
</script>
@endsection
