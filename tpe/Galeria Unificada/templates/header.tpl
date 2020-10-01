<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{$css}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{BASE_URL}">
    <title>{$titulo_s}</title>
</head>

<body>
    <script src="../js/spa.js"></script>
    <script src="../js/register.js"></script>
    <script src="../js/recientes.js"></script>

    <header class="header__up sticky">
        <nav class="header__up_nav">
            <ul class="header__up_items">
                <li>
                    <button id="js-openOptions">
                        <svg viewBox="0 0 100 100" class="icon">
                            <path d="M9.375,25.781h81.25c1.727,0,3.125-1.399,3.125-3.125v-7.813c0-1.726-1.398-3.125-3.125-3.125H9.375
                        c-1.726,0-3.125,1.399-3.125,3.125v7.813C6.25,24.382,7.649,25.781,9.375,25.781z M9.375,57.031h81.25
                         c1.727,0,3.125-1.398,3.125-3.125v-7.813c0-1.726-1.398-3.125-3.125-3.125H9.375c-1.726,0-3.125,1.399-3.125,3.125v7.813
                        C6.25,55.633,7.649,57.031,9.375,57.031z M9.375,88.281h81.25c1.727,0,3.125-1.398,3.125-3.125v-7.813
                         c0-1.727-1.398-3.125-3.125-3.125H9.375c-1.726,0-3.125,1.398-3.125,3.125v7.813C6.25,86.883,7.649,88.281,9.375,88.281z" />
                        </svg>
                    </button>
                </li>
                <li>
                    <button id="js-logo">
                        <a href="home">
                            <img src="images/logo.png" alt="" class="logo">
                        </a>
                    </button>
                </li>
                <li>
                    <button id="js-userRegister">
                        <svg viewBox="0 0 100 100" class="icon">
                            <path d="M97.5,42.5h-10v-10c0-1.375-1.125-2.5-2.5-2.5h-5c-1.375,0-2.5,1.125-2.5,2.5v10h-10c-1.375,0-2.5,1.125-2.5,2.5v5
	                    c0,1.375,1.125,2.5,2.5,2.5h10v10c0,1.375,1.125,2.5,2.5,2.5h5c1.375,0,2.5-1.125,2.5-2.5v-10h10c1.375,0,2.5-1.125,2.5-2.5v-5
	                    C100,43.625,98.875,42.5,97.5,42.5z M35,50c11.047,0,20-8.953,20-20s-8.953-20-20-20s-20,8.953-20,20S23.953,50,35,50z M49,55
	                    h-2.609c-3.469,1.594-7.328,2.5-11.391,2.5s-7.906-0.906-11.391-2.5H21C9.406,55,0,64.406,0,76v6.5C0,86.641,3.359,90,7.5,90h55
	                    c4.141,0,7.5-3.359,7.5-7.5V76C70,64.406,60.594,55,49,55z" />
                        </svg>
                    </button>
                </li>
            </ul>
        </nav>
    </header>
    <section class="content">