<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>Google Translate API</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <style>
        html,
        body,
        input,
        select,
        textarea {
            font-size: 1.05em !important;
        }
        small { 
            font-size: 12px; 
        }
        .translation {
            margin-top: 35px;
            background-color: #f2f3f3;
            padding: 15px;
            border-radius: 6px;
        }
        .btn {
            margin-top: 35px;
        }
        input::-webkit-input-placeholder {
            color: #dcdcdc !important;
        }
        input:-moz-placeholder {
            /* Firefox 18- */
            
            color: #dcdcdc !important;
        }
        input::-moz-placeholder {
            /* Firefox 19+ */
            
            color: #dcdcdc !important;
        }
        input:-ms-input-placeholder {
            color: #dcdcdc !important;
        }
    </style>

    <!-- Using jQuery/Ajax to process translations to prevent page reloads -->
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#search-form', function() {
                var data = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: './translate.php',
                    data: data,
                    success: function(data) {
                        document.getElementById("translation").innerHTML = data;
                    }
                });
                return false;
            });
        });
    </script>

</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/translate">Timmy's Tiny Translator</a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/"><i class="fa fa-home"></i> Home</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">

        <div class="col-md-8 col-md-offset-2">

            <div class="form-group">

                <form id="search-form" name="search-form" method="post">

                    <div class="col-md-4">
                        <input type="radio" name="source" value="en" checked/> <small>English</small>
                        <br />
                        <input type="radio" name="source" value="fr" /> <small>French</small>
                        <br />
                        <input type="radio" name="source" value="es" /> <small>Spanish</small>
                    </div>

                    <div class="col-md-2"><img src="arrow.png" />
                    </div>

                    <div class="col-md-2 pull-right">
                        <input type="radio" name="target" value="en" /> <small>English</small>
                        <br />
                        <input type="radio" name="target" value="fr" checked/> <small>French</small>
                        <br />
                        <input type="radio" name="target" value="es" /> <small>Spanish</small>
                    </div>

                    <input type="text" class="form-control" name="search" placeholder="Type or paste something..." />

                    <input type="submit" class="btn btn-primary" value="Translate" />

                </form>
            </div>

            <!-- Translation is displayed here -->
            <h3 class="translation" id="translation"></h3>
        </div>
    </div>
</body>
</html>