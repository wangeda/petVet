<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetVet</title>
</head>

<body>
    @extends('layouts.head')

    @section("content")


    <body>
        <main>
            <div class="slider">
                <div class="container_slider">
                    <ul>
                        <li>
							<img class="image1" src="https://i.pinimg.com/originals/02/62/33/0262331c9eb1a5a9a878065f1f899726.jpg">
                        </li>
                    </ul>
                </div>
            </div>
        </main>



        <style>
            main {
                margin-top: 10%;
                display: flex;
                justify-content: center;
            }

			
			.image1{
				width:500px;
				height:500px;
			}

            
        </style>

    </body>
    @endsection




</body>

</html>