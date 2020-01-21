
<div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
    <label for="nom" class="col-md-2 control-label">Nom</label>
    <div class="col-md-10">
        <input class="form-control" name="nom" type="text" id="nom" value="{{ old('nom', optional($administrations)->nom) }}" minlength="1" placeholder="Enter nom here...">
        {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
    <label for="tel" class="col-md-2 control-label">Tel</label>
    <div class="col-md-10">
        <input class="form-control" name="tel" type="text" id="tel" value="{{ old('tel', optional($administrations)->tel) }}" minlength="1" placeholder="Enter tel here...">
        {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('addresse') ? 'has-error' : '' }}">
    <label for="addresse" class="col-md-2 control-label">Addresse</label>
    <div class="col-md-10">
        <input class="form-control" name="addresse" type="text" id="addresse" value="{{ old('addresse', optional($administrations)->addresse) }}" minlength="1" placeholder="Enter addresse here...">
        {!! $errors->first('addresse', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="photo" id="photo" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($administrations->photo) && !empty($administrations->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $administrations->photo }}
                </span>
            </div>
        @endif
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

