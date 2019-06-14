<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 600;
                height: 60vh;
                margin: 0;
            }

            .full-height {
                height: 60vh;
            }

            .flex-center {
                /* align-items: center; */
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

            .first-title {
                font-size: 50px;
            }

            .title {
                font-size: 30px;
            }

            .links  {
                color: #636b6f;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                padding-right:100px;
                text-align: right;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="first-title m-b-md">
                    Laravel -- Classroom 
                </div>
                <div class="title m-b-md">
                    Borrow
                </div>

                <form action="{{url('busy')}}" method="post" id="busy">
                <div class="links">
                楼号:
                <input name="lh" type="text" maxlength="12" >
                <br>教室号:
                <input name="js" type="text" maxlength="12" >
                <br>借用月份:
                <input name="month" type="text" maxlength="12" >
                <br>借用日期:
                <input name="day" type="text" maxlength="12" >
                <br>借用时间段:
                <input name="time" type="text" maxlength="12" >
                <br>
                </div>
                <button type="submit" >确认借用</button>
                </form>
                <hr>
                <div class="title m-b-md">
                    Classroom
                </div>
                <form action="{{url('classroom')}}" method="post" id="busy">
                <div class="links">
                楼号:
                <input name="lh" type="text" maxlength="12" >
                <br>教室号:
                <input name="js" type="text" maxlength="12" >
                <br>
                </div>
                <button type="submit" >查看</button>
                </form>
                <hr>
                <div class="title m-b-md">
                    New
                </div>
                <form action="{{url('new')}}" method="post" id="busy">
                <div class="links">
                楼号:
                <input name="lh"  type="text" maxlength="12" >
                <br>教室号:
                <input name="js"  type="text" maxlength="12" >
                <br>座位数:
                <input name="zw"  type="text" maxlength="12" >
                <br>
                </div>
                <button type="submit" >添加教室</button>
                </form>
            </div>
        </div>
    </body>
</html>
