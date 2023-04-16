<div class="pt-2">
    <label for="{{ $field }}" class="form-label">{{ $text }}</label>
    <input type="{{ $type }}"  value="{{(isset($old) ? $old : '') }}" name="{{ $field }}" class="form-control" id="{{ $field }}" placeholder="{{ $placeholder }}">
</div>
