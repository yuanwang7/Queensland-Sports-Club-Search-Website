var tennis = ["mMhUM_Sg95E","eZA0AnSdbBI","l6oHXG4Cl1Y","box08lq9ylg","mNweE4BPuNg","E77y5EOIjyY", "suLtZQMl_P4",
"BkaI713fhTI","yqsAYqVuiEA","0bk29uhpt58","heoO_5MvZ0w","d6bKrs6gbWk","DIK1FnHGGhk", "pwlSjxxBxxo","sEpUD-qq4SA",
"SwFUQIU-sek"];

for (var i = 0; i < tennis.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + tennis[i];
    var img = document.createElement('img');
    img.src = "http://img.youtube.com/vi/" + tennis[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('rugbyVideoDisplay').appendChild(a);
}