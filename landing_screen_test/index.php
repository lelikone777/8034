<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing_screen_test</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
            text-decoration: none;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        input {
            font-family: inherit;
        }

        .header {
            position: relative;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .link {
            margin-top: 10px;
            font-size: 18px;
            color: #000;
            text-align: center;
            font-weight: 700;
            text-decoration: underline;
        }

        .link:visited {
            color: #000;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .iframe {
            width: max-content;
            height: max-content;
            margin: 10px;
            border: 1px solid #000;
        }

        .iframe .name {
            font-size: 14px;
            text-align: center;
            border-bottom: 1px solid #000;
        }

        .iframe iframe {
            display: block;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="form">
            <form>
                <input type="text" name="link" id="" placeholder="Enter your link" required>
                <input type="submit" value="Submit">
            </form>
        </div>
        <a href="#" class="link"></a>
    </div>
    <div class="container"></div>
    <script>
        function renderIframes() {
            const screenSizes = [
                {
                    name: '320x460',
                    width: 320,
                    height: 460,
                },
                {
                    name: '375x548',
                    width: 375,
                    height: 548,
                },
                {
                    name: '414x609',
                    width: 414,
                    height: 609,
                },
                {
                    name: '375x685',
                    width: 375,
                    height: 685,
                },
                {
                    name: '414x896',
                    width: 414,
                    height: 896,
                },
                {
                    name: '320x568',
                    width: 320,
                    height: 568,
                },
                {
                    name: '375x667',
                    width: 375,
                    height: 667,
                },
                {
                    name: '414x736',
                    width: 414,
                    height: 736,
                },
                {
                    name: '375x812',
                    width: 375,
                    height: 812,
                },
                {
                    name: '360x800',
                    width: 360,
                    height: 800,
                },
                {
                    name: '360x640',
                    width: 360,
                    height: 640,
                },
                {
                    name: '360x720',
                    width: 360,
                    height: 720,
                },
                {
                    name: '360x780',
                    width: 360,
                    height: 780,
                },
                {
                    name: '320x570',
                    width: 320,
                    height: 570,
                },
                {
                    name: '360x760',
                    width: 360,
                    height: 760,
                },
                {
                    name: '385x854',
                    width: 385,
                    height: 854,
                },
                {
                    name: '412x915',
                    width: 412,
                    height: 915,
                },
                {
                    name: '320x640',
                    width: 320,
                    height: 640,
                },
                {
                    name: '393x851',
                    width: 393,
                    height: 851,
                },
                {
                    name: '412x883',
                    width: 412,
                    height: 883,
                },
            ];


            screenSizes.forEach(el => {
                let div = document.createElement('div');
                div.classList.add('iframe');
                
                let name = document.createElement('div');
                name.classList.add('name');
                name.innerHTML = el.name;

                let iframe = document.createElement('iframe');
                iframe.setAttribute('frameborder', '0');
                iframe.style.width = el.width + 'px';
                iframe.style.height = el.height + 'px';

                div.prepend(name);
                div.append(iframe);

                document.querySelector('.container').append(div);
            });
        }
        

        function loadLink(link) {
            let iframes = document.querySelectorAll('iframe');

            for (let i = 0; i < iframes.length; i++) {
                iframes[i].setAttribute('src', link);
            }
        }

        function getLink() {
            const urlParams = new URLSearchParams(window.location.search);

            return urlParams.get('link');
        }

        window.onload = () => {
            renderIframes();

            if (getLink()) {
                loadLink(getLink());
                document.querySelector('.link').innerHTML = getLink();
                document.querySelector('.link').href = getLink();
            }
        }

        document.querySelector('form').onsubmit = (e) => {
            e.preventDefault();

            let link = document.querySelector('input[name=link]').value;

            if (link.indexOf('http://') === -1 && link.indexOf('https://') === -1) {
                alert("Invalid link format");
                return;
            }

            e.target.submit();
        }
    </script>
</body>
</html>