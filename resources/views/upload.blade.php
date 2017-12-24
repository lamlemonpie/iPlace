@extends('layouts.app')

@section('content')

<br><br><br>

<div class="container">
  <div class="card">
    <div class="container">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <br>
        <div class="row">
          <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="text-center">
              <img class="img-responsive" src="http://fillmurray.com/g/300/300" id="img-preview" />
            </div>
            <br>
            <label class="file-upload-container" for="file-upload">
              <input class="file-upload-container" id="file-upload" type="file" style="display:none;">
              Select an Image
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../js/upload.js"></script>

<br><br>

<style type="text/css">
  .card {
    background: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: rgba(0, 0, 0, 0.117647) 0px 1px 6px, rgba(0, 0, 0, 0.117647) 0px 1px 4px;
  }

  .card .card-content {
    padding: 20px;
}

  .file-upload-container {
      width: 100%;
      height: 50px;
      overflow: hidden;
      background: #3F51B5;
      user-select: none;
      transition: all 150ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;
      text-align: center;
      color: white;
      line-height: 50px;
      font-weight: 300;
      font-size: 20px;
  }

  .file-upload-container:hover {
      cursor: pointer;
      background: #3949AB;
  }
</style>

@endsection
