@extends('layouts.app')

@section('content')
    <div class="content-container">
        <div class="header">
            <div class="title-wrapper">
                <div class="title">Create Group</div>
            </div>
        </div>

        <div class="form-container">
            <form name="creategroup" action="/home" method="post" class="form create-group">
                {{ csrf_field() }}
                <div class="subtitle">Please choose the type of group to create:</div>
                <div class="input-wrapper">
                    <input type="radio" name="type" value="academic" class="radio-button" onchange="updateForm()" checked><div class="radio-label">Academic</div>
                    <input type="radio" name="type" value="nonacademic" class="radio-button" onchange="updateForm()"><div class="radio-label">Non-academic</div>
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
                <div id="form-input-async"></div>
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

    <template id="index-input">
        <div class="input-wrapper options" id="form-input-async">
            <div class="label">Index:</div>
            <select type="text" name="indexNo" class="select text-field" style="margin-top: 5px">
                <option value="10001">10001</option>
                <option value="10002">10002</option>
                <option value="10011">10011</option>
                <option value="10012">10012</option>
                <option value="10021">10021</option>
                <option value="10022">10022</option>
            </select>
        </div>
    </template>

    <template id="category-input">
        <div class="input-wrapper" id="form-input-async">
            <div class="label">Category:</div>
            <input type="text" name="category" class="text-field"/>
        </div>
    </template>

    <script>
        function updateForm() {
            var inputDOMAsync = document.getElementById('form-input-async');
            var groupTypes = document.getElementsByName('type');
            for (var i = 0; i < groupTypes.length; i++) {
                if (groupTypes[i].checked) switch(groupTypes[i].value) {
                    case 'academic':
                        var indexInput = document.getElementById('index-input');
                        var clon = indexInput.content.cloneNode(true);
                        inputDOMAsync.replaceWith(clon);
                        break;
                    case 'nonacademic':
                        var indexInput = document.getElementById('category-input');
                        var clon = indexInput.content.cloneNode(true);
                        inputDOMAsync.replaceWith(clon);
                        break;
                    default:
                        break;
                }
            }
        }

        window.onload = updateForm;
    </script>
@endsection
