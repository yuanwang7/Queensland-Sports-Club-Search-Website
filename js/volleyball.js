var tennis = ["5IYQkmXn9R8","Dphn70OfBLs","I8vqzebDezQ","gSHYvoyDu40","oa2hf1Qqy3A","MUwYZirKgsg", "eHpgOu8B-Ws",
"w8qbB30EJX4","Sw9Frzc7PpI","EcDGpf8IoKM","G0_j6VbM7T4","kzAZti_jcN4","sEB96RVl_Ww", "Ri3K4-ltIbw","_Gz_hJwoovY",
"U4IyL7_M9nM"];

for (var i = 0; i < tennis.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + tennis[i];
    var img = document.createElement('img');
    img.src = "http://img.youtube.com/vi/" + tennis[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('volleyballVideoDisplay').appendChild(a);
}