var baseball = ["ijFARBincDE","lv5pavmipjw","LWj6xS7fvuI","UwQTkfac6Qs","T2p2mSk1tFU","Cwh4rUzfBZM", "46gLa7ik2cs",
"YMmqNpmA60U","jD8wGYrkH2Y","Aesp8ViZbro","-K3DI07Ibb4","gOIJd_oQC2s","9OL0LAr-Pc8", "PfocGNohams","U3pHxqyy6PU",
"ddncpu9gd84"];

for (var i = 0; i < baseball.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + baseball[i];
    var img = document.createElement('img');
    img.src = "https://img.youtube.com/vi/" + baseball[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('baseballVideoDisplay').appendChild(a);
}