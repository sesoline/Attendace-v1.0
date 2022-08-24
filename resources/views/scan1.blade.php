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
    <img id="myImg1" src="{{ asset('images/photo1.jpeg')}}" />
    <img id="myImg2" src="{{ asset('images/photo2.jpeg')}}" />
    <img id="myImg3" src="{{ asset('images/photo3.jpeg')}}" />
    <img id="myImg4" src="{{ asset('')}}" />

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
        
        async function saved(){

            // Loading libraries
            await faceapi.nets.ssdMobilenetv1.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68TinyNet.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68Net.loadFromUri('./weights')
            await faceapi.nets.faceRecognitionNet.loadFromUri('./weights')
            
            // save default Image in the server
            referenceImage = document.getElementById('myImg3');
            console.log(referenceImage)
            
            
            const results = await faceapi.detectAllFaces(referenceImage)
            .withFaceLandmarks()
            .withFaceDescriptors()
            
            // En caso de que no se guarde nada
            if (!results.length) {
                return
            }

            // create FaceMatcher with automatically assigned labels
            // from the detection results for the reference image
            // faceMatcher = new faceapi.FaceMatcher(results)

            // Add label descriptors
            const labeledDescriptors = [
                new faceapi.LabeledFaceDescriptors(
                    'Amanda',
                    [results[0].descriptor]
                )
            ]

            faceMatcher = new faceapi.FaceMatcher(labeledDescriptors)
            console.log(faceMatcher)
            

        }

        async function compare(){

            // Loading libraries
            await faceapi.nets.ssdMobilenetv1.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68TinyNet.loadFromUri('./weights')
            await faceapi.nets.faceLandmark68Net.loadFromUri('./weights')
            await faceapi.nets.faceRecognitionNet.loadFromUri('./weights')

            input2 = document.getElementById('myImg2')

            const singleResult = await faceapi.detectSingleFace(input2)
            .withFaceLandmarks()
            .withFaceDescriptor()

            
            if (singleResult) {
                const bestMatch = faceMatcher.findBestMatch(singleResult.descriptor)
                console.log(bestMatch.toString())
            }
            {{--  const displaySize = { width: input1.width, height: input1.height }
            // resize the overlay canvas to the input dimensions
            const canvas = document.getElementById('myCanvas')
            faceapi.matchDimensions(canvas, displaySize)  --}}

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
            //await faceapi.loadFaceLandmarkModel.loadFromUri('./weights')
            //await faceapi.nets.loadFaceRecognitionModel.loadFromUri('./weights')
            //await faceapi.nets.loadFaceExpressionModel.loadFromUri('./weights')
            
            //await faceapi.nets.faceLandmark68Net.loadFromUri('./weights')
            //await faceapi.nets.faceExpressionNet.loadFromUri('./weights')
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
            var img = document.getElementById("myImg1");
            ctx.drawImage(img, 0,0,input1.width, input1.height);

            
            
            
            /* Display detected face bounding boxes */
            let detections = await faceapi.detectAllFaces(input1)
            // resize the detected boxes in case your displayed image has a different size than the original
            const resizedDetections = faceapi.resizeResults(detections, displaySize)
            // draw detections into the canvas
            faceapi.draw.drawDetections(canvas, resizedDetections,'miauw')

            

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