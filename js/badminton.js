var badminton = ["LFr3xDQeTrc","Y6J5vNfjE14","rDzyalCCR3U","h2lsiMaMcTM","75iPAn-5BTE","YTjdiIlVdaE","-ZQ1PKhUVnQ",
"m9RlIjl2_Co","tC0BqUDzdWY","QDLdCSGGLao","m_IX59QRvtk","PgVCbTZC-gA","YMvupK6_FWc","mbvVYa2rcZQ","nQR2cKtHJGg",
"-g_95ug-zRI"];

for (var i = 0; i < badminton.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + badminton[i];
    var img = document.createElement('img');
    img.src = "http://img.youtube.com/vi/" + badminton[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('badmintonVideoDisplay').appendChild(a);
}