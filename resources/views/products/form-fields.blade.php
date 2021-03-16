@csrf
<div class="form-group">
    <label for="name">Product name</label>
    <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="{{isset($product) ? $product->name : ''}}" />
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" placeholder="Description" id="description" class="form-control"></textarea>
</div>
<div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" id="tags" name="tags" placeholder="Tags" class="form-control" value="" />
</div>

