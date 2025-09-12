<div>
    <select name="category">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>
