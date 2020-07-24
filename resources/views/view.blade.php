<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>translator</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <script>
        function myFunctionRu() {
            var checkBoxRu = document.getElementById("ruCheck");
            var ru = document.getElementById("ru");
            if (checkBoxRu.checked == true) {
                ru.style.display = "block";
            } else {
                ru.style.display = "none";
            }
        }

        function myFunctionKz() {
            var checkBoxKz = document.getElementById("kzCheck");
            var kz = document.getElementById("kz");
            if (checkBoxKz.checked == true) {
                kz.style.display = "block";
            } else {
                kz.style.display = "none";
            }
        }

        function myFunctionUz() {
            var checkBoxUz = document.getElementById("uzCheck");
            var uz = document.getElementById("uz");
            if (checkBoxUz.checked == true) {
                uz.style.display = "block";
            } else {
                uz.style.display = "none";
            }
        }
        function myFunctionEn() {
            var checkBoxEn = document.getElementById("enCheck");
            var en = document.getElementById("en");
            if (checkBoxEn.checked == true) {
                en.style.display = "block";
            } else {
                en.style.display = "none";
            }
        }
        function myFunctionOz() {
            var checkBoxOz = document.getElementById("ozCheck");
            var oz = document.getElementById("oz");
            if (checkBoxOz.checked == true) {
                oz.style.display = "block";
            } else {
                oz.style.display = "none";
            }
        }
    </script>
</head>
<body>
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            translator
        </div>
        <form action="/translate" method="post" >
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ruCheck" onclick="myFunctionRu()">
                <label class="custom-control-label" for="ru">RU</label>

                <input type="checkbox" class="custom-control-input" id="enCheck" onclick="myFunctionEn()">
                <label class="custom-control-label" for="kz">En</label>

                <input type="checkbox" class="custom-control-input" id="kzCheck" onclick="myFunctionKz()">
                <label class="custom-control-label" for="kz">KZ</label>

                <input type="checkbox" class="custom-control-input" id="uzCheck" onclick="myFunctionUz()">
                <label class="custom-control-label" for="uz">UZ</label>

                <input type="checkbox" class="custom-control-input" id="ozCheck" onclick="myFunctionOz()">
                <label class="custom-control-label" for="uz">Oz</label>
            </div>

            <div class="input-group mb-5">
                <input name="original" type="text" class="form-control" placeholder="original word">
                <input name="russian" id="ru" style="margin-top: 10px;margin-left: 80px;display: none" type="text" class="form-control"
                       placeholder="russian">
                <input name="english" id="en" style="margin-top: 10px;margin-left: 80px;display: none" type="text" class="form-control"
                       placeholder="english">
                <input name="kazakh" id="kz" style="margin-top: 10px;margin-left: 80px;display: none" type="text" class="form-control"
                       placeholder="kazakh">
                <input name="uzbek" id="uz" style="margin-top: 10px;margin-left: 80px;display: none" type="text" class="form-control"
                       placeholder="uzbek">
                <input name="ozbek" id="oz" style="margin-top: 10px;margin-left: 80px;display: none" type="text" class="form-control"
                       placeholder="ozbek">

            </div>
            <button style="margin-top: 20px" type="submit" class="btn btn-primary">Translate</button>
        </form>


    </div>

</div>
</body>
</html>


