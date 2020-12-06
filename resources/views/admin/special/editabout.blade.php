@extends('layouts.app')

@section('title')
<title> Edit The About Us Page - News Tractor </title>
@endsection

@section('content')
<div class="cont-margin">
    <div class="jumbotron row jumbo1">
        <div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs"><br></div>
        <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Edit The About Us Page</h3>
            <form action="/about/store" method="post">
            @csrf
            <span class="ababout">Grid Section</span>
            <select name="category" id="" class="abform" required>
                <option value="">Select the About Us Grid</option>
                <option value="leftcolumn" >Left Column</option>
                <option value="rightcolumn" >Right Column</option>
            </select>
            @error('category')
            <span class="has-error">{{ $message }}</span><br><br>
            @enderror
            <br>
            <span class="ababout">Title</span>
            <input class="abform" type="text" value="{{ old('title') }}" name="title" maxlength="200">
            @error('title')
            <span class="has-error">{{ $message }}</span><br><br>
            @enderror
            <br>
            <span class="ababout">Heading</span>
            <input class="abform" type="text" value="{{ old('heading') }}" name="heading" maxlength="200">
            @error('heading')
            <span class="has-error">{{ $message }}</span><br><br>
            @enderror
            <br>
            <span class="ababout">Body</span>
            <textarea class="abform" name="body" cols="30" rows="10" maxlength="2000">{{ old('body') }}</textarea>
            @error('body')
            <span class="has-error">{{ $message }}</span><br><br>
            @enderror				
            <br>
            <span class="ababout">Picture</span>
				<input class="btn" type="file" name="file" id="file" style="width:100%">
				@error('file')
				<span class="has-error">{{ $message }}</span><br><br>
				@enderror
            <br>
            <input type="submit" value="Update" class="sub-btn">
        </form>
        </div>
        <div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs"><br></div>
    </div>
</div>

@endsection

