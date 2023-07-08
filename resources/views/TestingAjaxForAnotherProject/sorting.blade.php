<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <select name="filter" class="form-control" id="filter">
        <option value="">Choose Option</option>
        <option value="asc">Ascending Trending</option>
        <option value="desc">Descending Trending</option>
    </select>
    {{-- jQuery cdn link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
    $(document).ready(function(){
        // $.ajax({
        //     type : 'get',
        //     url : 'http://localhost:8000/getList',
        //     dataType : 'json',
        //     success : function(response){
        //         console.log(response)
        //     }
        // })

        $('#filter').change(function(){
            $eventOption = $('#filter').val();
            console.log($eventOption);

            if($eventOption == 'asc'){
                $.ajax({
                type : 'get',
                url : 'http://localhost:8000/getList',
                dataType : 'json',
                success : function(response){
                console.log(response)
            }
            }else if($eventOption == 'desc'){
                console.log("Least are htere");
            }
        })
    });
</script>
</html>
