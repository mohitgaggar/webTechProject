let pic = querySelector("#profile-pic");
pic.addEventListener("click",pic_upload,false);
pic_upload()
{
    pic.src="uploaded.png";
}
