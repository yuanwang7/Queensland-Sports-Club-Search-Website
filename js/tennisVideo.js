var tennis = ["u9BxAf6xtbc","kGZn5FS8kfI","bSMufWWlPWE","My4QvDmqGl4","vKlasHhSg1Q","mISk6YL7auw", "4E8kiRKLsd4",
"8V3EB80M-HA","iqT33D3Z59E","WrCi61T1wIo","gLHEA0_dt5A","9DkgUmZQHzU","Tk5x7C2afyE", "V0EYCyTvr6Q","Aj3pohG_OAM",
"UWgBt40T-gI"];

for (var i = 0; i < tennis.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + tennis[i];
    var img = document.createElement('img');
    img.src = "http://img.youtube.com/vi/" + tennis[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('tennisVideoDisplay').appendChild(a);
}