
const videoLive = document.getElementById('video');
var stopVideoLive = document.querySelector("#stop");

async function models_load() {
    await faceapi.nets.ssdMobilenetv1.loadFromUri('/cnnModel')
    await faceapi.nets.faceExpressionNet.loadFromUri('/cnnModel');
    opent_video_stream();
  }

  models_load()

  function opent_video_stream() {
    if (navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices.getUserMedia({ video: true })
      .then(function(stream) {
        videoLive.srcObject = stream;
      })
      .then(make_predictions)
      .catch(function(error) {
        console.log(error);
      });
    }
  }

function make_predictions() {
    const cnvas = document.getElementById('canvas');
    const display_size = { width: videoLive.width, height: videoLive.height };
    faceapi.matchDimensions(cnvas, display_size);
    setInterval(async function() {
      const detections = await faceapi.detectAllFaces(videoLive).withFaceExpressions();
      const resizedDetections = faceapi.resizeResults(detections, display_size);
      cnvas.getContext('2d').clearRect(0, 0, cnvas.width, cnvas.height);
      faceapi.draw.drawDetections(cnvas, resizedDetections);
      faceapi.draw.drawFaceExpressions(cnvas, resizedDetections);
    }, 100);
  }

  stopVideoLive.addEventListener("click", stop, false);

  function stop(e) {
    var stream = videoLive.srcObject;
    var tracks = stream.getTracks();

    for (var i = 0; i < tracks.length; i++) {
      var track = tracks[i];
      track.stop();
    }
    videoLive.srcObject = null;
  }
