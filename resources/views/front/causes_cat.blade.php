<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cascaded Category</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
</head>

<body>


   
            <div>
                <select class="form-control formselect required" placeholder="Select Category" id="sub_category_name">
                    <option value="0" disabled selected>Select</option>
                        
                    <option  value="1">1</option>
                     <option  value="2">2</option>
                    
                </select>
            </div>
                    
                <select class="form-control formselect required" placeholder="Select Sub Category" id="sub_category">
                    <option>ergjhet</option>
                </select>
            
        
        <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        
        <script>
            $(document).ready(function () {
                $('#sub_category_name').on('change', function () {
                    let id = $(this).val();
                    // $('#sub_category').empty();
                    // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                    $.ajax({
                        type: 'GET',
                        url: "{{url('getsub')}}/"+id,
                        // url:"{{url('getsub')}}?category_id="+id,
                        success: function (response) {
                            var response = JSON.parse(response);
                            console.log(response);   
                            $('#sub_category').empty();
                            $('#sub_category').append(`<option value="0" disabled selected>Select </option>`);
                            response.forEach(element => {
                                $('#sub_category').append(`<option value="${element['id']}">${element['name']}</option>`);
                            });
                        }
                   });
                });
            });
        </script>
</body>

</html>
