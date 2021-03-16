@csrf
<div class="form-group">
    <label for="name">Product name</label>
    <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="{{isset($product) ? $product->name : ''}}" />
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" placeholder="Description" id="description" class="form-control">{{isset($product) ? $product->description : ''}}</textarea>
</div>
<div class="form-group">
    <label for="tags">Tags</label>
    @php
        $tags = '';
        if (isset($product) && count($product->tags) > 0) {
            foreach($product->tags as $tag) {
                $tags .= $tag->tag.', ';
            }
            $tags = trim($tags, ', ');
        }
    @endphp
    <input type="text" id="tags" name="tags" placeholder="Tags" class="form-control" value="{{$tags}}" />
</div>

