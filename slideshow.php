<script>
var images = ["images/s1.jpg", "images/s2.jpg","images/GRV2.jpg","images/GRV3.jpg"];

var i = 1;
var max = images.length;

function changeImage(){ 
  document.getElementById("slider").src = images[i++];
  if(i==max){
    i=0;
  }
}

setInterval(function(){changeImage()}, 5000);

</script>

<p><img src="images/s1.jpg" class="img-responsive" width="100%" id="slider" alt=""></p>
