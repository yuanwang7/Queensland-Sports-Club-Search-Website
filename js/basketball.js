var tennis = ["GtEseitygCo","klX6ntnHYS8","DkSC_2ZMFb0","veVlKs7nADs","KJluSgYZXbg","v4vXaeMDoYI", "cQkYcgO7pXw",
"SmdjOTlTOdc","2ba_5J2wkk8","XMtDaVhQ98Y","TVqgPAsyyOg","o62TDqfb2ks","dySXLar03AM", "fCH-KH3PuOc","1Xud_8QngHI",
"V_mlFy09ov0"];

for (var i = 0; i < tennis.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + tennis[i];
    var img = document.createElement('img');
    img.src = "http://img.youtube.com/vi/" + tennis[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('basketballVideoDisplay').appendChild(a);
}