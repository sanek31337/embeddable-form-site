<div class="form-wrapper">
    <form role="form">
        @csrf
        <input type="hidden" name="pageUid" value="{{$pageUid}}">

        <div class="form-group">
            <label for="userName">Name</label>
            <input name="userName" type="text" required class="@error('userName') is-invalid @enderror form-control">
            <div class="invalid-feedback invalid-feedback-userName d-none">
                Please type a name
            </div>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" required class="@error('message') is-invalid @enderror form-control"></textarea>
            <div class="invalid-feedback invalid-feedback-message d-none">
                Please type any message
            </div>
        </div>

        <button class="btn btn-submit btn-primary mb-2" id="addFormData">
            Submit
        </button>
    </form>

    <button class="btn btn-submit btn-primary mb-2" id="loadLastWidgetData">
        Load last widget data by page uid
    </button>
</div>

<style>
    form {
        border: 1px solid grey;
        padding: 15px;
    }
</style>

<script type="text/javascript">

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#loadLastWidgetData").click(function (e) {
            e.preventDefault();

            let pageUid = $("input[name=pageUid]").val();
            let userNameField = $("input[name=userName]");
            let messageField = $("textarea[name=message]");

            $.ajax({
                type: 'GET',
                url: "{{ route('ajaxRequest.get') }}",
                data: {pageUid},
                success: function (data) {

                    if (data.status == 'success')
                    {
                        let result = data.result;

                        userNameField.val(result.userName);
                        messageField.text(result.message);
                    }
                },
                fail: function(xhr, textStatus, errorThrown)
                {
                    console.log(textStatus);
                    console.log(xhr);
                    console.log(errorThrown);
                }
            });
        });

        $("#addFormData").click(function (e) {

            e.preventDefault();

            let userNameField = $("input[name=userName]");
            let messageField = $("textarea[name=message]");

            let userNameErrorMessage = $(".invalid-feedback-userName");
            let messageErrorMessage = $(".invalid-feedback-message");

            let formGroups = $('.form-group');

            let userName = userNameField.val();
            let message = messageField.val().trim();
            let pageUid = $("input[name=pageUid]").val();

            if (checkFieldIsFilled(userNameField, userName, userNameErrorMessage) && checkFieldIsFilled(messageField, (messageField.val().trim().length > 0), messageErrorMessage))
            {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajaxRequest.post') }}",
                    data: {userName, message, pageUid},
                    success: function (data) {

                        if (data.status == 'success')
                        {
                            formGroups.each(function(index){
                                if (!$(this).hasClass('has-success'))
                                {
                                    $(this).addClass('has-success');
                                }
                            });
                        }
                        else
                        {
                            formGroups.each(function(index){

                                if ($(this).hasClass('has-success'))
                                {
                                    $(this).removeClass('has-success');
                                }

                                if (!$(this).hasClass('has-success'))
                                {
                                    $(this).addClass('has-danger');
                                }
                            });
                        }
                    },
                    fail: function(xhr, textStatus, errorThrown)
                    {
                        console.log(textStatus);
                        console.log(xhr);
                        console.log(errorThrown);
                    }
                });
            }
        });

        function checkFieldIsFilled(field, value, errorMessageElement) {

            if (!value)
            {
                field.addClass('is-invalid');

                if (errorMessageElement.hasClass('d-none'))
                {
                    errorMessageElement.removeClass('d-none');
                }

                return false;
            }
            else
            {
                if (field.hasClass('is-invalid'))
                {
                    field.removeClass('is-invalid');

                }

                if (!errorMessageElement.hasClass('d-none'))
                {
                    errorMessageElement.addClass('d-none');
                }
            }

            return true;
        }
    });

</script>
