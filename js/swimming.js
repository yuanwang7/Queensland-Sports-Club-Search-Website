var swimming = ["Nfbb43RURYc","f32Cufa0-EQ","ZfZ8k60Wfis","do2X3gx7Kic","WDi8J4g-pUk","Sr570KZvyBQ", "GUULNJEdKU8",
"qe6_cHLTh1I","AxgC1vd1Y90","ObSDD2vfGMA","34ZTxQaNfis","vBOFzuS-Djo","KqA7kTFurvg", "ObSDD2vfGMA","44Z903gdVqI",
"CXGHGrAhJlU"];

for (var i = 0; i < swimming.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + swimming[i];
    var img = document.createElement('img');
    img.src = "https://img.youtube.com/vi/" + swimming[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('swimmingVideoDisplay').appendChild(a);
}