@extends('layouts.app')

@section('content')
    <div class="content-container">
        <div class="header">
            <div class="title-wrapper">
                <div class="title">Create Group</div>
            </div>
        </div>

        <div class="form-container">
            <form name="creategroup" action="/creategroup" method="post" class="form create-group">
                {{ csrf_field() }}
                <div class="subtitle">Please choose the type of group to create:</div>
                <div class="input-wrapper">
                    <input type="radio" name="type" value="academic" class="radio-button" checked><div class="radio-label">Academic</div>
                    <input type="radio" name="type" value="nonacademic" class="radio-button"><div class="radio-label">Non-academic</div>
                </div>
                <hr>
                <div class="input-wrapper">
                    <div class="label">Group Name:</div>
                    <input type="text" name="groupName" class="text-field"/>
                </div>
                <div class="input-wrapper">
                    <div class="label">Description:</div>
                    <textarea type="text" name="description" class="text-field" maxlength="190"></textarea>
                </div>
                <div class="input-wrapper">
                    <div class="label">Index:</div>
                    <input type="text" name="indexNo" class="text-field"/>
                </div>
                <div class="input-wrapper">
                    <div class="label">Permission:</div>
                    <input type="radio" name="isFreeJoin" value="free" class="radio-button" checked><div class="radio-label">Free</div>
                    <input type="radio" name="isFreeJoin" value="ask" class="radio-button"><div class="radio-label">Ask</div>
                </div>
                <hr>
                <div class="input-wrapper right-aligned no-padding">
                    <input type="submit" name="submit" value="Submit" class="submit-button">
                </div>
            </form>
        </div>
    </div>
@endsection
