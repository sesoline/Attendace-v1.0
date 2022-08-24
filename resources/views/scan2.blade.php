@extends('layout')

@section('title')
    Scaning
@endsection

@section('header')

    <script src="{{ asset('js/face-api.js')}}"></script>
    {{--  <script type="text/javascript" src="https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/dist/face-api.js.map"></script>   --}}

@endsection

@section('content')

    <h1>probando</h1>

    <canvas id="myCanvas"> miauw </canvas>
    <img id="myImg0" src="{{ asset('images/todos.jpeg')}}" />



@endsection

@section('footer')

    <script> 

        var input1
        var input2
        var input3
        var detection1
        var detection2
        var distance
        var faceMatcher
        var imagenes=['photo1.jpeg','photo2.jpeg','photo3.jpeg','photo4.jpeg',
        'claudia.jpeg','Elvin.jpeg','Helena.jpeg','Juli.peg','mama.jpeg','Pedro.jpeg']
        labeledVector=[]
        var descriptores

       
        
        async function computed(){
]
            // THIS: prepare the reference images descriptors into a vector

            // Loading libraries
            await faceapi.nets.ssdMobilenetv1.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68TinyNet.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68Net.loadFromUri('./weights')
            await faceapi.nets.faceRecognitionNet.loadFromUri('./weights')
            
            // Load reference images datas into a vector
            imagenes.forEach( 
                function(e){
                    imagenHTML = '<img id="myImg3" src="http://localhost/images/'+e+'" />'
                    imagenReferida = await faceapi.detectAllFaces(imagenHTML)

                    labeledVector=push(
                            new faceapi.LabeledFaceDescriptors(e.toString,[results[0].descriptor])
                        )

                }
            )

            if (!results.length) {
                return
            }
           
 
            console.log(labeledVector)

            faceMatcher = new faceapi.FaceMatcher(labeledDescriptors)
            console.log(faceMatcher)

            // Agregar nuevos descriptores al labeledVector
            {{--  
            labeledVector.push(new faceapi.LabeledFaceDescriptors(
                'perro',
                [results[0].descriptor]))
            console.log(labeledVector)  
            --}}
            

        }

        async function compare(){

            // THIS: Compare and draw the results

            // Loading libraries
            await faceapi.nets.ssdMobilenetv1.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68TinyNet.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68Net.loadFromUri('./weights')
            await faceapi.nets.faceRecognitionNet.loadFromUri('./weights')

            input1 = document.getElementById('myImg0')

            // Prepare canvas to draw             
            const displaySize = { width: input1.width, height: input1.height }
            const canvas = document.getElementById('myCanvas')
            faceapi.matchDimensions(canvas, displaySize)

            // Place marks on canvas
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            var img = document.getElementById("myImg0");
            ctx.drawImage(img, 0,0,input1.width, input1.height);



            // Start to look for people
            const result = await faceapi.detectAllFaces(input1)
            .withFaceLandmarks()
            .withFaceDescriptor()

           

            // Comparing            
            if (result) {
                result.forEach(
                    function(e){
                        const bestMatch = faceMatcher.findBestMatch(singleResult[e].descriptor)
                        console.log(bestMatch.toString())
                    }
                )
                
              
            }
           
        

        }

        async function load(){
    
            await faceapi.nets.ssdMobilenetv1.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68TinyNet.loadFromUri('./weights')
            await faceapi.nets.faceRecognitionNet.loadFromUri('./weights')
            
            input1 = document.getElementById('myImg1');
            input2 = document.getElementById('myImg2');
            detection1 = await faceapi.detectAllFaces(input1).withFaceLandmarks(true).withFaceDescriptors()
            detection2 = await faceapi.detectAllFaces(input2).withFaceLandmarks(true).withFaceDescriptors()
            distance = faceapi.euclideanDistance(detection1[0].descriptor, detection2[0].descriptor);
            console.log(distance);
        }
        
        async function draw(){

            await faceapi.nets.ssdMobilenetv1.loadFromUri('./weights')
            //await faceapi.nets.faceLandmark68Net.loadFromUri('./weights')
            //await faceapi.nets.faceLandmark68TinyNet.loadFromUri('./weights')
            //await faceapi.nets.faceRecognitionNet.loadFromUri('./weights')

            input1 = document.getElementById('myImg1');
            const displaySize = { width: input1.width, height: input1.height }
            // resize the overlay canvas to the input dimensions
            const canvas = document.getElementById('myCanvas')
            faceapi.matchDimensions(canvas, displaySize)
            console.log(canvas)

            

            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            var img = document.getElementById("myImg0");
            ctx.drawImage(img, 0,0,input1.width, input1.height);

            
            
            
            /* Display detected face bounding boxes */
            const detections = await faceapi.detectAllFaces(input1)
            // resize the detected boxes in case your displayed image has a different size than the original
            const resizedDetections = faceapi.resizeResults(detections, displaySize)
            // draw detections into the canvas
            faceapi.draw.drawDetections(canvas, resizedDetections)

            

            {{--  /* Display face landmarks */
            const detectionsWithLandmarks = await faceapi
            .detectAllFaces(input1)
            .withFaceLandmarks()
            // resize the detected boxes and landmarks in case your displayed image has a different size than the original
            const resizedResults = faceapi.resizeResults(detectionsWithLandmarks, displaySize)
            // draw detections into the canvas
            faceapi.draw.drawDetections(canvas, resizedResults)
            // draw the landmarks into the canvas
            faceapi.draw.drawFaceLandmarks(canvas, resizedResults)  --}}

            //HACER UNA CAJITA
            {{--  const box = { x: 50, y: 250, width: 100, height: 20 }
            // see DrawBoxOptions below
            const drawOptions = {
                label: 'AMANDA!',
                lineWidth: 2
                }
                const drawBox = new faceapi.draw.DrawBox(box, drawOptions)
                drawBox.draw(document.getElementById('myCanvas'))  --}}
    

        }



        window.addEventListener("saved", saved())
        window.addEventListener("load", load())
        window.addEventListener("compare", compare())
        window.addEventListener("draw", draw())


    </script>


@endsection