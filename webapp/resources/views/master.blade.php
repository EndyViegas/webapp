<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Cards</title>

    <!-- LINK PARA A BOOTSTRAP -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">

    <style>

        body {
            background-color: #210B61;
        }


        .box{
            margin: auto;
            padding: 15px;
            padding-top: 40px;
            margin-top: 80px;
            background-color: #4242427d;
            text-align: center;
            width: 300px;
            height:300px;
            border-radius: 10px;
        }

        #username {
            display: inline-table;
        }
        #divCards {
            width: 900px;
        }

        .card {
            width: 280px;
            display: inline-flex;
        }

        #descricao{
            margin-top: 3px;
            display: none;
        }

        #errorDescricao{
            display: none;
        }

    </style>

    <!-- LINK PARA A BOOTSTRAP -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"> </script>

    <script src="{{ asset('js/webapp.js') }}" type="text/javascript"> </script>

</head>