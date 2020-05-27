var lacrosse = ["ljhxNJZFz3E","Za3dKaqCads","xoBzPahSEcQ","xoBzPahSEcQ","6kOO6ZKVQqo","agSbXJnlTS0","09eN2nzIzik",
"XJg0AGRtvlw","zmCYKZfeRbA","LmUnnvAUf1s","n2Lzh-a9LZk","hKxpUiinKfk","yZV5vq8L6hs","NRd0_bYRBok","UmXaR66OhDc",
"V2C6sjrYmCE"];

for (var i = 0; i < lacrosse.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + lacrosse[i];
    var img = document.createElement('img');
    img.src = "https://img.youtube.com/vi/" + lacrosse[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('equestrianVideoDisplay').appendChild(a);
    
}
