
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($client)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
    <label for="prenom" class="col-md-2 control-label">Prenom</label>
    <div class="col-md-10">
        <input class="form-control" name="prenom" type="text" id="prenom" value="{{ old('prenom', optional($client)->prenom) }}" minlength="1" placeholder="Enter prenom here...">
        {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
    <label for="tel" class="col-md-2 control-label">Tel</label>
    <div class="col-md-10">
        <input class="form-control" name="tel" type="text" id="tel" value="{{ old('tel', optional($client)->tel) }}" minlength="1" placeholder="Enter tel here...">
        {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('addresse') ? 'has-error' : '' }}">
    <label for="addresse" class="col-md-2 control-label">Addresse</label>
    <div class="col-md-10">
        <input class="form-control" name="addresse" type="text" id="addresse" value="{{ old('addresse', optional($client)->addresse) }}" minlength="1" placeholder="Enter addresse here...">
        {!! $errors->first('addresse', '<p class="help-block">:message</p>') !!}
    </div>
</div>

