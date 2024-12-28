<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Submit Your Form</h1>

    <form id="ajaxForm">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message"></textarea><br><br>

        <button type="submit">Submit</button>
    </form>

    <div id="response"></div>

    <script>
        $(document).ready(function(){
            $('#ajaxForm').on('submit', function(event){
                event.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('form.submit') }}",  // URL to submit the form
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#response').html('<p>' + response.success + '</p>');
                    },
                    error: function(xhr){
                        $('#response').html('<p>Error: ' + xhr.responseText + '</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
